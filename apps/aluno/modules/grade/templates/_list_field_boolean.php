<?php use_helper('I18N'); ?>
<?php if ($value): ?>
  <?php echo image_tag('/images/tick.png', array('alt' => __('Disciplina cursada'), 'title' => __('Disciplina cursada'))) ?>
<?php else: ?>
  &nbsp;
<?php endif; ?>
