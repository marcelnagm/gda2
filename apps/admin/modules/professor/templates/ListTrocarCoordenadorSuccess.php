<?php use_helper('I18N', 'Date') ?>
<?php include_partial('professor/assets') ?>

<?php if(isset ($form)){ ?>

<h3 align="justify"><?php echo $form->getDescricao(); ?></h3>

<div id="sf_admin_container">

<div class="sf_admin_form">
    <form action="<?php echo url_for('professor/ListTrocarCoordenador') ?>" method="post">
        <?php echo $form->renderHiddenFields(); ?>
        <fieldset id="sf_fieldset_none">
        <div class="sf_admin_form_row sf_admin_foreignkey sf_admin_filter_field">
            <?php echo $form; ?>
        </div>
        </fieldset>        
        <br>
        <input type="submit" value="Trocar">
    </form>
</div>
 </div>
<?php }else{ ?>
<?php if(isset ($message)){?>
<div class="error"> <?php echo $message?></div>
<?php }else{ ?>
Foi trocado o Coordenador do curso.
<?php }?>
<?php }?>