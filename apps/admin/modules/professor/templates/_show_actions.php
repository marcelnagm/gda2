<ul class="sf_admin_actions">
  <?php echo $helper->linkToDelete($object, array(  'params' =>   array(  ),  'confirm' => 'Are you sure?',  'class_suffix' => 'delete',  'label' => 'Delete',)) ?>
  <?php echo $helper->linkToEdit($object, array(  'params' =>   array(  ),   'class_suffix' => 'edit',  'label' => 'Edit',)) ?>
  <?php #echo $helper->linkToBack(array(  'params' =>   array(  ),  'class_suffix' => 'back',  'label' => 'Back',)) ?>
</ul>
