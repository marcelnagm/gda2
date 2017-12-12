<?php
/**
 * List de Filas
 * Parâmetros:
 *          $com_horario = true para adicionar a coluna de hórários da oferta
 *          $label_periodo = para Exibir uma linha separadora com o semestre das ofertas
 */
$dias_semana = sfConfig::get('app_dias_semana');
unset($dias_semana[7]);
?>

<?php $periodoAtual = 0; ?>
<table>
  <thead>
    <tr>      
      <th>Disciplina</th>
      <th>Turma</th>
      <th>Sala</th>
      <th>Bloco</th>
      <th>Situacao</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Tbfilas as $Tbfila): ?>

    <?php //$Tbfila = new tbfila();
      if($periodoAtual != $Tbfila->getTboferta()->getIdPeriodo() && $label_periodo == true):
      $periodoAtual = $Tbfila->getTboferta()->getIdPeriodo() ;
      ?>
      <tr>
          <td colspan="5" style="background: none repeat scroll 0% 0% rgb(245, 245, 255); font-weight: bold; text-align: center">
              <a href="<?php echo url_for2('default', array('module' => 'aluno','action' => 'Imprimir', 'matricula' => $Tbfila->getMatricula(), 'periodo' => $Tbfila->getTboferta()->getIdPeriodo())); ?>"><?php echo $Tbfila->getTboferta()->getTbperiodo();?></a>
          </td>
      </tr>
      
<?PHP endif; ?>
    <tr>      
      <td><?php echo $Tbfila->getTboferta()->getTbdisciplina(); ?></td>
      <td><?php echo $Tbfila->getTboferta()->getTurma(); ?></td>
      <td><?php echo $Tbfila->getTboferta()->getTbsala(); ?></td>
      <td><?php echo $Tbfila->getTboferta()->getTbsala()->getBloco(); ?></td>
      <td title="<?php echo $Tbfila->getTbfilasituacao()->getDescricao() ?>"><?php echo $Tbfila->getTbfilasituacao()->getDescricao() ?></td>
    </tr>
    
    <?php endforeach; ?>
  </tbody>
</table>