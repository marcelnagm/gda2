<?php
use_helper('I18N');
?>
<div align="center">
<h3 style="text-align: center">Digite o seu CPF (Apenas números) e pressione 'Consultar'</h3>
<?php if(isset($message)): ?>
<span style="color: white;background-color: red; "><?php echo $message; ?></span>
<?php endif; ?>

<form action="<?php echo url_for1('enemsisu/Status')?>" method="POST">
    CPF:<input type="text" name="CPF" maxlength="11"><br>
    <input type="submit" value="Consultar">
</form>
</div>
<br><br>
<h3 style="text-align: center"><a href="<?php echo url_for1('enemsisu/index'); ?>">Voltar ao Menu</a></h3>