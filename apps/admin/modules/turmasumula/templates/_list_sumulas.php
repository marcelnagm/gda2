<?php //use_helper('I18N', 'Date') ?>
<h3>Lista de Súmulas</h3>
<table>
    <thead>
        <tr>
            <th>Data</th>
            <th>Descricao</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php if (count($TbturmaSumulas)) : ?>
        <?php foreach ($TbturmaSumulas as $k => $TbturmaSumula): ?>
                <tr class="<?php echo ($k % 2) ? 'even' : 'odd' ?>" >
                    <td><?php echo format_date($TbturmaSumula->getData(), 'dd/MM/yyyy') ?></td>
                    <td width="700px"><?php echo htmlspecialchars_decode($TbturmaSumula->getDescricao()); ?></td>
                    <td>
                        <span class="art-button-wrapper">
                            <span class="l"> </span>
                            <span class="r"> </span>
                    <?php echo link_to('Editar', 'turmasumula/edit?id_sumula=' . $TbturmaSumula->getIdSumula(), array('class' => 'sumula-editar')) ?><br>                     
                </span>
                <span class="art-button-wrapper">
                    <span class="l"> </span>
                    <span class="r"> </span>
                    <a class="sumula-apagar"  onclick="Remover(<?php echo $TbturmaSumula->getIdSumula(); ?>);" > Apagar </a>
                </span>
            </td>
        </tr>
        <?php endforeach; ?>
        <?php else: ?>
                        <tr class='odd' >
                            <td colspan="3">
                                Nenhum registro
                            </td>
                        </tr>


        <?php endif ?>
    </tbody>
</table>
