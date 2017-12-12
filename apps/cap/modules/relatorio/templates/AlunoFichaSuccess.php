<?php

setlocale(LC_ALL, 'pt_BR');

require_once(dirname(__FILE__) . '/../lib/vendor/odtphp/odf.php');
$odf = new odf(dirname(__FILE__) . "/../lib/vendor/declaracoes/aluno/ficha_aluno_aplicacao.odt");

foreach ($values as $key => $value) {
    $odf->setVars($key, $value);
}

$odf->exportAsAttachedFile('ficha_' . $values['nome_aluno'] . '.odt');

exit();
?>