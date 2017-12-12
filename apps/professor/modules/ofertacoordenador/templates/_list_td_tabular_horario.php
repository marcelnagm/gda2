<td class="sf_admin_text sf_admin_list_td_Tboferta">
  <?php echo $tbofertahorario->getTboferta() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_diaNome">
  <?php echo $tbofertahorario->getDiaNome(); ?>
</td>
<td class="sf_admin_time sf_admin_list_td_hora_inicio">
  <?php echo $tbofertahorario->getHoraInicio() ?>
</td>
<td class="sf_admin_time sf_admin_list_td_hora_fim">
  <?php echo $tbofertahorario->getHoraFim() ?>
</td>
<td class="sf_admin_time sf_admin_list_td_deletar">
    <?php include_partial('ofertacoordenador/list_delete', array('tbofertahorario' => $tbofertahorario)) ?> 
</td>
