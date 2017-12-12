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
                            <h1 id="name-text" class="art-Logo-name"><a href="<?php echo url_for('painel/index') ?>">GDA</a></h1>
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
                            <?php if ($sf_user->isAuthenticated() && $sf_user->getUsername() != 'matricula'): //&& ($sf_user->hasCredential('diretoria') || $sf_user->hasCredential('admin_usuarios') ) ?>
                                    <li>
                                        <a class="aluno" href="<?php echo url_for('@tbaluno') ?>"><span class="l"></span><span class="r"></span><span class="t"><?php echo __('Aluno') ?></span></a>
                                        <ul id="ul_new">
                                            <li><a href="<?php echo url_for('@tbhistorico') ?>"><?php echo __('Tbhistorico') ?></a></li>
                                            <li><a href="<?php echo url_for('@tbconceito') ?>"><?php echo __('Tbconceito') ?></a></li>
                                            <li><a href="<?php echo url_for('@tbalunodiploma') ?>"><?php echo __('Tbalunodiploma') ?></a></li>
                                            <li><a href="<?php echo url_for('@tbtipoingresso') ?>"><?php echo __('Tbtipoingresso') ?></a></li>
                                            <li><a href="<?php echo url_for('@tbalunosituacao') ?>"><?php echo __('Tbalunosituacao') ?></a></li>
                                            <li><a href="<?php echo url_for('@tbalunosenha') ?>"><?php echo __('Tbalunosenha') ?></a></li>
                                            <li><a href="<?php echo url_for('@tbalunosolicitacao') ?>"><?php echo 'Solicitações de Alunos' ?></a></li>
                                            <li><a href="<?php echo url_for('relatorio/index?nome=AlunoDados') ?>">Dados do Aluno</a></li>
                                            <li><a href="<?php echo url_for('@tbalunoracacor') ?>">Aluno Raça/Cor</a></li>
                                            <li><a class="" style=""href="<?php echo url_for('@tbpendencia') ?>">Pendências >></a>
                                                <ul>
                                                    <li><a href="<?php echo url_for('@tbpendencia') ?>">Pendências</a></li>
                                                    <li><a href="<?php echo url_for('@tbpendenciatipo') ?>">Tipos de Pendência</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a class="professor" href="<?php echo url_for('@tbprofessor') ?>"><span class="l"></span><span class="r"></span><span class="t"><?php echo __('Professor') ?></span></a>
                                        <ul>
                                            <li><a href="<?php echo url_for('@tbturma') ?>"><?php echo __('Tbturma') ?></a></li>
                                            <li><a href="<?php echo url_for('@tbturmasumula') ?>"><?php echo __('Tbturmasumula') ?></a></li>
                                            <li><a href="<?php echo url_for('@tbproftipovinculo') ?>"><?php echo __('Tbproftipovinculo') ?></a></li>
                                            <li><a href="<?php echo url_for('@tbprofessorsituacao') ?>"><?php echo __('Tbprofessorsituacao') ?></a></li>
                                            <li><a href="<?php echo url_for('@tbprofessorsenha') ?>"><?php echo __('Tbprofessorsenha') ?></a></li>
                                            <li><a href="<?php echo url_for('@tbprofessorticket') ?>"><?php echo 'Tickets Professor' ?></a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a class="curso" href="<?php echo url_for('@tbcurso') ?>"><span class="l"></span><span class="r"></span><span class="t"><?php echo __('Tbcurso') ?></span></a>
                                        <ul>
                                            <li><a href="<?php echo url_for('@tbcursoversao') ?>"><?php echo __('Tbcursoversao') ?></a></li>
                                            <li><a href="<?php echo url_for('@tbcurriculodisciplinas') ?>"><?php echo __('Tbcurriculodisciplinas') ?></a></li>
                                            <li><a href="<?php echo url_for('@tbturno') ?>"><?php echo __('Tbturno') ?></a></li>
                                            <li><a href="<?php echo url_for('@tbcursonivel') ?>"><?php echo 'Nivel do Curso' ?></a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a class="disciplina" href="<?php echo url_for('@tbdisciplina') ?>"><span class="l"></span><span class="r"></span><span class="t"><?php echo __('Disciplinas') ?></span></a>
                                        <ul>
                                            <li><a href="<?php echo url_for('@tbgrade_equivalente') ?>"><?php echo 'Equivalência' ?></a></li>
                                            <li><a href="<?php echo url_for('@tbdisciplinarequisitos') ?>"><?php echo __('Tbdisciplinarequisitos') ?></a></li>
                                            <li><a href="<?php echo url_for('@tbdisciplinacorequisitos') ?>"><?php echo 'Co-Requsitos de Disciplina' ?></a></li>
                                            <li><a href="<?php echo url_for('@tbcarater') ?>"><?php echo __('Tbcarater') ?></a></li>
                                            <li><a href="<?php echo url_for('@tbdisciplinasituacao') ?>"><?php echo __('Tbdisciplinasituacao') ?></a></li>
                                            <li><a href="<?php echo url_for('@tbdisciplina_ignorada') ?>"> Disciplinas Ignoradas</a></li>
                                            <li><a href="<?php echo url_for('@tbdisciplinamask') ?>"> Disciplinas Mascaradas</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a class="operacoes" href="#"><span class="l"></span><span class="r"></span><span class="t">Operações</span></a>
                                        <ul id="ul_new">
                                            <li><a class="" style="" href="#"  >Importação >></a>
                                                <ul>
                                                    <li><a href="<?php echo url_for('@tbloadfile') ?>">Arquivos de Importação</a></li>
                                                    <li><a href="<?php echo url_for('@tbloadaluno') ?>">Lista de Alunos Import</a></li>
                                                    <li><a href="<?php echo url_for('@tbalunomatricula') ?>">Lista de Alunos Pré-matriculados</a></li>
                                                    <li><a href="<?php echo url_for('@tbmatriculacomprovante') ?>">Comprovantes de Pré-matrícula</a></li>
                                                </ul>
                                            </li>
                                            <li><a class="" style="" href="#"  >Funções >></a>
                                                <ul>
                                                    <li><a href="<?php echo url_for('listaespera/index') ?>">Vagas</a></li>
                                                    <li><a href="<?php echo url_for('listaespera/ListaEspera') ?>">Lista de Espera</a></li>
                                                    <li><a href="<?php echo url_for('aluno/Abandono') ?>">Abandono de Curso</a></li>
                                                    <li><a href="<?php echo url_for('filacalouros/index') ?>">Fila dos Calouros</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="<?php echo url_for('@tbperiodo') ?>"><?php echo __('Tbperiodo') ?></a></li>
                                            <li><a href="<?php echo url_for('@tbfila') ?>"><?php echo __('Tbfila') ?></a></li>
                                            <li><a href="<?php echo url_for('@tbfilasituacao') ?>"><?php echo __('Tbfilasituacao') ?></a></li>
                                            <li><a href="<?php echo url_for('@tboferta') ?>"><?php echo __('Tboferta') ?></a></li>
                                            <li><a href="<?php echo url_for('@tbofertasituacao') ?>"><?php echo __('Situacao Oferta') ?></a></li>
                                            <li><a href="<?php echo url_for('@tbdocs') ?>"><?php echo 'Entrada e Saída de Documentos' ?></a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a class="localizacao" href="#"><span class="l"></span><span class="r"></span><span class="t">Localização</span></a>
                                        <ul>
                                            <li><a href="<?php echo url_for('@tbsala') ?>"><?php echo __('Tbsala') ?></a></li>
                                            <li><a href="<?php echo url_for('@tbsetor') ?>"><?php echo __('Tbsetor') ?></a></li>
                                            <li><a href="<?php echo url_for('polos/index') ?>">Pólos</a></li>
                                            <li><a href="<?php echo url_for('@tbcampus') ?>"><?php echo __('Tbcampus') ?></a></li>
                                            <li><a href="<?php echo url_for('@tbinstexterna') ?>"><?php echo __('Tbinstexterna') ?></a></li>
                                            <li><a href="<?php echo url_for('@tbinstexternatipo') ?>"><?php echo 'Tipo de Inst. Externa' ?></a></li>
                                            <li><a href="<?php echo url_for('@tblogradouro') ?>"><?php echo __('Tblogradouro') ?></a></li>
                                            <li><a href="<?php echo url_for('@tbbairro') ?>"><?php echo __('Tbbairro') ?></a></li>
                                            <li><a href="<?php echo url_for('@tbcidade') ?>"><?php echo __('Tbcidade') ?></a></li>
                                            <li><a href="<?php echo url_for('@tbestado') ?>"><?php echo __('Tbestado') ?></a></li>
                                            <li><a href="<?php echo url_for('@tbpais') ?>"><?php echo __('Tbpais') ?></a></li>

                                        </ul>
                                    </li>

                                    <li>
                                        <a class="outros" href="#"><span class="l"></span><span class="r"></span><span class="t">Outros</span></a>
                                        <ul>
                                            <li><a href="<?php echo url_for('@tbbanca') ?>"><?php echo __('Tbbanca') ?></a></li>
                                            <li><a href="<?php echo url_for('@tbformacao') ?>"><?php echo __('Tbformacao') ?></a></li>
                                            <li><a href="<?php echo url_for('@tbnecesespecial') ?>"><?php echo __('Tbnecesespecial') ?></a></li>
                                            <li><a href="<?php echo url_for('@tbaviso') ?>"><?php echo __('Tbaviso') ?></a></li>
                                            <li><a href="<?php echo url_for('censo2009/index') ?>">Censo 2010</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a class="relatorios" href="#"><span class="l"></span><span class="r"></span><span class="t"><?php echo __('Reports') ?></span></a>

                                        <ul id="ul_new">
                                            <li><a class="" style="" href="#"  >Gráficos >></a>
                                                <ul>
                                                    <li><a href="<?php echo url_for('relatorio/index?nome=GraficoAlunoSituacaoPorCurso') ?>">Gráfico de Situação dos alunos</a></li>
                                                    <li><a href="<?php echo url_for('relatorio/index?nome=GraficoHistoricoConceito') ?>">Gráfico de Conceitos no Histórico</a></li>                                                    
                                                </ul>
                                            </li>
                                            <li><a class="" style="" href="#"  >Aluno >></a>
                                                <ul>
                                                <?php if ($sf_user->hasCredential('aluno_diploma')): ?>
                                                    <li><a href="<?php echo url_for('relatorio/index?nome=AlunoDeclaracao') ?>">Aluno Declarações</a></li>
                                                    <li><a href="<?php echo url_for('relatorio/index?nome=AlunoHistorico') ?>">Aluno Historico</a></li>
                                                    <li><a href="<?php echo url_for('relatorio/index?nome=AlunoDiploma') ?>">Aluno Diploma</a></li>
                                                <?php endif ?>
                                                    <li><a href="<?php echo url_for('relatorio/index?nome=AbandonoDeCurso') ?>">Lista de Abandono de Curso</a></li>
                                                    <li><a href="<?php echo url_for('relatorio/index?nome=AlunosPorCurso') ?>">Lista de Alunos por Curso</a></li>
                                                    <li><a href="<?php echo url_for('relatorio/index?nome=ProvaveisFormandos') ?>">Lista de Prováveis Formandos</a></li>
                                                    <li><a href="<?php echo url_for('relatorio/index?nome=RelatorioDisciplinasCursar') ?>">Lista de Disciplinas a Cursar</a></li>
                                                    <li><a href="<?php echo url_for('relatorio/index?nome=MultiDisciplinasCursar') ?>">MultiDisciplinas a Cursar</a></li>
                                                </ul>
                                            </li>
                                            <li><a class="" style="" href="#"  >Professor >></a>
                                                <ul>
                                                    <li><a href="<?php echo url_for('relatorio/index?nome=ProfessorDeclaracao') ?>">Professor Declarações</a></li>
                                                </ul>
                                            </li>
                                            <li><a class="" style="" href="#"  >Curso >></a>
                                                <ul>
                                                    <li><a href="<?php echo url_for('relatorio/index?nome=DisciplinasOfertadas') ?>">Lista de Disciplinas Ofertadas</a></li>
                                                    <li><a href="<?php echo url_for('relatorio/index?nome=ListaDeTurmas') ?>">Lista De Turmas Por Curso</a></li>
                                                    <li><a href="<?php echo url_for('relatorio/index?nome=AlunoXSituacao') ?>">Tabela de situacao dos alunos por curso</a></li>
                                                </ul>
                                            </li>
                                            <li><a class="" style="" href="#"  >Admin >></a>
                                                <ul>                                                    
                                                    <li><a href="<?php echo url_for('relatorio/index?nome=AprovDiscEnc') ?>">Encaminhamento de Aprov. de Disc.</a></li>
                                                    <li><a href="<?php echo url_for('relatorio/index?nome=Frequencia') ?>">Freqüência</a></li>
                                                    <li><a href="<?php echo url_for('relatorio/index?nome=RelatorioReprovacao') ?>">Estatísticas de Reprovação por Curso</a></li>
                                                    <li><a href="<?php echo url_for('relatorio/index?nome=RelatorioReprovacaoDisciplinas') ?>">Estatísticas de Reprovação por Disciplinas</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                            <?php if ($sf_user->hasCredential('admin_usuarios')): ?>
                                        <li>
                                            <a class="configuracao" href="#"><span class="l"></span><span class="r"></span><span class="t">Configurações</span></a>
                                            <ul>
                                                <li><a href="<?php echo url_for('@sf_guard_user') ?>"><?php echo __('Users') ?></a></li>
                                                <li><a href="<?php echo url_for('@sf_guard_group') ?>"><?php echo __('Groups') ?></a></li>
                                                <li><a href="<?php echo url_for('@sf_guard_permission') ?>"><?php echo __('Permissions') ?></a></li>

                                            </ul>
                                        </li>
                            <?php endif ?>
                            <?php endif ?>

                            <?php if ($sf_user->isAuthenticated() && $sf_user->getUsername() == 'matricula'): ?>
                                            <!--                                            <li>
                                                                                            <a class="aluno" href="<?php echo url_for1('matricula/NovoAluno'); ?>" ><span class="l"></span><span class="r"></span><span class="t"><?php echo __('Cadastro de Alunos') ?></span></a>
                                                                                        </li>-->
                            <?php endif ?>
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
