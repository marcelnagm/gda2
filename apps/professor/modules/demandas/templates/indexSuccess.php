<h3> Demandas de ofertas</h3>
<br>
Obs: Serviço em Testes e adaptações
<br>
<?php foreach ($versoes as $versao) :?>
<br>
<br>
<table>
    <thead>
        <th colspan="2"><?php echo $versao['descricao']; ?></th>
    </thead>
    <thead>
        <th>Disciplina</th>
        <th>Quantidade de Demanda</th>
    </thead>
    <tbody>
        <?php foreach ($demandas[$versao['id']] as $disciplina) :?>
        <tr>
            <td><?php echo TbdisciplinaPeer::retrieveByPK($disciplina[1]); ?></td>
            <td align="center">
                <big><a target="_blank" href="<?php echo url_for('demandas/alunos?id='.$versao['id'].'&cod='.$disciplina[1]) ?>" target="_blank">
                    <?php echo $disciplina[2]; ?>
                </a></big>
            </td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>
<?php endforeach;?>