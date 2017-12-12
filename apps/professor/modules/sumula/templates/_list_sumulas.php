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
                    <td><?php echo $TbturmaSumula->getData('d/m/Y') ?></td>
                    <td width="700px"><?php echo htmlspecialchars_decode($TbturmaSumula->getDescricao()); ?></td>
                    <td>
                        <span class="art-button-wrapper">
                            <span class="l"> </span>
                            <span class="r"> </span>
                    <?php echo link_to('Editar', 'sumula/edit?id_sumula=' . $TbturmaSumula->getIdSumula() . '&id=' . $sf_request->getParameter('id'), array('class' => 'sumula-editar')) ?><br>                     
                </span>
                <span class="art-button-wrapper">
                    <span class="l"> </span>
                    <span class="r"> </span>
                    <a class="sumula-apagar" href="" onclick="Remover(<?php echo $TbturmaSumula->getIdSumula(); ?>);" > Apagar </a>
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
