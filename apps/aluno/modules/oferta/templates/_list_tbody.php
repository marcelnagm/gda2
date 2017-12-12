<?php $Tboferta = new Tboferta(); ?>
<?php foreach ($Tbofertas as $Tboferta): ?>
    <tr onmouseover="this.className='bgblue'" onmouseout="this.className=''" bgcolor="#f8f8f8">
    <!-- <td><?php //echo $Tboferta->getTbperiodo()->getAnoSemestrePeriodo()   ?></td>-->
        <?php if ($fila_allow) {
            include_partial('form_oferta', array('disciplina' => $Tboferta->getCodDisciplina(),
            'turma' => $Tboferta->getTurma()));
        } ?>
        <td><?php echo $Tboferta->getTbdisciplina()->getCodDisciplinaMasked() ?></td>
        <td><?php echo $Tboferta->getTurma() ?></td>
        <td><?php echo $Tboferta->getTbdisciplina()->getDescricao() ?></td>
        <td><?php echo $Tboferta->getTbsala() ?></td>
        <td><?php echo $Tboferta->getTbdisciplina()->getCh() . 'h' ?></td>
        <td><?php echo $Tboferta->getTbprofessorRelatedByIdMatriculaProf() ?></td>
        <td><?php echo $Tboferta->getTbpolos()->getDescricao() ?></td>
    <?php include_partial('list_horario', array('Tboferta' => $Tboferta, 'dias_semana' => $dias_semana)) ?>
    <td title="Solicitações / Vagas"><?php echo $Tboferta->getSolicitacoes() . '/' . $Tboferta->getVagas(); ?></td>
    <td title="Vagas Remanescentes"><?php echo $Tboferta->getVagasRemanescentes(); ?></td>
</tr>
<?php endforeach; ?>