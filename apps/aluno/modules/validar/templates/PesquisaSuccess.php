<?php if ($valido) { ?>
    <div style="background-color: green;color: white; font-size: 27px; text-align: center;">
        DECLARAÇÃO VÁLIDA
    </div>
    <div align="center" style=" text-align: center; border:3px solid #999999; margin:15px 15px 15px 15px;font-size:20px;font-weight:bold;background-color:#EBEBEB;">
        <table align="center">
            <tr>
                <td style="text-align: right">Matrícula:</td>
                <td><?php echo $dados->getMatricula(); ?></td>
            </tr>
            <tr>
                <td style="text-align: right">Número de autenticação:</td>
                <td><?php echo $dados->getNumAuth(); ?></td>
            </tr>
            <tr>
                <td style="text-align: right">Data de emissão:</td>
                <td><?php echo $dados->getData('d/m/Y'); ?></td>
            </tr>
            <tr>
                <td style="text-align: right">Hora de emissão:</td>
                <td><?php echo $dados->getHora(); ?></td>
            </tr>
            <tr>
                <td style="text-align: right">Tipo de declaração:</td>
                <td><?php echo $dados->getTbvalidacaotipo(); ?></td>
            </tr>
        </table>
    </div>
<?php } else {
 ?>
    <div style="background-color: red;color: white; font-size: 27px; text-align: center;">
        DECLARAÇÃO INVÁLIDA
    </div>
<?php } ?>
<h3 style="text-align: center"><a href="<?php echo url_for1('validar/index'); ?>">Voltar ao Menu</a></h3>