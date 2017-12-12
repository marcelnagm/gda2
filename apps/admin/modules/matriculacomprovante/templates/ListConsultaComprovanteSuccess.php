<html>
    <body>
        <form id="consulta_comprovante" method="POST" action="/matricula/index.php/<?php echo $post_modulo ?>/Status">
            <input type="hidden" name="matricula" value="<?php echo $matricula_comprovante->getMatricula() ?>" />
            <input type="hidden" name="codigo" value="<?php echo $matricula_comprovante->getCodigo() ?>" />
        </form>
        <script>
            document.getElementById("consulta_comprovante").submit();
        </script>        
    </body>
</html>

