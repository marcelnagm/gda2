<?php

use_stylesheet('/css/lista_notas.css');
use_stylesheet('/sfPropelPlugin/css/default.css');
use_stylesheet('/sfPropelPlugin/css/global.css');

use_helper('I18N');
?>
<div id="sf_admin_container">

    <h1>Notas</h1>

    <?php include_component('turma','info', array( 'tbturma' => $tbturma )) ?>

    <?php if( ! $tbturma->getTbturmaAlunos()->count() ): ?>

    <span id="status" class="erro semSeta" style="display: block;position:static;width: 300px;margin:0px auto;text-align: center"><span>Não há alunos cadastrados nesta turma</span></span>

    <?php else: ?>

    <div class="info">
        Número de Avaliações: <?php echo $tbturma->getNNotas() ?>
    </div>
    <br clear="all" />

    <div class="sf_admin_list">
        <ul class="sf_admin_actions">
            <li class="sf_admin_action_edit">
                <a href="<?php echo url_for('turma/edit?id_turma='.$tbturma->getIdTurma()."#alunos") ?>">Editar lista de alunos</a>
            </li>
        </ul>
        <table class="formnotas">
            <thead>
                <tr>
                    <th rowspan="2" width="50">
                        Matrícula
                    </th>
                    <th rowspan="2" width="250">
                        Nome
                    </th>
                    <th rowspan="2">
                        Faltas
                    </th>
                    <th colspan="<?php echo ($tbturma->getNNotas() + 1) ?>">
                        Nota<?php echo ($tbturma->getNNotas()>1)?'s':''?>
                    </th>
                    <th rowspan="2">
                        Exame
                        <br>
                        Rec.
                    </th>
                    <th rowspan="2">
                        Média
                        <br>
                        Final
                    </th>
                    <th rowspan="2">
                        Conceito<b>*</b>
                    </th>
                </tr>
                <tr>
                        <?php for ($i=0;$i<$tbturma->getNNotas();$i++): ?>
                    <th class="caixa"><?php echo ($i+1) ?>a.</th>
                        <?php endfor ?>

                    <th>
                        Média
                        <br>
                        Parcial
                    </th>
                </tr>
            </thead>
            <tbody>

                    <?php

                    $countAlunos = $tbturma->getTbturmaAlunos()->count();
                    $tabIndex = 0;

                    foreach ($tbturma->getTbturmaAlunos() as $k=>$ta):

                        ?>

                <tr id="linha<?php echo $ta->getIdAluno() ?>" class="sf_admin_row <?php echo ($k % 2) ? 'even':'odd' ?>">
                    <td><?php echo $ta->getMatricula() ?></td>

                            <?php if($ta->getTbaluno() != null) : ?>
                    
                    <td><a class="alunosituacao<?php echo $ta->getTbaluno()->getIdSituacao() ?>" href="<?php echo url_for( 'aluno/edit?matricula='.$ta->getMatricula() ) ?>" title="Situação do aluno: <?php echo $ta->getTbaluno()->getTbalunosituacao() ?>"><?php echo $ta->getTbaluno()->getNome() ?></a></td>
                    <td>
                        <span id="faltas_<?php echo $ta->getIdAluno() ?>" class="objNota"><?php echo $ta->getFaltas() ?></span>
                    </td>

                                <?php

                                for ($nNota=1; $nNota <= $tbturma->getNNotas(); $nNota++):

                                    $campoNota['id']    = "nota_{$ta->getIdAluno()}_$nNota";
                                    $campoNota['name']  = "form[{$ta->getIdAluno()}][nota][$nNota]";
                                    $campoNota['value'] = (@isset($notas[$ta->getIdAluno()][$nNota])) ? $notas[$ta->getIdAluno()][$nNota] : '';


                                    ?>

                    <td class="caixa">
                        <span id="<?php echo $campoNota['id']  ?>" class="objNota"><?php echo $campoNota['value'] ?></span>
                    </td>

                                <?php endfor ?>

                    <td class="mp">
                        <span id="mp_<?php echo $ta->getIdAluno() ?>">
                                        <?php echo $ta->getMediaParcial()?>
                        </span>
                    </td>
                    <td>
                        <span id="notaer_<?php echo $ta->getIdAluno() ?>" class="objNota"><?php echo $ta->getExameRecuperacao() ?></span>
                    </td>
                    <td class="mf">
                        <span id="mf_<?php echo $ta->getIdAluno() ?>">
                                        <?php echo $ta->getMediaFinal() ?>
                        </span>
                    </td>
                    <td class="conceito">
                        <span id="c_<?php echo $ta->getIdAluno() ?>" class="conceito<?php echo $ta->getIdConceito() ?>">
                                        <?php echo $ta->getIdConceito() ?>
                        </span>
                    </td>
                            <?php else: ?>
                    <td colspan="10">aluno não cadastrado</td>
                            <?php endif ?>
                </tr>

                    <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div align="center">
        <div id="legenda" align="left" class="conceito">
            <b>* Legenda:</b>
            <br>
            <span class="conceito1">1</span> = Aprovado
            <br>
            <span class="conceito2">2</span> = Reprovado por nota
            <br>
            <span class="conceito3">3</span> = Reprovado por falta
            <br>
            <span class="conceito4">4</span> = Aprovado com exame de recuperação
        </div>
        <br>
        Observação: O aluno só tem direito a fazer o Exame de Recuperação se <br>a Média Parcial for maior ou igual a 6 e menor que 7.
    </div>
    <?php endif ?>
</div>