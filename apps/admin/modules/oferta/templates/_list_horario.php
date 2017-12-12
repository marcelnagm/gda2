<?php

$dias_semana = sfConfig::get('app_dias_semana');

$horarios = $tboferta->getTbofertahorarios();

?>
<?php if(count($horarios)): ?>
<table class="horario">
        <?php foreach($horarios as $horario): ?>
    <tr>
        <td style="width: 55px">
                    <?php echo $dias_semana[$horario->getDia()] ?>
        </td>
        <td style="white-space: nowrap">
                    <?php echo $horario->getHoraInicio('H:i') ?>
            às
                    <?php echo $horario->getHoraFim('H:i') ?>
        </td>
    </tr>
        <?php endforeach ?>
</table>
<?php else: ?>
Sem horário
<?php endif ?>