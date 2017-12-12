<?php
use_helper('I18N');
?>
<div align="center">
<h3 style="text-align: center">Digite os dados solicitados (presentes no comprovante de matrícula) e pressione 'Consultar'</h3>
<?php if(isset($message)): ?>
<span style="color: white;background-color: red; "><?php echo $message; ?></span>
<?php endif; ?>

<form action="<?php echo url_for1('vestibular2013/Status')?>" method="POST">
    <table border="0">
        <tr>
            <td>Matrícula:</td>
            <td><input type="text" name="matricula"></td>
        </tr>
        <tr>
            <td>Número de autenticação:</td>
            <td><input type="text" name="codigo"></td>
        </tr>
    </table>
    <input type="submit" value="Consultar">
</form>
</div>
<br><br>
<h3 style="text-align: center"><a href="<?php echo url_for1('vestibular2013/index'); ?>">Voltar ao Menu</a></h3>