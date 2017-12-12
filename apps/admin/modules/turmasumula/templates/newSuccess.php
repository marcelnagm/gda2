<?php use_helper('I18N', 'Date') ?>
<?php include_partial('turmasumula/assets') ?>
<?php use_stylesheet('/sfJqueryReloadedPlugin/css/ui-lightness/jquery-ui-1.7.2.custom.css') ?>
<?php use_javascript('/js/frm_sumulas.js'); ?>


<div id="sf_admin_container">
  <h1><?php echo __('New Turmasumula', array(), 'messages') ?></h1>

  <?php include_partial('turmasumula/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('turmasumula/form_header', array('tbturmasumula' => $tbturmasumula, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('turmasumula/form', array('tbturmasumula' => $tbturmasumula, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('turmasumula/form_footer', array('tbturmasumula' => $tbturmasumula, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
