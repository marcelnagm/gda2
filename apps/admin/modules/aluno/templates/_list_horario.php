<?php $dias_semana = array(1,2,3,4,5,6);?>
<?php $horarios = $Tboferta->getTbofertahorarios(); ?>
<?php if(count($horarios)): ?>
        <?php foreach($dias_semana as $dia): ?>
        <td title="<?php echo $dia ?>">
         <?php foreach ($horarios as $horario):?>
         <?php if($horario->getDia() == $dia):?>
            <span style='white-space:nowrap; text-align: center'>
                <?php echo '<center>'.trim($horario->getHoraInicio('H:i'). "<br>às<br>" . $horario->getHoraFim('H:i')).'</center>'; ?>
            </span>            
            <?php break;?>
            <?php else:?>
            <?php endif;?>            
            <?php endforeach; ?>                                                
        </td>
        <?php endforeach; ?>
 


<?php else: ?>
        <td colspan="6" align="center">Sem horário</td>
<?php endif ?>
