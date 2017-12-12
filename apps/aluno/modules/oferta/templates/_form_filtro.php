<div style="text-align:left; width: 728px;">
<form method="POST" action="<?php echo url_for('oferta/filter');?>" name="filtro">
<fieldset style="width: 95.5%;"><legend><b>Filtro:</b></legend>
<?php if($sf_user->hasAttribute('oferta.filter')): ?>
        Lista Filtrada -  <?php echo link_to1('Limpar Filtro', 'oferta/filter?reset=1',array('style'=> 'color:red;')); ?><br/><br/>
<?php endif;  ?>

<img align="left" height="32" alt="filtro" src="images/filtro.png">
<?php echo $form;?> 

&nbsp;&nbsp; <input type="submit" value="Filtrar">
</fieldset>
</form>
</div>
