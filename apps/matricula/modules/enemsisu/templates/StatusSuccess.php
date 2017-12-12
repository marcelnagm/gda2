<table align="center">
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
    <tr>
        <td><h3 style="text-align: right">SITUAÇÃO: </h3></td>
        <td><h4><?php echo $aluno->getOpcao(); ?></h4></td>
    </tr>
</table>
<br><br>
<h3 style="text-align: center"><a href="<?php echo url_for1('enemsisu/index'); ?>">Voltar ao Menu</a></h3>