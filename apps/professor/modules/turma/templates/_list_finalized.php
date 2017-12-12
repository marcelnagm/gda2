<h4>Impressão de súmulas e notas de disciplinas já finalizadas:</h4>

<table>
    <thead>
        <tr>
            <th>Turma</th>
            <th>Disciplina</th>
            <th>Alunos</th>
            <th>Frequência</th>
            <th>Súmula</th>
            <th>Notas</th>
            <th>Copiar súmulas?</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($tbturmasfinalized as $k=>$tbturma): ?>
        <tr class="<?php echo ($k % 2) ? 'even':'odd' ?>">
            <td><?php echo $tbturma ?></td>
            <td><?php echo $tbturma->getTbdisciplina()->getDescricao() ?></td>
            <td><?php echo $tbturma->getQtdeAlunos() ?></td>
            <td nowrap align="center">
                <a target="_blank" href="<?php echo url_for('turma/frequencia?id='.$tbturma->getIdTurma()) ?>" target="_blank"><img src="/images/icons/lista-small.png" alt="Frequência" /></a>
            </td>
            <td nowrap align="center">
                <a target="_blank" href="<?php echo url_for('sumula/imprimir?id='.$tbturma->getIdTurma()) ?>"><img src="/images/icons/calendar-small.png" alt="Súmula: " /></a>
            </td>
            <td nowrap align="center">
                <a target="_blank" href="<?php echo url_for('turma/notas?id='.$tbturma->getIdTurma()) ?>?layout=impressao"><img src="/images/icons/folder_table-small.png" alt="Notas: " /></a>
            </td>
            <td nowrap align="center">
                <a href="<?php echo url_for('sumula/copiasumula?id='.$tbturma->getIdTurma()) ?>">Copiar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>