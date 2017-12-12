<?php
    define("sfPaginationClass",1);
    define("sfPaginationQuery",2);

    class sfPaginationPlugin
    {
        var $criteria;
        var $class;
        var $request;
        var $pager;

        var $url;

        var $entries_per_page;
        var $entries_in_page;
        var $page;
        var $params;
        var $max_rows;
        var $allrows;

        var $type;

        public function  __construct($crit,$class,$request,$type = sfPaginationClass)
        {
            if($type != sfPaginationClass && $type != sfPaginationQuery)
            {
                $type = sfPaginationClass;
            }
            $this->type = $type;
            $this->criteria = $crit;
            $this->class = $class;
            $this->request = $request;

            $cnt = sfContext::getInstance()->getUser()->getAttribute('sfPaginationCount');
            if($cnt > 0)
                $this->entries_per_page = $cnt;
            else
            {
                $de = sfConfig::get('app_sfPaginationPlugin_default_entries');
                $this->entries_per_page = $de;
            }

        }

        public function setEntries($cnt)
        {
            if($cnt > 0)
            {
                $this->entries_per_page = $cnt;
                sfContext::getInstance()->getUser()->setAttribute('sfPaginationCount',$cnt);
            }
        }

        public function setAction($url)
        {
            $this->url = $url;
        }

        public function Run()
        {
            $this->ParseParams();
            if($this->type == sfPaginationClass)
            {
                $pager = new sfPropelPager($this->class,$this->entries_per_page);
                $pager->setCriteria($this->criteria);
                $pager->setPage($this->page);
                $pager->init();
                $this->pager = $pager;
            }
            elseif($this->type == sfPaginationQuery)
            {
                $sql = $this->criteria;
                $sql = strtolower($sql);
                $fst = strpos($sql, "select");
                $scn = strpos($sql, "from");
                $sql_count = substr($sql, $scn);
                $sql_count = "SELECT COUNT(*) AS rows ".$sql_count;

                $connection = Propel::getConnection();
                $statement = $connection->prepare($sql_count);
                $statement->execute();
                if($resultset = $statement->fetch(PDO::FETCH_OBJ))
                    $this->max_rows = $resultset->rows;

                $offset = ($this->page - 1) * $this->entries_per_page;
                $limit = $this->entries_per_page;
                $sql = $this->criteria." LIMIT ".$offset.", ".$limit;
                $conn = Propel::getConnection();
                $statement = $conn->prepare($sql);
                $statement->execute();

                $this->allrows = $statement->fetchAll(PDO::FETCH_OBJ);
                $this->entries_in_page = count($this->allrows);
            }
        }

        private function ParseParams()
        {
            $this->page = $this->request->getParameter('sfPaginationPage',1);
            $count = $this->request->getParameter('sfPaginationCount',0);
            if($count > 0)
            {
                $this->entries_per_page = $count;
            }
        }

        private function BuildUrl($page,$count = 0)
        {
            $url = $this->url."?sfPaginationPage=".$page;
            if($count == 0)
                $url .= "&sfPaginationCount=".$this->entries_per_page;
            else
                $url .= "&sfPaginationCount=".$count;

            if(count($this->params) > 0)
            {
                foreach($this->params as $key => $val)
                {
                    $url .= "&".$key."=".$val;
                }
            }
            
            return $url;
        }

        private function getPreviousPage()
        {
            if($this->type == sfPaginationClass)
            {
                return $this->pager->getPreviousPage();
            }
            elseif ($this->type == sfPaginationQuery)
            {
                $page = $this->page;
                if($page == 1)
                    return $page;
                else
                    return $page - 1;
            }
        }

        private function getNextPage()
        {
            if($this->type == sfPaginationClass)
            {
                return $this->pager->getNextPage();
            }
            elseif($this->type == sfPaginationQuery)
            {
                if($this->entries_per_page > $this->entries_in_page)
                {
                    return $this->page;
                }
                else
                {
                    return $this->page + 1;
                }
            }
        }

        private function getLinks()
        {
            if($this->type == sfPaginationClass)
            {
                return $this->pager->getLinks();
            }
            elseif($this->type == sfPaginationQuery)
            {
                $pages = array();

                $pages_round = $this->max_rows / $this->entries_per_page;
                $pages_fix = round($this->max_rows / $this->entries_per_page);
                if($pages_round > $pages_fix)
                    $max_page = $pages_fix + 1;
                else
                    $max_page = $pages_fix;
                $cur_page = $this->page;

                if($max_page < 5)
                {
                    for($i = 1 ; $i <= $max_page ; $i++)
                    {
                        $pages[] = $i;
                    }
                }
                elseif($cur_page > $max_page - 2)
                {
                    for($i = $max_page; $i > $max_page - 5; $i--)
                    {
                        $pages[] = $i;
                        sort($pages);
                    }
                }
                else
                {
                    if($cur_page < 3)
                    {
                        $cur_page = 3;
                    }
                    elseif($cur_page > $max_page - 3)
                    {
                        $cur_page = $max_page - 3;
                    }

                    for($i = $cur_page - 2 ; $i < $cur_page + 3 && $i > 0 && $i <= $max_page; $i++)
                    {
                        $pages[] = $i;
                    }
                }
            }

            return $pages;
        }

        private function PrintPagination()
        {
            $ulclass = sfConfig::get('app_sfPaginationPlugin_ul_class');
            $linext = sfConfig::get('app_sfPaginationPlugin_li_next');
            $liprev = sfConfig::get('app_sfPaginationPlugin_li_prev');
            $liactive = sfConfig::get('app_sfPaginationPlugin_li_active');
            $li = sfConfig::get('app_sfPaginationPlugin_li');
            $epp = sfConfig::get('app_sfPaginationPlugin_entries_per_page');
            ?>
            <style>
                #sfPaginationPluginCssUl li{
                    border:0; margin:0; padding:0;
                    font-size:11px;
                    list-style:none;
                }
                
                #sfPaginationPluginCssUl a{
                    border:solid 1px #DDDDDD;
                    margin-right:2px;
                }
                               
                #sfPaginationPluginCssUl .next a,
                #sfPaginationPluginCssUl .previous a {
                    font-weight:bold;
                    border:solid 1px #FFFFFF;
                }
                
                #sfPaginationPluginCssUl .active{
                    color:#ff0084;
                    font-weight:bold;
                    display:block;
                    float:left;
                    padding:4px 6px;
                }
                
                #sfPaginationPluginCssUl a:link,
                #sfPaginationPluginCssUl a:visited {
                    color:#0063e3;
                    display:block;
                    float:left;
                    padding:3px 6px;
                    text-decoration:none;
                }
                
                #sfPaginationPluginCssUl a:hover{
                    border:solid 1px #666666;
                }
            </style>
            <table width="100%">
                <tr>
                    <td width="60%">
                        <ul id="<?=$ulclass?>">
                            <li class="<?=$liprev?>">
                                <?php echo link_to('« Prev', $this->BuildUrl($this->getPreviousPage())) ?>
                            </li>
                            <?
                                $links = $this->getLinks();
                                foreach ($links as $page)
                                {
                            ?>
                                <?php echo ($page == $this->page) ? "<li class=\"".$liactive."\">".$page."</li>" : "<li class=\"".$li."\">".link_to($page, $this->BuildUrl($page))."</li>" ?>
                            <?
                                }
                            ?>
                            <li class="<?=$linext?>"><?php echo link_to('Next »', $this->BuildUrl($this->getNextPage())) ?></li>
                        </ul>
                    </td>
                    <td width="40%">
                        <ul id="<?=$ulclass?>">
                            <li class="<?=$liprev?>"><b>Entries</b></li>
                            <?
                                $count = $this->entries_per_page;
                                foreach($epp as $ep)
                                {
                                    if($ep == $count)
                                    {
                                        ?><li class="<?=$liactive?>"><?=$ep?></li><?
                                    }
                                    else
                                    {
                                        ?><li><?=link_to($ep,$this->BuildUrl($this->page,$ep))?></li><?
                                    }
                                }
                            ?>
                        </ul>
                    </td>
                </tr>
            </table>
            <?
        }
        
        private function PrintPaginationVertical()
        {
            
        }

        public function Render()
        {
            $this->Run();
            $this->PrintPagination();
        }
        
        public function RenderVertical()
        {
            $this->Run();
            $this->PrintPaginationVertical();
        }

        public function getResults()
        {
            if($this->type == sfPaginationClass)
                return $this->pager->getResults();
            elseif($this->type == sfPaginationQuery)
                return $this->allrows;
        }

        public function AddParam($tag,$val)
        {
            $this->params[$tag] = $val;
        }
    }
?>
