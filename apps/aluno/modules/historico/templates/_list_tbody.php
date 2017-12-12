<?php foreach ($historicos as $historico): ?>
<tr>
    <td><?php echo $historico->getTbPeriodo()->getAnoSemestrePeriodo() ?></td>
    <td><?php echo $historico->getTbdisciplina() ?></td>
    <td class="centro"><?php echo $historico->getCarater() ?></td>
    <td class="centro"><?php echo $historico->getTbdisciplina()->getCh() ?></td>
    <td class="centro"><?php echo $historico->getFaltas() ?></td>
    <td class="centro"><?php echo $historico->getMedia() ?></td>
    <td class="centro conceito<?php echo $historico->getIdConceito() ?>"><?php echo $historico->getTbConceito() ?></td>
</tr>
<?php endforeach; ?>
<tr>
    <th colspan="5" align="right">Média geral:</th>
    <td align="center"><?php echo number_format($sf_user->getAttribute('aluno')->getMediaGeral(),2) ?></td>
    <th></th>
</tr>