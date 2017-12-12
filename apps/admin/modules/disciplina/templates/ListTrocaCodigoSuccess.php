<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
//$disciplina = new tbdisciplina();
?>
<h2>Trocar Código Disciplina</h2>
<?php if(isset ($message)) echo $message;?>
<form method="post" action="<?php echo url_for1('disciplina/TrocaCodigo')?>">
    <input type="hidden" name="cod_disciplina_original" id="cod_velho" value="<?php echo $disciplina->getCodDisciplina(); ?>">
   Novo código da disciplina:<input type="text" name="cod_disciplina_novo" id="cod_novo"><br>
    <input type="submit" value="Trocar!" >
</form>
