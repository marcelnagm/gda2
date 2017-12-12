<?php
use_helper('I18N');
use_helper('jQuery');
use_stylesheet('/sfPropelPlugin/css/default.css');
use_stylesheet('/sfPropelPlugin/css/global.css');
?>
<div id="sf_admin_container">
    <h1>Novas Pendências</h1>
    <br />
    <div class="sf_admin_form">
        <form class="relatorio-form" action="<?php echo url_for($form->getURLPost()) ?>" method="POST">
            <?php  if(isset ($form['_csrf_token'] )) echo $form['_csrf_token'] ?>
            <?php if ($form->hasGlobalErrors()): ?>
                <?php echo $form->renderGlobalErrors() ?>
            <?php endif; ?>
            <fieldset id="sf_fieldset_none">

                <?php foreach ($form->getFields() as $name => $type): ?>

                    <?php include_partial('form_field', array(
                            'name'       => $name,
                            'help'       => null,
                            'form'       => $form,
                            'field'      => $form[$name],
                            'type'       => $type,
                            'class'      => 'sf_admin_form_row sf_admin_'.strtolower($type).' sf_admin_form_field_'.$name,
                            )) ?>

                <?php endforeach; ?>

            </fieldset>
            <?php //echo $form; ?>
            <input type="submit" value="Salvar"/>
        </form>
    </div>
</div>
