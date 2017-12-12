<table align="center">
    <tr>
        <td><h3 style="text-align: right">INSCRIÇÃO: </h3></td>
        <td><h4><?php echo $comprovante->getCodigo(); ?></h4></td>
    </tr>
    <tr>
        <td><h3 style="text-align: right">NOME: </h3></td>
        <td><h4><?php echo $comprovante->getTbalunomatricula()->getNome(); ?></h4></td>
    </tr>
    <tr>
        <td><h3 style="text-align: right">CPF: </h3></td>
        <td><h4><?php echo $comprovante->getTbalunomatricula()->getCpf(); ?></h4></td>
    </tr>
    <tr>
        <td><h3 style="text-align: right">CURSO: </h3></td>
        <td><h4><?php echo TbcursoversaoPeer::retrieveByPK($comprovante->getTbalunomatricula()->getIdVersaoCurso())->getTbcurso()->getDescricao(); ?></h4></td>
    </tr>
    <tr>
        <td><h3 style="text-align: right">SITUAÇÃO: </h3></td>
        <td><h4><?php echo $comprovante->getSituacao(); ?></h4></td>
    </tr>
</table>
<br><br>
<table align="center">
    <thead>
    <th colspan="2" align="center">
        <b style="font-size: 30px;">Clique nos botões abaixo para imprimir seus dados.</b>
    </th>
</thead>
<tr>
    <td align="center">
        <a href="<?php echo url_for1('gradtran2013/GerarFicha'); ?>">
            <div align="center" style="
                 border:3px solid #999999;
                 width:300px;
                 height:100px;
                 margin:15px 15px 15px 15px;
                 font-size:27px;
                 font-weight:bold;
                 background-color:#EBEBEB;" align="center">
                <br>FICHA DE ALUNO<br>
            </div>
        </a>
    </td>
    <td>
        <a href="<?php echo url_for1('gradtran2013/Imprimir'); ?>" target="_blank">
            <div align="center" style="
                 border:3px solid #999999;
                 width:300px;
                 height:100px;
                 margin:15px 15px 15px 15px;
                 font-size:20px;
                 font-weight:bold;
                 background-color:#EBEBEB;" align="center">
                <br>COMPROVANTE DE MATRÍCULA<br>
            </div>
        </a>
    </td>
</tr>
</table>
<br><br>
<h3 style="text-align: center"><a href="<?php echo url_for1('gradtran2013/index'); ?>">Voltar ao Menu</a></h3>