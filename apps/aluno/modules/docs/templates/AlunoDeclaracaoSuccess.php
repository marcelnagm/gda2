<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
//setando variaveis da declaracaçãp
//error_reporting(0) ;
//modelo da declaração
//header('<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />');
if (isset($template)) {
    setlocale(LC_ALL, 'pt_BR');

    require_once(dirname(__FILE__) . '/../../../../../lib/vendor/odtphp/odf.php');
// Make sure you have Zip extension or PclZip library loaded
// First : include the librairy
    $odf = new odf(dirname(__FILE__) . "/../lib/vendor/declaracoes/" . $template . ".odt");
//$odf->setVars('professor',  $professor);

    foreach ($values as $key => $value) {
        $odf->setVars($key, $value);
    }

    if (isset($disciplinas)) {

        foreach ($disciplinas AS $disciplina) {
            $article = $odf->setSegment('L');
            $article->nomeArticle(utf8_decode($disciplina['descricao']));
            $article->turmaArticle($disciplina['turma']);
            $article->codArticle($disciplina['cod']);
            $article->caraterArticle($disciplina['carater']);
            $article->situacaoArticle(strcode2utf($disciplina['situacao']));
//            $dia = '';
            $dia = $disciplina['dias'];
//            foreach ($dias as $d){
//                $dia = $d."\n";
//            }
            $article->situacao1Article($dia);
            $article->merge();
        }
        $odf->mergeSegment($article);
    }

    $odf->setVars('data', strftime(" %d de %B de %Y"));

//$odf->setVars('dep', $departamento);
//loop que pegaria a lista com os niveis
//$article = $odf->setSegment('articles');
// We export the file
    $odf->exportAsAttachedFile('declaracao_' . $values['nome'] . '.odt');
//$odf->saveToDisk('./arquivo.odt');
?>
<?php
    exit();
} else {
    if (isset($message)) {
?>

        <div class='error'>Erro Ao tentar gerar declaração<br>
                        </div>
<?php
        echo nl2br($message);
    }
}
?>
