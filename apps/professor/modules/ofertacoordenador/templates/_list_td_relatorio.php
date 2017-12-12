<!--<td class="sf_admin_text sf_admin_list_td_id_oferta">
  <?php //echo $tboferta->getIdOferta() ?>
</td>-->
<td class="sf_admin_text sf_admin_list_td_Tbperiodo">
  <?php echo $tboferta->getTbperiodo() ?>
</td>
<td class="sf_admin_foreignkey sf_admin_list_td_cod_disciplina">
  <?php echo $tboferta->getTbdisciplina()->getCodDisciplinaMasked() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_turma">
  <?php echo $tboferta->getTurma(); ?>
</td>
<td class="sf_admin_text sf_admin_list_td_list_disciplina" style="text-align: left">
  <?php echo get_partial('list_disciplina', array('type' => 'list', 'tboferta' => $tboferta)) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_list_horario">
  <?php echo get_partial('list_horario', array('type' => 'list', 'tboferta' => $tboferta)) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_list_datas">
  <?php echo get_partial('list_datas', array('type' => 'list', 'tboferta' => $tboferta)) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_vagas">
  <?php echo $tboferta->getVagas() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_list_aceitos">
  <?php echo get_partial('list_aceitos', array('type' => 'list', 'tboferta' => $tboferta)) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_list_solicitacoes">
  <?php echo get_partial('list_solicitacoes', array('type' => 'list', 'tboferta' => $tboferta)) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_Tbprofessor">
  <table class="horario">
    <tr>
        <td style="white-space: nowrap">
            <?php echo $tboferta->getTbprofessorRelatedByIdMatriculaProf() ?>
        </td>
    </tr>
    <?php if ($tboferta->getTbprofessorRelatedByIdMatriculaProf2() != null): ?>
    <tr>
        <td style="white-space: nowrap">
            <?php echo $tboferta->getTbprofessorRelatedByIdMatriculaProf2() ?>
        </td>
    </tr>
    <?php endif;?>
</table>
</td>
<td class="sf_admin_text sf_admin_list_td_Tbprofessor">
  <?php echo $tboferta->getTbSala() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_list_solicitacoes">
    <form target="_blank" action="<?php echo url_for('ofertacoordenador/ViewAlunos') ?>" method="POST">
        <input type="hidden" name="id_oferta" value="<?php echo $tboferta->getIdOferta() ?>">
        <input type="submit" value="Ver alunos">
    </form>
<!--    <a href="<?php echo url_for2('default', array('module' => 'ofertacoordenador', 'action' => 'ViewAlunos', 'id_oferta' => $tboferta->getIdOferta()), false); ?>">Ver Alunos</a>-->
</td>