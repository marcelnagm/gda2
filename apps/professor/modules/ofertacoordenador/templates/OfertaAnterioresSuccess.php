<?php use_helper('I18N', 'Date') ?>
<?php include_partial('ofertacoordenador/assets') ?>

<h3 align="justify"><?php echo $form->getDescricao(); ?></h3>

<div id="sf_admin_container">

<div class="sf_admin_form">
    <form action="<?php echo url_for1('oferta/OfertaAnteriores') ?>" method="post">
        <fieldset id="sf_fieldset_none">
        <div class="sf_admin_form_row sf_admin_foreignkey sf_admin_filter_field">
            <?php echo $form['id_periodo']->renderRow(); ?>
        </div>
        </fieldset>
        <fieldset id="sf_fieldset_none">
        <div class="sf_admin_form_row sf_admin_foreignkey sf_admin_filter_field">
            <?php echo $form['id_setor']->renderRow(); ?>
            <?php echo $form['id_setor']->renderHelp(); ?>
        </div>
        </fieldset>
        <br>
        <input type="submit" value="Buscar">
    </form>
</div>
 </div>

