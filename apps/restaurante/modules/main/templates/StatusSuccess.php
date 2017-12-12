<?php
use_helper('I18N');
use_helper('jQuery');
use_stylesheet('/sfPropelPlugin/css/default.css');
use_stylesheet('/sfPropelPlugin/css/global.css');
?>
<script type="text/javascript">
    function load() {
        document.getElementById("VerificaAluno_matricula").focus();
    }
</script>
<body onload="load()">
    <form action="<?php echo url_for($form->getURLPOST()) ?>" method="POST">
        <div style="width: 100%; height: auto; vertical-align: middle" align="center">
            <br>
            <?php
            if (isset($matricula)) {
                echo '<br><div align="center" style="background-color:lightgray">';
                echo '<font color="#000000" size="5">' . $nome . '</font>';
                echo '</div>';
            }
            echo '<br>';
            if (isset($status)) {
                if ($status == 'ok') {
                    echo '<div align="center" style="background-color:lightgreen">';
                    echo '<font color="green" size="7">ALUNO REGULAR</font>';
                    echo '</div>';
                } else if (isset($matricula)) {
                    echo '<div align="center" style="background-color:red">';
                    echo '<font color="#FFFFFF" size="7">SITUAÇÃO IRREGULAR</font>';
                    echo '</div>';
                } else {
                    echo '<div align="center" style="background-color:red">';
                    echo '<font color="#FFFFFF" size="7">MATRÍCULA INEXISTENTE</font>';
                    echo '</div>';
                }
            }
            ?>
            <br>
        </div>
        <br><br>
        <div align="center">
            <?php if (isset($form['_csrf_token'])) echo $form['_csrf_token'] ?>
            <?php echo $form['matricula']; ?>
            <br>
            <input type="submit" value="Verificar Situação"/>
        </div>
    </form>
</body>