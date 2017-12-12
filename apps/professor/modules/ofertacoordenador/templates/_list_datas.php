<?php

$dt_ini = $tboferta->getDtInicio('d/m/Y');
$dt_fim = $tboferta->getDtFim('d/m/Y');

?>
<?php if(isset($dt_ini) && isset($dt_fim)): ?>
<table class="horario">
    <tr>
        <td style="white-space: nowrap">
                    <?php echo $dt_ini; ?>
            até<br>
                    <?php echo $dt_fim; ?>
        </td>
    </tr>
</table>
<?php else: ?>
Sem datas definidas
<?php endif ?>