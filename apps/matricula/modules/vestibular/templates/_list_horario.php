<?php $dias_semana = array(1,2,3,4,5,6);?>
<?php $horarios = $Tboferta->getTbofertahorarios(); ?>
<?php if(count($horarios)): ?>
        <?php foreach($dias_semana as $dia): ?>
        <td style="text-align:center;border: 1px solid black;" title="<?php echo $dia ?>">
         <?php foreach ($horarios as $horario):?>
         <?php if($horario->getDia() == $dia):?>
            <span style='white-space:nowrap'>
                <?php echo $horario->getHoraInicio('H:i') ?>
            -
                <?php echo $horario->getHoraFim('H:i') ?>
            </span>            
            <?php break;?>
            <?php else:?>
            &emsp;
            <?php endif;?>            
            <?php endforeach; ?>                                                
        </td>
        <?php endforeach; ?>
 


<?php else: ?>
        <td colspan="6" align="center" style="text-align:center;border: 1px solid black;">Sem horário</td>
<?php endif ?>
