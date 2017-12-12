<div class="lista">
    <?php if ($list->count()): echo "Quantidade: " . $list->count() ?>
        <table>
            <thead>
                <tr>
                    <th>Disciplina</th>
                    <th>% de Reprovação</th>
                    <th>Matriculados</th>
                    <th>Aprovados</th>
                    <th>Rep. por Nota</th>
                    <th>Rep. por Falta</th>
                    <th>Trancamentos</th>
                </tr>
            </thead>
        <?php foreach ($list as $object) : $even = @$i++ % 2; ?>
            <tbody>
                <tr class="row-<?php echo $even ?>">
                        <td><?php echo $object['disciplina']; ?></td>
                        <td><?php echo $object['porcentagem']; ?></td>
                        <td><?php echo $object['matriculados']; ?></td>
                        <td><?php echo $object['aprovados']; ?></td>
                        <td><?php echo $object['rep_nota']; ?></td>
                        <td><?php echo $object['rep_falta']; ?></td>
                        <td><?php echo $object['rep_tranc']; ?></td>
                </tr>
        <?php endforeach ?>
            </tbody>
        </table>
    <?php else: echo "Nenhum registro.";
    endif ?>
</div>