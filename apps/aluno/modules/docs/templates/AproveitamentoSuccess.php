<?php
require_once(dirname(__FILE__) . '/../../../../../lib/vendor/odtphp/odf.php');
$odf = new odf(dirname(__FILE__) . '/../lib/vendor/aproveitamento/form-'. $curso . '.odt');

setlocale (LC_ALL, 'pt_BR');
$odf->exportAsAttachedFile('solicitacao_aproveitamento.odt');

exit();
?>