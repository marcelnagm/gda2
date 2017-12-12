<?php
use_helper('I18N');
?>
<h3>Digite o seu CPF (Apenas números) e pressione 'Prosseguir'</h3>
<?php if(isset($message)): ?>
<span style="color: white;background-color: red; "><?php echo $message; ?></span>
<?php endif; ?>

<form action="<?php echo url_for1('matricula/SelecionaCPF')?>" method="POST">
    CPF:<input type="text" name="CPF" maxlength="11"><br>
    <input type="submit" value="Prosseguir">
</form>
