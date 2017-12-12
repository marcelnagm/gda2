<?php
if (isset($template)) {

    require_once(dirname(__FILE__) . '/../lib/vendor/odtphp/odf.php');

    $odf = new odf(dirname(__FILE__) . "/../lib/vendor/ficha/" . $template . ".odt");

    foreach ($values as $key => $value) {
        $odf->setVars($key, $value);
    }
    
    $odf->exportAsAttachedFile('ficha_' . $values['nome'] . '.odt');

    exit();
} else {
?>
    <div class='error'>Erro Ao tentar gerar declaração<br>
    </div>
<?php
    echo $message;
}
?>