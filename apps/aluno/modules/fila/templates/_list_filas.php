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
      <?php if($com_horario):?>
      <?php foreach($dias_semana as $dia): ?>
        <tH style="text-align: center;border: 1px solid #DDDDDD;">
              <?php echo $dia;?>
            </tH>
        <?php endforeach; ?>
      <?php endif;?>
      <th>Situacao</th>
      <?php if($com_delete):?>
      <th>Ações</th>
      <?php endif;?>
      <?php if($com_tranc):?>
      <th>Ações</th>
      <?php endif;?>
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
              <a href="<?php echo url_for2('default', array('module' => 'fila','action' => 'Imprimir', 'periodo' => $Tbfila->getTboferta()->getIdPeriodo())); ?>"><?php echo $Tbfila->getTboferta()->getTbperiodo();?></a>
          </td>
      </tr>
      
<?PHP endif; ?>
    <tr>      
      <td><?php echo $Tbfila->getTboferta()->getTbdisciplina(); ?></td>
      <td><?php echo $Tbfila->getTboferta()->getTurma(); ?></td>
      <td><?php echo $Tbfila->getTboferta()->getTbsala(); ?></td>
      <td><?php echo $Tbfila->getTboferta()->getTbsala()->getBloco(); ?></td>
      <?php if($com_horario):?>
      <?php include_partial('oferta/list_horario',array('Tboferta' => $Tbfila->getTboferta(),'dias_semana' => $dias_semana))?>
      <?php endif;?>
      <td title="<?php echo $Tbfila->getTbfilasituacao()->getDescricao() ?>"><?php echo $Tbfila->getTbfilasituacao()->getDescricao() ?></td>
      <?php if($com_delete):?>
      <td> <input type="button" onclick="Remover(<?php echo $Tbfila->getIdFila(); ?>);" value="Remover"></td>
      <?php endif;?>
      <?php if($com_tranc):?>
      <td>
          <?php if($Tbfila->getIdSituacao() == 1 && $Tbfila->getTboferta()->getCodDisciplina() != 'ST999'): ?>
          <input type="button" onclick="Trancar(<?php echo $Tbfila->getIdFila(); ?>);" value="Trancar">
          <?php endif;?>
      </td>
      <?php endif;?>

    </tr>
    
    <?php endforeach; ?>
  </tbody>
</table>