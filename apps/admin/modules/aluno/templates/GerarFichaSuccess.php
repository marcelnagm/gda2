<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
//setando variaveis da declaracaçãp
//error_reporting(0) ;
//modelo da declaração
//header('<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />');
if(isset ($template)){    

require_once(dirname(__FILE__) . '/../../../../../lib/vendor/odtphp/odf.php');
// Make sure you have Zip extension or PclZip library loaded
// First : include the librairy
$odf = new odf(dirname(__FILE__) . "/../lib/vendor/ficha/" . $template . ".odt");
//$odf->setVars('professor',  $professor);

foreach ($values as $key => $value) {
    $odf->setVars($key, $value);
}

//loop que pegaria a lista com os niveis
//$article = $odf->setSegment('articles');
// We export the file
$odf->exportAsAttachedFile('ficha_' . $values['nome'] . '.odt');
//$odf->saveToDisk('./arquivo.odt');
?>
<?php

exit();
}else{
  ?>
<div class='error'>Erro Ao tentar gerar declaração<br>
</div>
  <?php
    echo $message;
}
?>