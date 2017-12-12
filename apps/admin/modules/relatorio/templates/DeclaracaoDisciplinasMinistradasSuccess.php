<?php
/**
 * Template de relatorio com o odtPHP
 *
 */

$vars = $form->getTemplateVars();


setlocale (LC_ALL, 'pt_BR.UTF-8');

//require_once(dirname(__FILE__).'/../lib/vendor/mpdf/mpdf.php');

$templatePath = dirname(__FILE__).'/../lib/vendor/declaracoes/professor/DisciplinasMinistradas.php';
//
if(!is_file($templatePath)) throw new Exception("Template não existe");

ob_start();

//var_dump($path);

define('MPDF_PATH',dirname(__FILE__).'/../lib/vendor/mpdf/');
include(MPDF_PATH . 'mpdf.php');

$mpdf = new mPDF('UTF-8');
$mpdf->charset_in='UTF-8';
//charset=ISO-8859-1

include(dirname(__FILE__).'/../lib/vendor/declaracoes/professor/Disciplinas_Ministradas.php');



$mpdf->Output(dirname(__FILE__).'/../lib/vendor/declaracoes/arquivo.pdf');
// imprime
//exit;