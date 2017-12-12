<div class="info">
    <table cellspacing="0" cellpadding="0">
        <tr>
            <th>Nome</th>
            <td>
                <a href="<?php echo url_for('dadospessoais/index') ?>" title="Clique para ver as informações cadastradas no sistema">
                    <?php echo $aluno->getNome() ?>
                </a>
            </td>
        </tr>
        <tr>
            <th>Matrícula</th>
            <td>
                <?php echo $aluno->getMatricula() ?>
            </td>
        </tr>
        <tr>
            <th>Curso</th>
            <td>
                <a href="<?php echo url_for('grade/index') ?>" title="Clique para ver a grade do curso">
                    <?php echo $aluno->getTbcursoversao() ?>
                </a>
            </td>
        </tr>
        <tr>
            <th>C.H. Total</th>
            <td>
                <?php echo $aluno->getChTotal() ?>h
            </td>
        </tr>
        <tr>
            <th>Ingresso</th>
            <td>
                <?php echo $aluno->getDtIngresso('d/m/Y') ?>
            </td>
        </tr>
        <tr>
            <th>Situação</th>
            <td class="alunosituacao<?php echo $aluno->getIdSituacao() ?>">
                <?php echo $aluno->getTbalunosituacao() ?>
            </td>
        </tr>
    </table>
</div>