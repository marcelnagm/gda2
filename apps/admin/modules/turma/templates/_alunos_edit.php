<?php
$TbturmaAlunos = $tbturma->getTbturmaAlunos();
?>
<fieldset class="sf_fieldset_none">
    <a name="alunos"></a>
    <h2>Alunos</h2>
    <div class="sf_admin_form_row">

        <?php if ($sf_user->hasFlash('notice_alunos')): ?>
        <div class="notice"><?php echo __($sf_user->getFlash('notice_alunos'), array(), 'sf_admin') ?></div>
        <?php endif; ?>

        <ul class="sf_admin_actions">
            <li class="sf_admin_action_new">
                <a href="<?php echo url_for('turmaaluno/new?id_turma='.$tbturma->getIdTurma()) ?>">Incluir Aluno</a>
            </li>
        </ul>


        <table>
            <thead>
                <tr>
                    <th rowspan="2" width="50">
                        Matrícula
                    </th>
                    <th rowspan="2" width="250">
                        Nome
                    </th>
                    <th rowspan="2">
                        Ações
                    </th>
                </tr>

            </thead>
            <tbody>
                <?php if( ! count($TbturmaAlunos) ): ?>

                <tr><td colspan="3">Não há alunos cadastrados nesta turma</td></tr>

                <?php else: ?>
                    <?php foreach ($TbturmaAlunos as $k=>$ta): ?>

                <tr class="sf_admin_row <?php echo ($k % 2) ? 'even':'odd' ?>">
                    <td><?php echo $ta->getMatricula() ?></td>
                    <td>
                                <?php if($ta->getTbaluno()): ?>
                        <a class="alunosituacao<?php echo $ta->getTbaluno()->getIdSituacao() ?>" href="<?php echo url_for( 'aluno/edit?matricula='.$ta->getMatricula() ) ?>" title="Situação do aluno: <?php echo $ta->getTbaluno()->getTbalunosituacao() ?>">
                                        <?php echo $ta->getTbaluno()->getNome() ?>
                        </a>
                                <?php else: ?>
                        (matrícula inexistente)
                                <?php endif ?>
                    </td>
                    <td>
                        <ul class="sf_admin_td_actions">
                                    <?php echo $helper->linkToAlunosDelete($ta, array(  'params' =>   array(  ),  'confirm' => 'Are you sure?',  'class_suffix' => 'delete',  'label' => 'Delete',)) ?>
                        </ul>
                    </td>

                </tr>
                    <?php endforeach; ?>
                <?php endif ?>
            </tbody>
        </table>



    </div>

</fieldset>