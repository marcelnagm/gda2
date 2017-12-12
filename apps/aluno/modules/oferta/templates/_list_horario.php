<?php

$horarios = $Tboferta->getTbofertahorarios();

foreach ($horarios as $horario){
    $k_dia = $horario->getDia();
    $horarios_dia[$k_dia][] = $horario;
}

?>
<?php if (count($horarios)): ?>
    <?php foreach ($dias_semana as $dia => $descricao_dia): ?>
        <td style="text-align:center;border: 1px solid #DDDDDD;" title="<?php echo $descricao_dia ?>">
                <?php if (isset($horarios_dia[$dia]) && count($horarios_dia[$dia])): ?>
                    <?php foreach ($horarios_dia[$dia] as $horario): ?>
                        <span style='white-space:nowrap; text-align: center'>
                            <?php echo '<center>'.trim($horario->getHoraInicio('H:i'). "<br>às<br>" . $horario->getHoraFim('H:i')).'</center>'; ?>
                        </span>
                    <?php endforeach; ?>
                <?php else: ?>
                    &nbsp;
                <?php endif; ?>

        </td>
    <?php endforeach; ?>

<?php else: ?>
        <td colspan="6" align="center" style="text-align:center;border: 1px solid #DDDDDD;">Sem horário</td>
<?php endif ?>
