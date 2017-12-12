<h4>Impressão de súmulas e notas de disciplinas no semestre:</h4>

<table>
    <thead>
        <tr>
            <th>Turma</th>
            <th>Disciplina</th>
            <th>Alunos</th>
            <th>Contatos</th>
            <th>Súmula</th>
            <th>Notas</th>
            <th>Finalizado?</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($tbturmasfinalized as $k=>$tbturma): ?>
        <tr class="<?php echo ($k % 2) ? 'even':'odd' ?>">
            <td><?php echo $tbturma ?></td>
            <td><?php echo $tbturma->getTbdisciplina()->getDescricao() ?></td>
            <td><?php echo $tbturma->getQtdeAlunos() ?></td>
            <td nowrap align="center">
                <a target="_blank" href="<?php echo url_for('turmacoordenador/contato?id='.$tbturma->getIdTurma()) ?>" target="_blank"><img src="/images/icons/lista-small.png" alt="Contatos" /></a>
            </td>
            <td nowrap align="center">
                <a target="_blank" href="<?php echo url_for('turmacoordenador/imprimir?id='.$tbturma->getIdTurma()) ?>"><img src="/images/icons/calendar-small.png" alt="Súmula: " />(<?php echo $tbturma->countTbturmaSumulas() ?>)</a>
            </td>
            <td nowrap align="center">
                <a target="_blank" href="<?php echo url_for('turmacoordenador/notas?id='.$tbturma->getIdTurma()) ?>?layout=impressao"><img src="/images/icons/folder_table-small.png" alt="Notas: " />(<?php echo $tbturma->getPorcentagemPreenchido() ?>%)</a>
            </td>
            <td nowrap align="center">
                <?php echo ($tbturma->getNotasNoHistorico() ? 'SIM' : 'NÃO' ); ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>