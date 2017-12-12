<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php $path = sfConfig::get('sf_relative_url_root', preg_replace('#/[^/]+\.php5?$#', '', isset($_SERVER['SCRIPT_NAME']) ? $_SERVER['SCRIPT_NAME'] : (isset($_SERVER['ORIG_SCRIPT_NAME']) ? $_SERVER['ORIG_SCRIPT_NAME'] : ''))) ?>

<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title></title>
        <link rel="shortcut icon" href="/favicon.ico" />
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo $path ?>/sfPropelPlugin/css/global.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo $path ?>/sfPropelPlugin/css/default.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo $path ?>/css/main.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo $path ?>/css/style.css" />

    </head>
    <body>
        <div id="art-page-background-simple-gradient">
        </div>
        <div id="art-page-background-glare">
            <div id="art-page-background-glare-image"></div>

        </div>
        <div id="art-main">
            <div class="art-Sheet">
                <div class="art-Sheet-tl"></div>
                <div class="art-Sheet-tr"></div>
                <div class="art-Sheet-bl"></div>
                <div class="art-Sheet-br"></div>
                <div class="art-Sheet-tc"></div>
                <div class="art-Sheet-bc"></div>

                <div class="art-Sheet-cl"></div>
                <div class="art-Sheet-cr"></div>
                <div class="art-Sheet-cc"></div>
                <div class="art-Sheet-body">
                    <div class="art-Header">
                        <div class="art-Header-jpeg"></div>
                        <div class="art-Logo">
                            <h1 id="name-text" class="art-Logo-name"><a href="<?php echo $path ?>/professor/">GDA</a></h1>

                            <div id="slogan-text" class="art-Logo-text">Gestor de Dados Acadêmicos</div>
                        </div>

                    </div>

                    <div class="art-nav">
                        <div class="l"></div>
                        <div class="r"></div>

                        <!-- menu -->
                        <ul id="nav-one" class="nav art-menu">
                            <li></li>

                        </ul>

                    </div>

                    <div class="art-contentLayout">

                        <div class="art-content">
                            <div class="art-Post">
                                <div class="art-Post-body">
                                    <div class="art-Post-inner">
                                        <div class="art-PostContent">

                                            <div style="margin-left: 300px">
                                                <h1>Erro</h1>
                                                Depois da sua última ação o servidor retornou o erro:
                                                    <br />
                                                    <br />
                                                    <h5>
                                                        <?php echo $code ?> - <?php echo $text ?>
                                                        <br/>
                                                        <br/>
                                                        <?php echo (isset($message)) ? $message : ''; ?>
                                                    </h5>

                                                    <br />
                                                    Entre em contato com o DERCA pelo email marcel@derca.ufrr.br ou pelo telefone 3621-3129 e relate o problema.
                                                
                                                <dd>
                                                    <ul class="sfTIconList">
                                                        <li class="sfTLinkMessage"><a href="javascript:history.go(-1)">Voltar para a página anterior</a></li>
                                                        <li class="sfTLinkMessage"><a href="<?php echo $path ?>/">Ir para a página inicial</a></li>
                                                    </ul>
                                                </dd>
                                            </div>
                                        </div>
                                        <div class="cleared"></div>
                                    </div>

                                    <div class="cleared"></div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="cleared"></div><div class="art-Footer">
                        <div class="art-Footer-inner">
                            <div class="art-Footer-text">
                                <p>Desenvolvido pelo <a href="http://www.cecomp.ufrr.br">Centro de Computação</a> da <a href="http://www.ufrr.br">UFRR</a></p>
                            </div>

                        </div>
                        <div class="art-Footer-background"></div>
                    </div>
                    <div class="cleared"></div>
                </div>
            </div>
            <div class="cleared"></div>
        </div>

    </body>
</html>
