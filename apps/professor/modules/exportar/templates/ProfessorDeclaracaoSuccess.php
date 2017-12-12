<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
//setando variaveis da declaracaçãp

//error_reporting(0) ;
//modelo da declaração
//header('<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />');
require_once(dirname(__FILE__) . '/../../../../../lib/vendor/odtphp/odf.php');
// Make sure you have Zip extension or PclZip library loaded
// First : include the librairy
$odf = new odf(dirname(__FILE__)."/../lib/vendor/".$template.".odt");

//$odf->setVars('professor',  $professor);
$odf->setVars('professor',  $professor);
$odf->setVars('dep', $departamento);
setlocale (LC_ALL, 'pt_BR');
$odf->setVars('data',strftime (" %d %B %Y."));
//loop que pegaria a lista com os niveis
//$article = $odf->setSegment('articles');
$article = $odf->setSegment('articles');
foreach($disciplinas AS $element) {
	$article->codArticle($element['0']);
	$article->turmaArticle($element['1']);
	$article->nomeArticle(utf8_decode($element['2']));
	$article->periodoArticle($element['3']);
	$article->chArticle($element['4']);
	$article->merge();
}
$odf->mergeSegment($article);
// We export the file
$odf->exportAsAttachedFile('declaracao_'.$professor.'.odt');
//$odf->saveToDisk('./arquivo.odt');


?>
<?php
exit();
?>