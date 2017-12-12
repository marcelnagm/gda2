<?

$titulo = "Súmula - semestre 2010.1.0";


//First of all we prevent browsers from caching
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");


#include_once('config.php');
#include_once('sessao.php');
#include_once('log.php');


$referer = getenv('HTTP_REFERER');


if(!isset($_SESSION['ssProf']) OR empty($_SESSION['ssProf'])){
LogThis("Acesso inválido: ".getenv('REQUEST_URI')."\r\nRef: ".getenv('HTTP_REFERER'));
header("Location: index.php");
}

include "clProfessor.php";
$professor = new clProfessor;
$professor->cod_prof = $_SESSION['ssProf'];
$professor->buscaPorCodigo();

include "clTurma.php";
$turma = new clTurma;
$turma->cod_disciplina = $_GET['cod_disciplina'];
$turma->turma = $_GET['turma'];
$turma->cod_prof = $_SESSION['ssProf'];

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
  <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
  <title><?= $titulo ?></title>
  <LINK REL="StyleSheet" HREF="lista_notas_impressao.css" TYPE="text/css">
</head>
<body>

<noscript>
<div id="avisoJS">
&Eacute; preciso acionar o JavaScript para que este sistema funcione corretamente
</div><br>
</noscript>

<div id="geral" align="center" style="margin:3px">

<table width=735 cellpadding=17 cellspacing=1><tr><td align=center valign=middle>

<h1 align="left">
        <img src="imgs/logo.gif" alt="UFRR" align="left" style="margin-bottom:3px">
        <i>Universidade Federal de Roraima</i><br>
        <i><?= $titulo ?></i>
</h1>
<br clear="all">


<div align="left">
        <span class="aba">
        <i><b>Dados do Professor</b></i>
        </span>
        <div class="content">
                <span style="white-space:nowrap">
<?
/*                <b>Código</b>: <?= $professor->cod_prof ?> &nbsp;&nbsp;&nbsp;
*/
?>
                <b>Nome</b>: <?= $professor->nome ?></a> &nbsp;&nbsp;&nbsp;</span>
                <span style="white-space:nowrap"><b>Curso</b>: <?= $professor->curso ?> &nbsp;&nbsp;&nbsp;</span>

        </div>

<br>

	<span class="aba"><i><b>Súmula</b></i></span>
	<div class="content" align="center" style="padding-left:1px;padding-right:1px">

<?






        if( !empty($_SESSION['ssProf']) ){


	$resultado = $turma->ListarSumula();

?>

<div align="left">
Disciplina: <b><?= $turma->nome_disciplina  ?></b>&nbsp;&nbsp;&nbsp;
Turma: <b><?= $turma->turma ?></b>&nbsp;&nbsp;&nbsp;
Carga Horária: <b><?= $turma->ch_disciplina  ?></b>&nbsp;&nbsp;&nbsp;
</div>
<br>

<?

	if( mysql_num_rows($resultado) AND !empty($_SESSION['ssProf']) ){

?>
         <table id="tbsumula"  style="border-collapse:collapse;border: black 1px solid;font-size:12px" border="1" bordercolor="#000000">
	<tr>
	<th>Data</th>
	<th width="82%">Descrição</th>
	</tr>
<?

        while($row = mysql_fetch_array($resultado)){

?>
	<tr>
		<td><b><?= MudaData($row['data']) ?></b></td>
		<td><?= $row['descricao'] ?></td>
	</tr>

<?      } ?>
        </table>
<br>
<br>
<br>

<div align="center">
<div id="assinatura">
Assinatura do(a) professor(a)
</div>
</div>
<br>


<? }else{ ?>
	<div>Sem registros</div>
<? }  // Fim IF ssProf

}

?>


        <!-- fim da súmula -->

        </div>
</div>


</td></tr>
</table>

</div>

</body>
</html>

<? #include_once('fechaconexao.php'); ?>
