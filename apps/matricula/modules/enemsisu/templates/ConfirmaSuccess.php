<div align="center">
    <h2 style="text-align: center">Por favor, confira seus dados e clique em confirmar.</h2>

    <table>
        <tr>
            <td><h3 style="text-align: right">INSCRIÇÃO: </h3></td>
            <td><h4><?php echo $aluno->getMatricula() * 19; ?></h4></td>
        </tr>
        <tr>
            <td><h3 style="text-align: right">NOME: </h3></td>
            <td><h4><?php echo $aluno->getNome(); ?></h4></td>
        </tr>
        <tr>
            <td><h3 style="text-align: right">CPF: </h3></td>
            <td><h4><?php echo $aluno->getCpf(); ?></h4></td>
        </tr>
        <tr>
            <td><h3 style="text-align: right">CURSO: </h3></td>
            <td><h4><?php echo TbcursoversaoPeer::retrieveByPK($aluno->getIdVersaoCurso())->getTbcurso()->getDescricao(); ?></h4></td>
        </tr>
    </table>
    <br>
    <form action="<?php echo url_for1('enemsisu/Confirma') ?>" method="POST">
        <input type="hidden" name="status" value="ok">
        <input type="hidden" name="CPF" value="<?php echo $aluno->getCpf(); ?>">
        <input align="center" type="submit" value="Confirmar">
    </form>
</div>
<br><br>
<h3 style="text-align: center"><a href="<?php echo url_for1('enemsisu/index'); ?>">Voltar ao Menu</a></h3>