<td>
    <form action="<?php echo url_for1('fila/index') ?>" method="POST">
        <input type="hidden" name="cod_disciplina" value="<?php echo $disciplina ?>">
        <input type="hidden" name="turma" value="<?php echo $turma ?>">
        <input type="submit" name="Solicitar" value="Solicitar">
    </form>
</td>