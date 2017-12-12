<?php
use_helper('I18N');
use_helper('jQuery');
use_stylesheet('/sfPropelPlugin/css/default.css');
use_stylesheet('/sfPropelPlugin/css/global.css');
?>
<h1>Aluno - Alterar Data de Ingresso para...</h1>
<form action="<?php echo url_for('aluno/AlteraDtIngresso') ?>" method="POST">
    <?php echo $form ?>
    <input type="submit" value="Salvar" />
</form>