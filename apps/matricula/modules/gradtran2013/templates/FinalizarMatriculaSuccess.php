<body onbeforeunload="return 'Por favor, imprima os documentos antes de sair.'; ">
<script type="text/javascript" >

    function abre(){
        window.open('<?php echo url_for1('gradtran2013/Imprimir'); ?>','Fila Eletronica');
    }
</script>
<div style="background-color: green;color: white; font-size: 20px; text-align: center;">
    Matrícula efetuada com sucesso!
</div>
<br>
<table align="center">
    <thead>
    <th colspan="2" align="center">
        <b style="font-size: 30px;">Por favor, imprima os documentos abaixo<br>e leve-os para o cadastramento no DERCA.</b>
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
        <a href="javascript:abre()">
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
</body>