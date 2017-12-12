<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

if (!isset($message)) {

  setlocale(LC_ALL, 'pt_BR');
 require_once(dirname(__FILE__) . '/../../../../../lib/vendor/odtphp/odf.php');

    $odf = new odf(dirname(__FILE__) . "/../lib/vendor/declaracoes/aluno/" . $template . ".odt");
    
    foreach ($values as $key => $value) {
        $odf->setVars($key, $value);
    }


    if (isset($historico)) {
        if ($template == "historico_final_mestrado_procisa" || $template == "historico_final_mestrado" || $template == "historico_final_esp") {
            foreach ($historico AS $disciplina) {
                $article = $odf->setSegment('L');            
                if ($disciplina['Carater'] == 'OBRIGATORIA' || $template == "historico_final_esp") {
                    $article->cod($disciplina['cod']);
                    $article->nome(utf8_decode($disciplina['nome']));
                    $article->media($disciplina['media']);
                    $article->ch($disciplina['CH']);
//                    $article->situacao($disciplina['Sit']);
                    if($template == "historico_final_esp"){
//                        $article->ini($disciplina['inicio']);
//                        $article->fim($disciplina['fim']);
                    }
                    $article->merge();
                } else {
                    $article2 = $odf->setSegment('Z');
                    $article2->cod($disciplina['cod']);
                    $article2->nome(utf8_decode($disciplina['nome']));
                    $article2->media($disciplina['media']);
                    $article2->ch($disciplina['CH']);
//                    $article2->situacao($disciplina['Sit']);
                    $article2->merge();
                }
            }
            $odf->mergeSegment($article);
            if(isset ($article2))$odf->mergeSegment($article2);
            $odf->setVars('data', strftime("%d.%m.%Y"));

        
    } else {
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
          $odf->setVars('data', utf8_encode(strftime(" %d de %B de %Y")));
    }
  


//$odf->setVars('dep', $departamento);


//loop que pegaria a lista com os niveis
//$article = $odf->setSegment('articles');
// We export the file
$odf->exportAsAttachedFile('declaracao_' . $values['nome'] . '.odt');
//$odf->saveToDisk('./arquivo.odt');
?>
<?php
exit();
    }
}else {

?>
    <div class='error'><h2 >Erro Ao tentar gerar<br></h2>
    </div>
<?php
    echo $message;
}
?>