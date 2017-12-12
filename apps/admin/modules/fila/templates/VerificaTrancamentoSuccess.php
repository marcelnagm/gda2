<?php
use_helper('I18N');
use_helper('jQuery');
use_stylesheet('/sfPropelPlugin/css/default.css');
use_stylesheet('/sfPropelPlugin/css/global.css');
?>
<h1>Trancamento de Disciplinas - Remoção das Turmas...</h1>
<form action="<?php echo url_for('fila/VerificaTrancamento') ?>" method="POST">
    <?php echo $form ?>
    <input type="submit" value="Salvar" />
</form>