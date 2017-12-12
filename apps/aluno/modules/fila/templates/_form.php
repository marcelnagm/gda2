
<form action="" method="post" >
  <table>
    <tfoot>
      <tr>
        <td colspan="4">
          <?php echo $form->renderHiddenFields(false) ?>                    
            <input type="button" value="Enviar" onclick="ChecaHorario();" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['cod_disciplina']->renderLabel() ?></th>
        <td>
          <?php echo $form['cod_disciplina']->renderError() ?>
          <?php echo $form['cod_disciplina'] ?>
        </td>      
        <th><?php echo $form['turma']->renderLabel() ?></th>
        <td width="20px">
          <?php echo $form['turma']->renderError() ?>
          <?php echo $form['turma'] ?>
         
        </td>                
      </tr>
    </tbody>
  </table>
</form>
