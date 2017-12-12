<?php
use_helper('I18N');
use_helper('jQuery');
use_stylesheet('/sfPropelPlugin/css/default.css');
use_stylesheet('/sfPropelPlugin/css/global.css');
?>
<div id="sf_admin_container">
    <h1>Turmas - Transferir notas para o histórico</h1>
    <form action="<?php echo url_for('turma/transferirNotasHistorico') ?>" method="POST">
        <?php echo $form ?>
        <div>
            <input type="submit" value="Executar" />
        </div>
    </form>
</div>