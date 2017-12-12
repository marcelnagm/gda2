<?php use_helper('I18N', 'Date') ?>
<?php// include_partial('ofertacoordenador/assets') ?>

<?php $horarios = $tboferta->getTbofertahorarios(); ?>
 <h2>Hórarios Cadastrados</h2>
<?php if ($horarios) {
?>
    <table><thead>
        <th>
            Oferta
        </th>
        <th>
            Dia da Semana
        </th>
        <th>
            Hora Inicio
        </th>
        <th>
            Hora Final
        </th>
        <th>
            Deletar ?
        </th>
    </thead>
    <tbody>
    <?php if (count($horarios)) :
    ?>
    <?php foreach ($horarios as $i => $tbofertahorario): $odd = fmod(++$i, 2) ? 'odd' : 'even' ?>
            <tr class="sf_admin_row <?php echo $odd ?>">

        <?php include_partial('ofertacoordenador/list_td_tabular_horario', array('tbofertahorario' => $tbofertahorario)) ?>
        </tr>
    <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="5" class="sf_admin_row even">
                Nenhum Horario Cadastrado para a oferta
            </td>
        </tr>
    <?php endif; ?>
        </tbody>
        </table>
<?php }else {
 ?>
            Nenhum Horário Cadastrado
<?php } ?>


