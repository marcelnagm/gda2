<style type="text/css">
.art-PostContent tr {
    border: none;
}

.art-PostContent td {
    border: none;
}

fieldset {
    border: none;
}
</style>

<div align="center">
    <form action="<?php echo url_for('validar/Pesquisa') ?>" method="post">
        <?php if (isset($form['_csrf_token'])) echo $form['_csrf_token'] ?>
        <h2 style="text-align: center">Digite os dados que constam na declaração:</h2>
        <fieldset>
            <table>
            <?php foreach ($form->getFields() as $name => $type): ?>
                <div class="<?php echo 'sf_admin_form_row sf_admin_' . strtolower($type) . ' sf_admin_form_field_' . $name ?>">
                    <tr><td colspan="2"><?php echo $form[$name]->renderError() ?></td></tr>
                    <tr>
                        <td align="right"><b style="font-size: medium"><?php echo $form[$name]->renderLabel() . ':' ?></b></td>
                        <td><div class="content"><?php echo $form[$name]->render() ?></div></td>
                    </tr>
                </div>
            <?php endforeach; ?>
            </table>
        </fieldset>
        <input align="center" type="submit" value="Continuar" />
    </form>
</div>