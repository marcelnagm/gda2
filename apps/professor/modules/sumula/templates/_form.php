<?php use_helper('jQuery') ?>
<?php //jq_add_plugin('jquery-ui-1.7.2.custom.min.js'); ?>
<?php// jq_add_plugin('jquery.ui.datepicker-pt-BR.js'); ?>
<?php //use_stylesheet('/sfJqueryReloadedPlugin/css/ui-lightness/jquery-ui-1.7.2.custom.css') ?>
<?php use_javascripts_for_form($form) ?>
<?php use_stylesheets_for_form($form) ?>
<br />
<br />
<form action="<?php echo url_for('sumula/'.($TbturmaSumula->isNew() ? 'create' : 'update').'?id='.$sf_request->getParameter('id').'&id_sumula='.$TbturmaSumula->getIdSumula()) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
    <?php if (!$TbturmaSumula->isNew()): ?>
    <input type="hidden" name="sf_method" value="put" />
    <?php endif; ?>
    <table>
        <tfoot>
            <tr>
                <td align="center" colspan="2">
                    <?php echo $form->renderHiddenFields(false) ?>
                    <input type="submit" value="Salvar" />
<!--                    <input type="button" value="Salvar" onclick="Adicionar();"  />-->
                </td>
            </tr>
        </tfoot>
        <tbody>
            <?php echo $form->renderGlobalErrors() ?>
            <tr>
                <th><?php echo $form['data']->renderLabel() ?></th>
                <td>
                    <?php echo $form['data']->renderError() ?>
                    <?php echo $form['data'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['descricao']->renderLabel() ?></th>
                <td>
                    <?php echo $form['descricao']->renderError() ?>
                    <?php echo $form['descricao'] ?>
                </td>
            </tr>
        </tbody>
    </table>
</form>
