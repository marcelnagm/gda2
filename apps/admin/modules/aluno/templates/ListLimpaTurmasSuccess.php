    <?php if(isset ($form)):  ?>
<font face="tahome" size="2">
Selecione qual o semestre que deseja remover o aluno das turma em qual está inscrito:
</font>
<br>
<br>
       <form action="<?php echo url_for1('aluno/ListLimpaTurmas')?>" method="post">
    <input type="hidden" id="matricula" name="matricula" value="<?php echo $matricula ?>">
    <?php echo $form['id_periodo']->renderRow(); ?>
    <br>
    <input type="submit" value="Enviar!">
</form>
<?php endif; ?>
<div class="error">
    <?php if(isset ($erro)): echo $erro; ?>
    <?php endif; ?>
</div>