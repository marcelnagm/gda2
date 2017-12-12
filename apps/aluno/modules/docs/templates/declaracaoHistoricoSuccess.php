<?php
if (!isset($message)) {

    setlocale(LC_ALL, 'pt_BR');
    require_once(dirname(__FILE__) . '/../../../../../lib/vendor/odtphp/odf_new.php');

    $odf = new odf(dirname(__FILE__) . "/../lib/vendor/declaracoes/" . $template . ".odt");

    foreach ($values as $key => $value) {
        $odf->setVars($key, $value);
    }

    if (isset($historico)) {
        foreach ($historico AS $disciplina) {
            $article = $odf->setSegment('L');
            $article->periodo($disciplina['periodo']);
            $article->cod($disciplina['cod']);
            $article->nome(utf8_decode($disciplina['nome']));
            $article->faltas($disciplina['faltas']);
            $article->media($disciplina['media']);
            $article->ch($disciplina['CH']);
            $article->carater($disciplina['Carater']);
            $article->situacao($disciplina['Sit']);
            $article->merge();
        }
        $odf->mergeSegment($article);
        $odf->setVars('data', strftime(" %d de %B de %Y"));

        $odf->exportAsAttachedFile('declaracao_' . $values['nome'] . '.odt');
?>
<?php
        exit();
    }
} else {
?>
    <div class='error'><h2 >Erro ao tentar gerar declaração!<br></h2>
    </div>
<?php
    echo $message;
}
?>