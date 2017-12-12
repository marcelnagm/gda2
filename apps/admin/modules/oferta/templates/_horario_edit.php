<?php

$dias_semana = sfConfig::get('app_dias_semana');

$horarios = $tboferta->getTbofertahorarios();

?>
<fieldset class="sf_fieldset_none">

    <a name="horario"></a>
    <h2>Horário</h2>

    <div class="sf_admin_form_row">

        <?php if ($sf_user->hasFlash('notice_horario')): ?>
        <div class="notice"><?php echo __($sf_user->getFlash('notice_horario'), array(), 'sf_admin') ?></div>
        <?php endif; ?>

        <ul class="sf_admin_actions">
            <li class="sf_admin_action_new">
                <a href="<?php echo url_for( 'ofertahorario/new?id_oferta='.$tboferta->getIdOferta() ) ?>">Incluir Horário de oferta</a>
            </li>
        </ul>

        <table>
            <tr>
                <th>Dia</th>
                <th>Hora</th>
                <th>Ação</th>
            </tr>
            <?php if(count($horarios)): ?>
                <?php foreach($horarios as $horario): ?>
            <tr>
                <td style="width: 55px">
                            <?php echo $dias_semana[$horario->getDia()] ?>
                </td>
                <td style="white-space: nowrap">
                            <?php echo $horario->getHoraInicio('H:i') ?>
                    às
                            <?php echo  $horario->getHoraFim('H:i') ?>
                </td>
                <td>
                    <ul class="sf_admin_td_actions">
                                <?php echo $helper->linkToHorarioEdit($horario, array(  'params' =>   array(  ),  'class_suffix' => 'edit',  'label' => 'Edit',)) ?>
                                <?php echo $helper->linkToHorarioDelete($horario, array(  'params' =>   array(  ),  'confirm' => 'Are you sure?',  'class_suffix' => 'delete',  'label' => 'Delete',)) ?>
                    </ul>
                </td>
            </tr>
                <?php endforeach ?>
            <?php else: ?>
            <tr>
                <td colspan="3">
                    Nenhum horário cadastrado
                </td>
            </tr>
            <?php endif ?>
        </table>

    </div>

</fieldset>