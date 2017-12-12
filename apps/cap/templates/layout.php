<?php
use_helper('I18N', 'jQuery');

jq_add_plugin('jquery-ui-1.7.2.custom.min.js');
jq_add_plugin('jquery.filter.js');
use_javascript('/js/main.js')
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">
    <head>
        <?php include_http_metas() ?>
        <?php include_metas() ?>
        <?php include_title() ?>
        <link rel="shortcut icon" href="/favicon.ico" />
        <?php include_stylesheets() ?>
        <!--[if IE 6]><link rel="stylesheet" href="/professor/css/style.ie6.css" type="text/css" media="screen" /><![endif]-->
        <!--[if IE 7]><link rel="stylesheet" href="/professor/css/style.ie7.css" type="text/css" media="screen" /><![endif]-->

        <?php include_javascripts() ?>
        <?php #use_javascript('/js/tinymce/jscripts/tiny_mce/tiny_mce.js')  ?>        
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
                            <h1 id="name-text" class="art-Logo-name">GDA</h1>
                            <div id="slogan-text" class="art-Logo-text">Gestor de Dados Acadêmicos</div>
                        </div>
                        <?php if ($sf_user->isAuthenticated()): ?>
                            <div class="user-info-box">
                                <span><?php echo __('Username') ?>: <?php echo ($sf_user) ? $sf_user->getUsername() : '' ?></span>
                                <a class="trocar-senha" href="<?php echo url_for('@usuario') ?>">
                                <?php echo __('Change password') ?>
                            </a>
                            <a class="logout" href="<?php echo url_for('@sf_guard_signout') ?>">
                                <?php echo __('Logout') ?>
                            </a>
                        </div>
                        <?php endif ?>
                            </div>
                            <div class="art-nav">
                                <div class="l"></div>
                                <div class="r"></div>

                                <!-- menu -->
                                <ul id="nav-one" class="nav art-menu ul_new">
                                    <li>
                                        <a class="aluno" href="<?php echo url_for('@aluno') ?>"><span class="l"></span><span class="r"></span><span class="t"><?php echo __('Aluno') ?></span></a>
                                    </li>
                                        </ul>

                                    </div>
                                    <div class="art-contentLayout">

                                        <div class="art-content">
                                            <div class="art-Post">
                                                <div class="art-Post-body">
                                                    <div class="art-Post-inner">
                                                        <div class="art-PostContent">
                                            <?php echo $sf_content ?>
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
                                <p>Dúvidas, reclamações e sugestões, favor enviar email para: <a href="mailto:george.pereira@ufrr.br">george.pereira@ufrr.br</a></p>
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
