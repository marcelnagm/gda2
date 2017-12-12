<div class="info">
    <table>
        <tr>
            <th>Curso</th>
            <td>
                <?php echo $tbcursoversao ?>
            </td>
        </tr>
        <tr>
            <th>C. H. Obrigatória</th>
            <td>
                <?php echo $tbcursoversao->getChObr() ?> horas
            </td>
        </tr>
        <tr>
            <th>C. H. Eletiva</th>
            <td>
                <?php echo $tbcursoversao->getChEletiva() ?> horas
            </td>
        </tr>
        <?php $rest = $aluno->getChCursada(true)- $tbcursoversao->getChEletiva() ;?>
        <tr title="<?php echo $rest >= 0 ? 'Excedente' : 'Restante'; ?> significa que você <?php echo $rest >= 0 ? 'ja cumpriu a sua CH Eletiva' : 'precisa cumprir disciplinas com carga horária maior ou igual a restante'; ?>">
            <th>C. H. Eletiva <?php echo $rest >= 0 ? 'Excedente' : 'Restante'; ?></th>
            <td>
                <?php echo $rest >= 0 ? $rest : -$rest?> horas
            </td>
        </tr>

    </table>
</div>