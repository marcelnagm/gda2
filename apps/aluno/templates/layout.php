<?php

use_helper('I18N');
use_helper('jQuery');

$aluno = $sf_user->getAttribute('aluno');

//$indexPage="/aluno/index.php";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="pt-BR" xml:lang="pt">
    <head>
        <?php include_http_metas() ?>
        <?php include_metas() ?>
        <?php include_title() ?>
        <link rel="shortcut icon" href="/favicon.ico" />
        <?php include_stylesheets() ?>
        <script type="text/javascript" src="/aluno/js/fixlayout.js"></script>
        <!--[if IE 6]><link rel="stylesheet" href="/aluno/css/style.ie6.css" type="text/css" media="screen" /><![endif]-->
        <!--[if IE 7]><link rel="stylesheet" href="/aluno/css/style.ie7.css" type="text/css" media="screen" /><![endif]-->

        <?php include_javascripts() ?>

    </head>
    <body>
    <!--[if lte IE 6]>
    <div style="position:relative;z-index:3000;width:300px; margin-left:40%; padding:5px; border: 2px solid orange;background-color: #FFFF00">
    <h1 style="padding:0;margin:0">Atualize o seu navegador de internet</h1>
    Use:
    <ul style="margin-left:20px">
    <li>Firefox 3.0 ou versão mais atual
    </li>
    <li>Internet Explorer 7 ou versão mais atual</li>
    </ul> </div><br/>
    <![endif]-->
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
                            <h1 id="name-text" class="art-Logo-name"><a href="<?php echo $indexPage ?>">GDA</a></h1>
                            <div id="slogan-text" class="art-Logo-text">Gestor de Dados Acadêmicos</div>
                        </div>
                        <?php if( $sf_user->isAuthenticated() ): ?>
                        <div class="user-info-box">
                            <a class="icone-pequeno sair" href="<?php echo url_for('@auth_signout') ?>">
                                    <?php echo __('Logout') ?>
                            </a>
                            <?php include_component('dadospessoais','info',array('aluno'=>$aluno))  ?>
                        </div>
                        <?php endif ?>
                    </div>
                    <div class="art-nav">
                        <div class="l"></div>
                        <div class="r"></div>

                        <!-- menu -->
                        <ul id="nav-one" class="nav art-menu">
                            <?php if( $sf_user->isAuthenticated() ): ?>
                            <li>
                                <a class="painel" href="<?php echo url_for('painel/index') ?>">
                                    <span class="l"></span>
                                    <span class="r"></span>
                                    <span class="t">Painel</span>
                                </a>
                            </li>
                            <li>
                                <a class="dados-pessoais" href="<?php echo url_for('dadospessoais/index') ?>">
                                    <span class="l"></span>
                                    <span class="r"></span>
                                    <span class="t">Dados Pessoais</span>
                                </a>
                            </li>
                            <li>
                                <a class="icone-pequeno book-small" href="<?php echo url_for('historico/index') ?>">
                                    <span class="l"></span>
                                    <span class="r"></span>
                                    <span class="t">Histórico</span>
                                </a>
                            </li>
                            <li>
                                <a class="icone-pequeno lista-small" href="<?php echo url_for('oferta/index') ?>">
                                    <span class="l"></span>
                                    <span class="r"></span>
                                    <span class="t">Oferta</span>
                                </a>
                            </li>
                            <li>
                                <a class="icone-pequeno lista2-small" href="<?php echo url_for('fila/index') ?>">
                                    <span class="l"></span>
                                    <span class="r"></span>
                                    <span class="t">Fila Eletrônica</span>
                                </a>
                            </li>
                            <li>
                                <a class="icone-pequeno foldertable-small" href="<?php echo url_for('grade/index') ?>">
                                    <span class="l"></span>
                                    <span class="r"></span>
                                    <span class="t">Grade do curso</span>
                                </a>
                            </li>
                            <li>
                                <a class="icone-pequeno docs-small" href="<?php echo url_for('docs/index') ?>">
                                    <span class="l"></span>
                                    <span class="r"></span>
                                    <span class="t">Documentos</span>
                                </a>
                            </li>
                            <li>
                                <a class="icone-pequeno contato-small" href="<?php echo url_for('aviso/Contato') ?>">
                                    <span class="l"></span>
                                    <span class="r"></span>
                                    <span class="t">Contato</span>
                                </a>
                            </li>
                            <?php endif ?>
                        </ul>

                    </div>
                    <div class="art-contentLayout">

                        <div class="art-content">
                            <div class="art-Post">
                                <div class="art-Post-body">
                                    <div class="art-Post-inner">
                                        <div id="conteudo" class="art-PostContent">
                                            <noscript>
                                                <h2 style="background-color:red;color:#FFF;text-align: center">O javascript deve estar habilitado para que este sistema funcione corretamente.</h2>
                                            </noscript>
                                            <?php if ($sf_user->hasFlash('notice')): ?>
                                            <div class="notice">
                                                    <?php echo $sf_user->getFlash('notice') ?>
                                            </div>
                                            <?php endif ?>
                                            <?php if ($sf_user->hasFlash('error')): ?>
                                            <div class="error">
                                                    <?php echo $sf_user->getFlash('error') ?>
                                            </div>
                                            <?php endif ?>

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
                                <p>Dúvidas, reclamações e sugestões, favor enviar email para: <a href="mailto:everson.peixoto@ufrr.br">everson.peixoto@ufrr.br</a></p>
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
