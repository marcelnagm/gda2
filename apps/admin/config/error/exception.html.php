<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php $path = sfConfig::get('sf_relative_url_root', preg_replace('#/[^/]+\.php5?$#', '', isset($_SERVER['SCRIPT_NAME']) ? $_SERVER['SCRIPT_NAME'] : (isset($_SERVER['ORIG_SCRIPT_NAME']) ? $_SERVER['ORIG_SCRIPT_NAME'] : ''))) ?>

<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>GDA 2 - Erro: <?php echo $code ?> - <?php echo $text ?></title>
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
                            <h1 id="name-text" class="art-Logo-name"><a href="<?php echo $path ?>/admin/">GDA</a></h1>

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

                                            <div style="margin-left: 270px">
                                                <h1>
                                                    <img style="float: left; margin-right:10px; vertical-align: middle" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABwAAAAZCAYAAAAiwE4nAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAEfklEQVRIx7VUa0wUVxT+Znd2FxZk0YKACAtaGwEDUhUTBTEIItmKYk3UNqalD7StMSQ1JKatP5omTYyx0VRrjPERX7XWAG2t9GVi3drU2h+gi4BCWV67lOe6O/uYmXtPf0BRrMBK6UlObmbON9935p6HQEQI1o7uXeSy1dsjHn2Xlpr0oKzililoEiIKymvOr9q+pzyZZN894moHcbWDZN892lOeTN9fKHgrWB5NsInZ7joOrtv4JgR2F4r0AxTpRwisEes2bsNtW+eBYHmCEqw8kVsp6oy6jMUFYIoTxFUQqWBqNzIWr4aoC9NVnlxZNSWC1mqLsa6ubd36zbug+m3gXBlypoCYAuavx4Ytu1Fbay+2VluME/GJEwHsnT3WpLlzhbi4Z6D46gBosP/gVQDA669kIzJSRWxcApLnPie0dw3cALBw0k1z5dyKrIqyWHL1/Eye7n3kcX5MH75fRAAIAJUUZ5Cnez9JPYfI1XuDKsriqOZcbtakm6alte/yqsIi6LVt4KobxAIAqSPxwUEJxAPgqgcG0YH8NS+gxT5wZVI1/PrU0q1O54OoFfmvQZZsIBYA5zIy0maOYFZmJ4GYAuIyZG8jcvLfgMPhmnHlbG7pUws2NfUeWVvyMpj3d3DVB84C4MyPxNkP+8I0TQRn/qGY6gP316J4w6uob3AceirBzw9nnBD1RmN65nLIUhOIBUBcBjEZ5viQEZx5thFcdQ+50o+A5w7SM5dBFHWhFz5bdOpJ3MLjq63mdHrIr7f6PaXbPtBGht4DUwYAQXikyVTkb/gKtbYBNFpzYYoY3egarR6D7jCcPmtly5ZEh6/ZWucfdyycPep3ycmJ2phoAzx9ziERLoMzN4hJAICI8KEkp4VxcCaP+p4zGdHTw2FOiNB2OTzfAMgf80qrjmem1zf256zf9B6kvmvgqgeqrw2qvx1cGQRxBcQV5GRFIGepaeT5cfdJXbAUPY+79z15l47MWzDmH7a3P/g2Ly9X4O6LkKUWEPeOMbwMpnANiClPDkOBXteL3OXxQnNL72UA5n/V8NLR9Bdrb/ddLN+5VvD23wTA8d9MgNH0LD759DrS5oeUbN7RWjXqSu//OXi8sCBFkN11IFJAxMZ0e4cP12+6xsUQqZC9nShclYTWtsDJUTU8cyDlsE7URqTMC4Eiu8fN+/JVF7I3NuGlna2wlDaPi1VkN1LnR0GvF00n95kPAICm+tgcQ9N9V5ll9Tz4JSem2vySE5bCFDS3+t+uPjbHIA64dF/MioU2aoYGXndgQgJLngnWL0PR1iUje0n4hHimBhA1XYA5IVz8q1eu0oSGqCc6HV4ihAIQgso6MV4flNhDUR/iYqbBI1GqZtM7zVUzZ4p3rl5rQIgxesqvVCsa0O8y4Lc/nGp8rLhcBIA7Df7C7hlKe2ZGojYmZsGUCsqygvOnf6FZsbrtm3bY+wUigiAIC/funlXR0RXYgv/BzAmGn979qGvXyOALghAJQAtAB0A/fIrDY6MNurj/LBqADW8OFYACQB4+2d80or7Ra0ZtxAAAAABJRU5ErkJggg==" />
                                                    Erro
                                                </h1>
                                                Depois da sua última ação o servidor retornou o erro:
                                                <br />
                                                <h2>
                                                    <?php echo $code ?> - <?php echo $text ?>
                                                </h2>
                                                <h3 id="message"><?php echo str_replace("\n", '<br />', htmlspecialchars($message, ENT_QUOTES, sfConfig::get('sf_charset', 'UTF-8'))) ?></h3>
                                                <br />

                                                Entre em contato com o CECOMP pelo <a href="http://www.suporte.ufrr.br">OCOMON</a> ou pelo telefone 3172 e relate o problema.

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
