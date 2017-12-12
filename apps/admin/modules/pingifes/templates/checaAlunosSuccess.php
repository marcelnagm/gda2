<?php
use_helper('I18N');
use_helper('jQuery');
use_stylesheet('/sfPropelPlugin/css/default.css');
use_stylesheet('/sfPropelPlugin/css/global.css');
?>

<h1>PINGIFES - Checar alunos por matrícula</h1>

<?php if (isset($alunos)): ?>
Total: <?php echo count($alunos) ?>
    <table>
        <tr>
            <th>Matrícula</th>
            <th>Nome</th>
            <th>Curso</th>
            <th>Situação</th>
            <th>Testes</th>
        </tr>
        <?php foreach ($alunos as $aluno): ?>
            <tr>
                <td>
                    <?php if (isset($aluno['situacao'])): ?>
                        <a href="<?php echo url_for('aluno/edit?matricula='.$aluno['matricula']) ?>">
                            <?php echo $aluno['matricula'] ?>
                        </a>
                    <?php else: ?>
                        <?php echo $aluno['matricula'] ?>
                    <?php endif; ?>

                </td>
                <td><?php echo @$aluno['nome'] ?></td>
                <td><?php echo @$aluno['curso'] ?></td>
                <td><?php echo @$aluno['situacao'] ?></td>
                <td>
                    <ul>
                        <?php if(isset($aluno['testes'])) foreach ($aluno['testes'] as $v): ?>
                            <li><?php echo $v ?></li>
                        <?php endforeach; ?>
                    </ul>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <hr />

<?php endif; ?>

<form action="<?php echo url_for('pingifes/checaAlunos') ?>" method="POST">
    <?php if (isset($form['_csrf_token'])) echo $form['_csrf_token'] ?>
    <fieldset id="sf_fieldset_none">

        <?php foreach ($form->getFields() as $name => $type): ?>
            <div class="<?php echo 'sf_admin_form_row sf_admin_' . strtolower($type) . ' sf_admin_form_field_' . $name ?>">
                <?php echo $form[$name]->renderError() ?>
                <div>
                    <?php echo $form[$name]->renderLabel() . ":" ?>
                    <div class="content"><?php echo $form[$name]->render() ?></div>
                    <br>
                </div>
            </div>
        <?php endforeach; ?>

    </fieldset>
    <input type="submit" value="Enviar" />
</form>