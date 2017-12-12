<?php
$dias_semana = sfConfig::get('app_dias_semana');
unset($dias_semana[7]);
?>

<div align="center">
    <h3 align="center"> UNIVERSIDADE FEDERAL DE RORAIMA<br>
        PRO-REITORIA DE ENSINO E GRADUACAO<br>
        DEPARTAMENTO DE REGISTRO E CONTROLE ACADEMICO - DERCA<br>
        Resultado da Fila Eletrônica do Semestre <?php echo $periodo->getAno() . '.' . $periodo->getSemestre(); ?>  </h3>
</div>
<div class="content">
    <div style="white-space: nowrap;">
        <b>Matrícula</b>:  <?php echo $aluno->getMatricula(); ?> &nbsp;&nbsp;&nbsp;
        <b>Nome</b>: <?php echo $aluno->getNome(); ?> &nbsp;&nbsp;&nbsp;
    </div>
    <div style="white-space: nowrap;">
        <b>Curso</b>: <?php echo $aluno->getTbcursoversao(); ?> &nbsp;&nbsp;&nbsp;

    </div>
    <div style="white-space: nowrap;"><b>Mod. Ingresso</b>:  <?php echo $aluno->getTbtipoingresso(); ?> &nbsp;&nbsp;&nbsp;
        <b>Data de Ingresso</b>:  <?php echo $aluno->getDtIngresso('d/m/y') ?> &nbsp;&nbsp;&nbsp;
        <b>Situação</b>: <font color="<?php echo $aluno->getIdSituacao() != 0 ? 'red' : 'green'; ?>"><?php echo $aluno->getTbalunosituacao(); ?></font>    </div>
    &nbsp;&nbsp;&nbsp; <b>E-mail</b>: <?php echo $aluno->getEmail(); ?>
</div>
<p></p>
<table cellspacing="0" cellpadding="2" border="1">
    <tbody>
        <tr bgcolor="#dddddd">
            <th>Disciplina</th>
            <th>Turma</th>
            <th>Tipo</th>
            <th width="30">Sala</th>
            <th width="35">Bloco</th>
            <th width="40">SEG</th>
            <th width="40">TER</th>
            <th width="40">QUA</th>
            <th width="40">QUI</th>
            <th width="40">SEX</th>
            <th width="40">SÁB</th>
            <th>Resultado</th>
        </tr>
        <?php foreach ($filas as $fila): ?>
            <tr>
                <td><?php echo $fila->getTboferta()->getTbdisciplina(); ?></td>
                <td><?php echo $fila->getTboferta()->getTurma(); ?></td>
                <td><?php echo TbdisciplinaPeer::getCaraterByAluno($fila->getTboferta()->getTbdisciplina()->getCodDisciplinaMasked(), $aluno) ?></td>
                <td><?php echo $fila->getTboferta()->getTbsala(); ?></td>
                <td><?php echo $fila->getTboferta()->getTbsala()->getBloco(); ?></td>
            <?php include_partial('vestibular/list_horario', array('Tboferta' => $fila->getTboferta(), 'dias_semana' => $dias_semana)) ?>
            <td><?php echo $fila->getTbfilasituacao(); ?></td>
        </tr>
        <?php endforeach; ?>
        </tbody></table>


    <p><b>Observações:</b></p>
    <ul>
        <li>Este documento é para simples conferência do aluno</li>

        <li>Início das aulas: <b>
        <?php
        if($aluno->getIdSituacao() == 0){
            echo $periodo->getDtInicio('d/m/Y');
        } else {
            echo '06/08/2012';
        } ?>
        </b></li>


</ul>
