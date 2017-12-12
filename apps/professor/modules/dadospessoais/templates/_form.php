<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<span class="art-button-wrapper">
    <span class="l"> </span>
    <span class="r"> </span>
    <a class="voltar" href="<?php echo url_for('dadospessoais/index') ?>">Voltar</a>
</span>
<br />
<br />
<form action="<?php echo url_for('dadospessoais/update') ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
    <?php if (!$professor->isNew()): ?>
    <input type="hidden" name="sf_method" value="put" />
    <?php endif; ?>

    <table>
        <tfoot>
            <tr>
                <td colspan="2" align="center">
                    <?php echo $form->renderHiddenFields(false) ?>
                    <input type="submit" value="Salvar" />
                </td>
            </tr>
        </tfoot>
        <tbody>
            <?php echo $form->renderGlobalErrors() ?>
            <tr>
                <th>Nome:</th>
                <td><?php echo $professor->getNome() ?></td>
            </tr>
            <tr>
                <th>Código:</th>
                <td><?php echo $professor->getMatriculaProf() ?></td>
            </tr>
            <tr>
                <th>SIAPE:</th>
                <td><?php echo $professor->getSiape() ?>
                </td>
            </tr>
            <tr>
                <th>Curso: </th>
                <td>
                    <?php echo $professor->getTbcurso() ?>
                </td>
            </tr>
            <tr>
                <th>Setor: </th>
                <td>
                    <?php echo $professor->getTbsetor() ?>
                </td>
            </tr>

            <tr>
                <th><?php echo $form['celular']->renderLabel() ?></th>
                <td>
                    <?php echo $form['celular']->renderError() ?>
                    <?php echo $form['celular'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['fone_residencial']->renderLabel() ?></th>
                <td>
                    <?php echo $form['fone_residencial']->renderError() ?>
                    <?php echo $form['fone_residencial'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['email']->renderLabel() ?></th>
                <td>
                    <?php echo $form['email']->renderError() ?>
                    <?php echo $form['email'] ?>
                </td>
            </tr>

        </tbody>
    </table>
</form>
