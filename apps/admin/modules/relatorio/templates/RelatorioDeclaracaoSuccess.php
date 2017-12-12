<?php
/**
 * Template de relatorio padrao com o odtPHP
 *
 */


setlocale (LC_ALL, 'pt_BR.UTF-8');

require_once(dirname(__FILE__).'/../lib/vendor/odtphp/odf.php');

$templatePath = dirname(__FILE__)."/".$form->getRelatorioNome().".odt";

if(!is_file($templatePath)) throw new Exception("Template ".$form->getRelatorioNome().".odt não existe");

$odf = new odf($templatePath);

foreach($form->getTemplateVars() as $key => $value) {
    $odf->setVars($key, $value);
}

$odf->exportAsAttachedFile($form->getRelatorioNome().'_'.strftime('%d_%m_%Y').'.odt');
//$odf->saveToDisk('./arquivo.odt');

exit;