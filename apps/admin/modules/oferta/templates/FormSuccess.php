<?php
use_helper('I18N');
use_helper('jQuery');
use_stylesheet('/sfPropelPlugin/css/default.css');
use_stylesheet('/sfPropelPlugin/css/global.css');
?>
<h1>Cadastrar Oferta para Calouros ...</h1>
<form action="<?php echo url_for($form->getURLPOST()) ?>" method="POST">
    <?php  if(isset ($form['_csrf_token'] )) echo $form['_csrf_token'] ?>
    <fieldset id="sf_fieldset_none">

        <?php foreach ($form->getFields() as $name => $type): ?>
            <div class="<?php echo 'sf_admin_form_row sf_admin_' . strtolower($type) . ' sf_admin_form_field_' . $name ?>">
            <?php echo $form[$name]->renderError() ?>
            <div>
                <?php echo (($name != 'ids') ? ($form[$name]->renderLabel() . ":") : "") ?>
                <div class="content"><?php echo $form[$name]->render() ?></div>
                <br>
            </div>
        </div>
        <?php endforeach; ?>

    </fieldset>
    <input type="submit" value="Salvar" />
</form>