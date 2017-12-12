<?php use_helper('I18N') ?>
<h1><?php echo 'Historico' ?></h1>
<?php //$aluno = new Tbaluno(); ?>
<div class="info">
    <?php if (isset($aluno)) { ?>
   <?php  include_partial('relatorio/list_info_aluno',array('aluno' => $aluno))?>
    <p/>    
    <?php } ?>
</div>

<?php if (isset($list2)): ?>
<h4>  Lista de Disciplinas a Cursar</h4>
<?php include_partial('relatorio/list_fields', array('list' => $list2, 'show_fields' => $show_fields2, 'data_fields' => $data_fields2)) ?>
<?php endif; ?>

<?php if (isset($list)): ?>
<h4>  Historico</h4>
<?php include_partial('relatorio/list_fields', array('list' => $list, 'show_fields' => $show_fields, 'data_fields' => $data_fields)) ?>
<?php endif; ?>

