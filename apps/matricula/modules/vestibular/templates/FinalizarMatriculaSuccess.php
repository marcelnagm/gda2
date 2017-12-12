<script type="text/javascript" >

    function abre(){
        window.open('<?php echo url_for1('vestibular/Imprimir'); ?>','Fila Eletronica','width=800,height=600,location=no');
    }
</script>
<div style="background-color: green;color: white; font-size: 20px; text-align: center;">
    Matricula Efetuada Com sucesso!
</div>
<br>
<table align="center">
    <thead>
    <th colspan="2" align="center">
        <b style="font-size: 30px;">Clique nos botões abaixo para imprimir seus dados.</b>
    </th>
</thead>
<tr>
    <td align="center">
        <a href="<?php echo url_for1('vestibular/GerarFicha'); ?>">
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
        <a href="javascript:abre()">
            <div align="center" style="
                 border:3px solid #999999;
                 width:300px;
                 height:100px;
                 margin:15px 15px 15px 15px;
                 font-size:27px;
                 font-weight:bold;
                 background-color:#EBEBEB;" align="center">
                <br>FILA ELETRÔNICA<br>
            </div>
        </a>
    </td>
</tr>
</table>
<br><br>
<h3 style="text-align: center"><a href="<?php echo url_for1('vestibular/index'); ?>">Voltar ao Menu</a></h3>