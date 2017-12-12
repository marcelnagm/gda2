<!DOCTYPE html>
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
            border-top:1px solid lightgrey;
            border-left:1px solid lightgrey;
            border-right: 1px solid lightgrey;
            border-bottom: 1px solid lightgrey;
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
            width:800px;
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
            border-top:1px solid lightgrey;
            border-left:1px solid lightgrey;
            border-right: 1px solid lightgrey;
        }
        #rounded-corner td{
            background:#e8edff;
            border-top:1px solid lightgrey;
            border-left:1px solid lightgrey;
            border-right: 1px solid lightgrey;
            color:#669;
            padding:4px;
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
                <td style="padding-right: 20px"><img align="center" src="/admin/images/brasao.png" alt="brasao_brasil"width="75" height="75"></td>
                <td style="padding-right: 20px"><p align="center"><b>UNIVERSIDADE FEDERAL DE RORAIMA<br>
            PRO-REITORIA DE ENSINO E GRADUACAO<br>
            DEPARTAMENTO DE REGISTRO E CONTROLE ACADEMICO<br>
            FREQUÊNCIA DOS SERVIDORES</b></p>
                </td>
                <td><img align="center" src="/admin/images/logo.png" alt="logo_ufrr" width="102" height="51"></td>
            </tr>
        </table>
    </div>
    <div align="center">
        <table id="default-table">
            <tr>
                <td width="100"><b>Mês</b>:  <?php echo $mes; ?> </td>
                <td width="100"><b>Ano</b>: <?php echo $ano; ?> </td>
                <?php if ($tipo == '1') { ?><td width="100" rowspan="2" style="text-align: center; margin: 0px; padding: 0px"><img align="center" src="/admin/images/vitoria.png" alt="servicos_vitoria" width="153" height="76"></td> <?php } ?>
            </tr>
            <tr>
                <td colspan="2"><b>Servidor</b>: <?php echo $nome; ?></font></td>
            </tr>
        </table>
    </div>
    <p></p>
    <div align="center">
        <table id="rounded-corner" cellspacing="0" cellpadding="2">
            <thead>
                <tr>
                    <th rowspan="2" class="rounded-left" width="30">Dia</th>
                    <th colspan="2" width="200">1º Expediente</th>
                    <th colspan="2" width="200">2º Expediente</th>
                    <th rowspan="2" class="rounded-right" width="250">Assinatura</th>
                </tr>
                <tr>
                    <th width="100">Entrada</th>
                    <th width="100">Saída</th>
                    <th width="100">Entrada</th>
                    <th width="100">Saída</th>
                </tr>
            </thead>
            <tbody>
            <?php $dia_da_semana = $domingos; ?>
            <?php for ($dia = 1; $dia <= $max_dias; $dia++): ?>
                <tr>
                    <td align="center"><?php echo $dia; ?></td>
                    <td align="center">
                        <?php echo ($dia_da_semana % 7 == 0 ? 'Domingo ': ($dia_da_semana % 7 == 6 ? 'Sábado': '')); ?>
                    </td>
                    <td align="center">
                        <?php echo ($dia_da_semana % 7 == 0 ? 'Domingo ': ($dia_da_semana % 7 == 6 ? 'Sábado': '')); ?>
                    </td>
                    <td align="center">
                        <?php echo ($dia_da_semana % 7 == 0 ? 'Domingo ': ($dia_da_semana % 7 == 6 ? 'Sábado': '')); ?>
                    </td>
                    <td align="center">
                        <?php echo ($dia_da_semana % 7 == 0 ? 'Domingo ': ($dia_da_semana % 7 == 6 ? 'Sábado': '')); ?>
                    </td>
                    <td align="center">
                        <?php echo ($dia_da_semana % 7 == 0 ? 'Domingo ': ($dia_da_semana % 7 == 6 ? 'Sábado': '')); ?>
                    </td>
                </tr>
                <?php $dia_da_semana++; ?>
            <?php endfor; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td class="rounded-foot-left" style="border-right: none; border-left: none;" colspan="5">
                    </td>
                    <td class="rounded-foot-right" style="border-right: none; border-left: none;"></td>
                </tr>
            </tfoot>
        </table>
    </div>
    <div style="width: 500" align="center">
    <table>
        <tr><td>
        <p style="font-size: small" align="center">
            <br><br>
            ________________________________________________<br>
            <?php echo $nome; ?><br>
            <?php echo $cargo; ?>
        </p>
        </td>
        <td>
        <p style="font-size: small" align="center">
            <br><br>
            ________________________________________________<br>
            <?php echo 'Acácia Duarte'; ?><br>
            <?php echo 'Diretora do DERCA'; ?>
        </p>
        </td></tr>
    </table>
    </div>
</body>