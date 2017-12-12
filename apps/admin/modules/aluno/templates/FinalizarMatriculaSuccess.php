<script type="text/javascript" >
window.onload=abre();

    function abre(){
    window.open('<?php echo url_for1('matricula/Imprimir'); ?>','Fila Eletronica','width=800,height=600,location=no');
    }
</script>
<div style="background-color: green;color: white; font-size: 20px; text-align: center;">
    Matricula Efetuada Com sucesso!
</div>
<br>
Para inicar uma nova matricula <a href="<?php echo url_for1('matricula/SelecionaCPF'); ?>"> Click aqui </a>
