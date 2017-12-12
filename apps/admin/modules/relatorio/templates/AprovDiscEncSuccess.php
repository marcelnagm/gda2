<?php

setlocale(LC_ALL, 'pt_BR');
require_once(dirname(__FILE__) . '/../../../../../lib/vendor/odtphp/odf.php');

$odf = new odf(dirname(__FILE__) . "/../lib/vendor/declaracoes/admin/enc_aprov_disc.odt");

foreach ($values as $key => $value) {
    $odf->setVars($key, $value);
}

$odf->exportAsAttachedFile('enc_' . $values['nome'] . '_' . $values['dep'] . '.odt');

exit();
?>