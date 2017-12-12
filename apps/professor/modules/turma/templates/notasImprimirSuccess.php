<?php

#use_stylesheet('/css/impressao.css');

$professor = $sf_user->getAttribute('professor');

use_helper('Date');

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <title>Notas</title>
        <link rel="stylesheet" type="text/css" href="/professor/css/lista_notas.css" />
        <link rel="stylesheet" type="text/css" href="/professor/css/impressao.css" />
    </head>
    <body>
        <div align="center" style="margin:3px">

            <table border=0 width=735 cellpadding=17 cellspacing=1 bgcolor="#FFFFFF"><tr><td align=center valign=middle>

                        <div align="center">
                            <div class="content">
                                <h1>Universidade Federal de Roraima</h1>
                                <h1>Departamento de Registro e Controle Acadêmico - DERCA</h1>
                                <h1>Notas</h1>
                                <br>
                                <?php include_component('turma','info',array('id_turma'=>$sf_request->getParameter('id'))) ?>
                            </div>


                            <br>

                            <!-- Disciplina -->
                            <div class="content" align="center" style="padding-left:1px;padding-right:1px">

                                <?php if(count($tbturmaAlunos)) : ?>

                                <table class="formnotas" bordercolor="#000000" border="1" style="border-collapse: collapse; border: 1px solid black; font-size: 12px;">
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

                                            $countAlunos = count($tbturmaAlunos);
                                            $tabIndex = 0;

                                            foreach ($tbturmaAlunos as $k=>$ta):

                                                ?>

                                        <tr id="linha<?php echo $ta->getIdAluno() ?>" class="sf_admin_row <?php echo ($k % 2) ? 'even':'odd' ?>">
                                            <td><?php echo $ta->getMatricula() ?></td>
                                            <td><?php echo $ta->getTbaluno()->getNome() ?></td>
                                            <td class="caixa">
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
                                            <td class="caixa">
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
                                        </tr>
                                            <?php endforeach; ?>
                                    </tbody>
                                </table>
                                    <?php include_component('turma','legendaConceito') ?>
                                <?php else: ?>
                                Nenhum registro
                                <?php endif ?>

                            </div>
                        </div>
                        <br>
                        <br>

                        <div align="center">
                            <div id="assinatura">
                                Assinatura do(a) professor(a)
                            </div>
                        </div>
                        <br>
                    </td></tr>
            </table>


    </body>
</html>
