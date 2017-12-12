<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
Para exportar os dados click no botão
<form action="<?php echo url_for2('export_excel',array('module' => 'aluno')); ?>">
    <input type="submit" value="Exportar">
</form>
