<?php
use_helper('I18N');
use_helper('jQuery');
use_stylesheet('/sfPropelPlugin/css/default.css');
use_stylesheet('/sfPropelPlugin/css/global.css');
?>
<h1>Matricula no semestre ...</h1>
<form action="<?php echo url_for($form->getURLPOST()) ?>" method="POST">
    <?php echo $form ?>
    <input type="submit" value="Salvar" />
</form>