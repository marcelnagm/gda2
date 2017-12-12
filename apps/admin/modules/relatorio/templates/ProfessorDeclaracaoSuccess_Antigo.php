<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


setlocale(LC_ALL, 'pt_BR.UTF-8');
//setando variaveis da declaracaçãp

//error_reporting(0) ;
//modelo da declaração
ob_start();
define('MPDF_PATH', dirname(__FILE__) . '/../lib/vendor/mpdf/');
include(MPDF_PATH . 'mpdf.php');

$mpdf = new mPDF('UTF-8');
$mpdf->charset_in = 'UTF-8';
//charset=ISO-8859-1
//header("Content-type:application/pdf");

include(dirname(__FILE__) . '/../lib/vendor/declaracoes/professor/Disciplinas_Ministradas.php');

$templatePath = dirname(__FILE__) . '/../lib/vendor/declaracoes/';
//
//inicio da leitura do buffer
//var_dump($path);


$html = ob_get_contents();
ob_end_clean();
//$mpdf->WriteHTML($html);
$mpdf->WriteHTML("<html>");
$mpdf->WriteHTML("<body>");
$mpdf->WriteHTML("<b>teste awee!!!<b>");
$mpdf->WriteHTML("<b>teste awee!!!<b>");
$mpdf->WriteHTML("</body>");
$mpdf->WriteHTML("</html>");
//
$file = (string) dirname(__FILE__) . '/../lib/vendor/declaracoes/arquivo2.pdf';
$mpdf->Output($file);
exit();

