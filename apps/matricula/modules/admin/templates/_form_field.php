<?php if($form[$name]->isHidden()): ?>
<?php echo $form[$name] ?>
<?php else: ?>
<div class="<?php echo $class ?><?php $form[$name]->hasError() and print ' errors' ?>">
    <?php echo $form[$name]->renderError() ?>
    <div>
        <?php echo $form[$name]->renderLabel() ?>

        <div class="content"><?php echo $form[$name] ?></div>

        <?php if ($help): ?>
        <div class="help"><?php echo __($help, array(), 'messages') ?></div>
        <?php elseif ($help = $form[$name]->renderHelp()): ?>
        <div class="help"><?php echo $help ?></div>
        <?php endif; ?>
    </div>
</div>
<?php endif ?>
