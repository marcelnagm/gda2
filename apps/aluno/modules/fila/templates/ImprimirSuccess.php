<!DOCTYPE html>
<?php $aluno = $sf_user->getAttribute('aluno');?>
<?php
$dias_semana = sfConfig::get('app_dias_semana');
unset($dias_semana[7]);
//$horarios = $Tboferta->getTbofertahorarios();
?>
<head>
    <script type="text/javascript">
        // window.onload=abre();

        //function abre(){
        //window.print();
        // }
    </script>
    <style type="text/css">
        #default-table td{
            background:#e8edff;
            border-top:1px solid #fff;
            border-right: 1px solid #fff;
            color:#669;
            padding:8px;
        }
        #default-table{
            font-family:"Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
            font-size:12px;
            width:480px;
            text-align:left;
            border-collapse:collapse;
            margin:20px;
        }
        #default-table td:hover{
            background:#d0dafd;
        }
        #rounded-corner{
            font-family:"Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
            font-size:12px;
            width:480px;
            text-align:left;
            border-collapse:collapse;
            margin:20px;
        }
        #rounded-corner thead th.rounded-left{
            background:#b9c9fe left -1px no-repeat;
            background-image: url('../../images/corner-left.png') !important;
        }
        #rounded-corner thead th.rounded-right{
            background:#b9c9fe right -1px no-repeat;
            background-image: url('../../images/corner-right.png') !important;
        }
        #rounded-corner th{
            font-weight:normal;
            font-size:13px;
            color:#039;
            background:#b9c9fe;
            padding:8px;
            text-align: center;
        }
        #rounded-corner td{
            background:#e8edff;
            border-top:1px solid lightgrey;
            border-left:1px solid lightgrey;
            border-right: 1px solid lightgrey;
            color:#669;
            padding:8px;
        }
        #rounded-corner tfoot td.rounded-foot-left{
            background:#e8edff left bottom no-repeat;
            background-image: url('../../images/corner-botleft.png') !important;
        }
        #rounded-corner tfoot td.rounded-foot-right{
            background:#e8edff right bottom no-repeat;
            background-image: url('../../images/corner-botright.png') !important;
        }
        #rounded-corner tbody tr:hover td{
            background:#d0dafd;
        }
    </style>
</head>
<body>
    <div align="center">
        <table>
            <tr>
                <td style="padding-right: 20px"><img align="center" src="/aluno/images/brasao.png" alt="brasao_brasil"width="75" height="75"></td>
                <td style="padding-right: 20px"><p align="center"> UNIVERSIDADE FEDERAL DE RORAIMA<br>
            PRO-REITORIA DE ENSINO E GRADUACAO<br>
            DEPARTAMENTO DE REGISTRO E CONTROLE ACADEMICO - DERCA<br>
            Resultado da Fila Eletrônica do Semestre <?php echo $periodo->getAno() . '.' . $periodo->getSemestre(); ?>  </p>
                </td>
                <td><img align="center" src="/aluno/images/logo.png" alt="logo_ufrr" width="102" height="51"></td>
            </tr>
        </table>
    </div>
    <div align="center">
        <table id="default-table">
            <tr>
                <td><b>Matrícula</b>:  <?php echo $aluno->getMatricula(); ?> </td>
                <td><b>Nome</b>: <?php echo $aluno->getNome(); ?> </td>
            </tr>
            <tr>
                <td><b>Curso</b>: <?php echo $aluno->getTbcursoversao()->getTbcurso()->getDescricao(); ?> </td>
                <td><b>Versão de Curso</b>: <?php echo $aluno->getTbcursoversao(); ?> </td>
            </tr>
            <tr>
                <td><b>Mod. Ingresso</b>:  <?php echo $aluno->getTbtipoingresso(); ?> </td>
                <td><b>Data de Ingresso</b>:  <?php echo $aluno->getDtIngresso('d/m/Y') ?> </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center"><b>Situação</b>: <font color="<?php echo $aluno->getIdSituacao() != 0 ? 'red' : 'green'; ?>"><?php echo $aluno->getTbalunosituacao(); ?></font></td>
            </tr>
        </table>
    </div>
    <p></p>
    <div align="center">
        <table id="rounded-corner" cellspacing="0" cellpadding="2">
            <thead>
                <tr>
                    <th class="rounded-left">Disciplina</th>
                    <th>Turma</th>
                    <th>Tipo</th>
                    <th width="30">Sala</th>
                    <th width="40">Segunda</th>
                    <th width="40">Terça</th>
                    <th width="40">Quarta</th>
                    <th width="40">Quinta</th>
                    <th width="40">Sexta</th>
                    <th width="40">Sábado</th>
                    <th class="rounded-right">Resultado</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($filas as $fila): ?>
                <tr>
                    <td align="left"><?php echo $fila->getTboferta()->getTbdisciplina(); ?></td>
                    <td align="center"><?php echo $fila->getTboferta()->getTurma(); ?></td>
                    <td align="center"><?php echo TbdisciplinaPeer::getCaraterByAluno($fila->getTboferta()->getTbdisciplina()->getCodDisciplinaMasked(), $aluno) ?></td>
                    <td align="center">
                        <span style='white-space:nowrap'>
                            <?php echo $fila->getTboferta()->getTbsala(); ?>
                        </span>
                    </td>
                    <?php include_partial('fila/list_horario', array('Tboferta' => $fila->getTboferta(), 'dias_semana' => $dias_semana)) ?>
                    <td align="center"><?php echo $fila->getTbfilasituacao(); ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td class="rounded-foot-left" style="border-right: none; border-left: none;" colspan="10">
                        <i><small>
                            <b>Legenda:</b> ACEITO - Matriculado na disciplina; CHQ. HOR. - Choque de horário; CH. EXCES. - Excesso de carga horária eletiva;<br>
                            DISC. CANC - Disciplina cancelada; DISC TRANC - Disciplina trancada; F. REQUIS. - Falta pré-requisito; LOTADA - Turma lotada;<br>
                            INDEFINIDO - Solicitação ainda não avaliada.
                        </small></i>
                    </td>
                    <td class="rounded-foot-right" style="border-right: none; border-left: none;"></td>
                </tr>
            </tfoot>
        </table>
    </div>
    <div style="font-size: small">
                <p><b>Observações:</b></p>
                <ul>
                    <li>Este documento é para simples conferência do aluno</li>
                    <li>Cancelamento de disciplina: <b></b> pela internet</li>
                    <li>Inclusão de disciplinas: <b></b> pela internet</li>
                    <li>Início das aulas: <b><?php echo $periodo->getDtInicio('d/m/Y'); ?></b></li>
                </ul>
    </div>
</body>