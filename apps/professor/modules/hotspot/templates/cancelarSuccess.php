<h1>Autorização de acesso à internet</h1>
<h4>Não será mais possível conectar na rede usando seu siape. Você pode reativar posteriormente. Cancelar acesso?</h4>
<form action="<?php echo url_for('hotspot/cancelar') ?>" method="POST">
    <?php echo $form; ?>
    <input type="submit" value="Cancelar acesso" />
</form>