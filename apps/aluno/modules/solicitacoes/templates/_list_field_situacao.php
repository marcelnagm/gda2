<?php use_helper('I18N'); ?>
<?php if ($value == 'pendente'): ?>
  <?php echo image_tag('/images/pendente.png', array('alt' => 'Pendente de Analise', 'title' => 'Pendente de Analise')) ?>
<?php endif; ?>
<?php if ($value == 'concluida'): ?>
  <?php echo image_tag('/images/tick.png', array('alt' => 'Deferido/Feito', 'title' => 'Deferido/Feito')) ?>
<?php endif; ?>
<?php if ($value == 'cancelada'): ?>
  <?php echo image_tag('/images/atencao.png', array('alt' => 'Cancelado ', 'title' => 'Cancelado ')) ?>
<?php endif; ?>
<?php if ($value == 'falta-info'): ?>
  <?php echo image_tag('/images/info.png', array('alt' => 'Cancelado por Falta de Informações', 'title' => 'Cancelado por Falta de Informações')) ?>
<?php endif; ?>
  &nbsp;

