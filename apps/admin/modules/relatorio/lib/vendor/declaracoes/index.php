
<?php

function getData($format = "%d de %B de %G ") {
  setlocale(LC_ALL,'pt_BR');
    return strftime($format);
}

//inicia o buffer do arquivo a ser gerado
ob_start();

define('MPDF_PATH', '../mpdf/');
include(MPDF_PATH . 'mpdf.php');

$mpdf = new mPDF('UTF-8');
$mpdf->charset_in='UTF-8';
//charset=ISO-8859-1
$data = getData();
?>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php

include('./professor/Disciplinas_Ministradas.php');

//inclui de biblioteca
// cria o objeto
$html = ob_get_contents();
$mpdf->WriteHTML($html);

// escreve definitivamente o conteudo no PDF

$mpdf->Output("./arquivo.pdf");
// imprime
//header("Location: ./arquivo.pdf");

exit();
?>