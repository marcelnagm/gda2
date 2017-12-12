<body <?php if (isset($ativar_fila)) echo 'onload="ChecaHorario();"'; ?>>
<?php use_stylesheet('/sfPropelPlugin/css/global.css', 'first') ?>
<?php use_stylesheet('/sfPropelPlugin/css/default.css', 'first') ?> 
<script type="text/javascript" src="../sfJqueryReloadedPlugin/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="../sfJqueryReloadedPlugin/js/plugins/jquery.filter.js"></script>
<link rel="stylesheet" type="text/css" media="screen" href="../sfPropelPlugin/css/global.css" />
<link rel="stylesheet" type="text/css" media="screen" href="../sfPropelPlugin/css/default.css" />



<h1>Fila Eletrônica Atual</h1>

<div>
    <span class="art-button-wrapper">
        <span class="l"> </span>
        <span class="r"> </span>
        <a class="voltar" href="<?php echo url_for('painel/index') ?>">Voltar</a>
    </span>
    <span class="art-button-wrapper">
        <span class="l"> </span>
        <span class="r"> </span>
        <a class="imprimir" target="_blank" href="<?php echo url_for('fila/Imprimir') ?>">Imprimir</a>
    </span>
    <span class="art-button-wrapper">
        <span class="l"> </span>
        <span class="r"> </span>
        <a class="filas"  href="<?php echo url_for('fila/anteriores') ?>">Filas Anteriores</a>
    </span>
</div>


<br />

<div id="list_filas">
    <?php include_partial('fila/list_filas', array('Tbfilas' => $Tbfilas, 'com_horario' => true, 'label_periodo' => false,'com_delete' => $fila_allow, 'com_tranc' => $com_tranc)); ?>
</div>

<?php if($com_tranc == true) :?>

<script type="text/javascript">

    function Trancar(id_fila){

    if(confirm("--Operação: Trancamento de matrícula--\n\nUma vez que a disciplina seja trancada,\n não é possível reverter a situação dela.\n\nAperte 'OK' para continuar ou 'Cancelar' para cancelar")) {
    var xhr = $.ajax({
        type: "POST",
        url: "<?php echo url_for1('fila/TrancarFila(') ?>",
        data: 'id_fila='+id_fila,
        async: false,
        dataType: "html",
        timeout: 5000,
        error: function(){
            alert("Houve um erro ao executar a sua solicitação!");
        }
    });

    if(xhr.readyState == 4){
//        document.getElementById('list_filas').innerHTML  = xhr.responseText;
        window.location = "<?php echo url_for1('fila/index') ?>";
        getError();
    }}

    }

    function TrancarSemestre(){

    if(confirm("--Operação: Trancamento de semestre--\n\nAtenção: Essa operação é irreversível.\nLeia as instruções antes de continuar.\n\nAperte 'OK' para continuar ou 'Cancelar' para cancelar")) {
    var xhr = $.ajax({
        type: "POST",
        url: "<?php echo url_for1('fila/TrancarSemestre') ?>",
        async: false,
        dataType: "html",
        timeout: 5000,
        error: function(){
            alert("Houve um erro ao executar a sua solicitação!");
        }
    });

    if(xhr.readyState == 4){
//        document.getElementById('list_filas').innerHTML  = xhr.responseText;
        window.location = "<?php echo url_for1('fila/index') ?>";
        getError();
    }}

    }

    function getError(){
        document.getElementById('erro').style.backgroundColor = 'red';
        document.getElementById('erro').innerHTML = $.ajax({
            type: "GET",
            url:"<?php echo url_for1('fila/ReturnErro') ?>",
            async: false,
            dataType: "html",
            timeout: 5000,
            error: function(){
                alert("Houve um erro ao executar a sua solicitação!");
            }
        }).responseText;

        var t=setTimeout("LimpaError();",30000);

    }

    function LimpaError(){
        document.getElementById('erro').innerHTML ='';
        document.getElementById('erro').style.backgroundColor = 'white';
    }
</script>
<h3>Trancamento de Disciplinas</h3>
<ul>
    <li>Ao trancar uma disciplina, ela passará a constar na fila como "DISC TRANC" (Disciplina Trancada).</li>
    <li>Depois do trancamento, não será possível reverter a situação da disciplina.</li>
    <li>Para trancar uma disciplina, clique no botão "Trancar" ao lado da disciplina na lista acima.</li>
</ul>
<h3>Trancamento de Semestre</h3>
<ul>
    <li>Ao trancar o semestre, todas as disciplinas da sua fila serão trancadas automaticamente, e
        a disciplina <b>ST999</b>, turma <b>A</b> irá constar na sua fila.</li>
    <li>Depois do trancamento, não será possível reverter o trancamento das disciplinas solicitadas.</li>
    <li>Você pode trancar até quatro semestre letivos durante o curso.</li>
    <li>Para trancar o semestre, clique no botão "Trancar Semestre", logo abaixo.</li>
</ul>
<div id="erro" class="error" style="background: white;">

</div>
<?php include_partial('form_tranca', array('render' => $render)) ?>
<?php endif;?>

<?php if($fila_allow == true) :?>

<script type="text/javascript">

    function getError(){
        document.getElementById('erro').style.backgroundColor = 'red';
        document.getElementById('erro').innerHTML = $.ajax({
            type: "GET",
            url:"<?php echo url_for1('fila/ReturnErro') ?>",
            async: false,
            dataType: "html",
            timeout: 5000,
            error: function(){
                alert("Houve um erro ao executar a sua solicitação!");
            }
        }).responseText;

        var t=setTimeout("LimpaError();",30000);

    }

    function LimpaError(){
        document.getElementById('erro').innerHTML ='';
        document.getElementById('erro').style.backgroundColor = 'white';
    }

    function ChecaHorario(){

        var cod_disciplina = $('#cod_disciplina').val();
        var turma =$('#turma').val();

        var xhr = $.ajax({
            type: "POST",
            url: "<?php echo url_for1('fila/ChecaHorario') ?>",
            data: 'cod_disciplina='+cod_disciplina+'&turma='+turma+'&matricula='+<?php echo $sf_user->getAttribute('aluno')->getMatricula(); ?>,
            async: false,
            timeout: 5000,
            dataType: "html",            
            error: function(){
                alert("Houve um erro ao executar a sua solicitação!");
            }
        });

        if(xhr.readyState == 4){
            if(xhr.responseText != 'False'){
                    document.getElementById('list_filas').innerHTML =  xhr.responseText ;
                    $('#cod_disciplina').val('');
                    $('#turma').val('');
            }else{
                alert("Houve um erro ao enviar a sua solicitação,\n....Aperte OK para continuar!");
            }
            getError();
        }
    }



    function Remover(id_fila){

    if(!confirm("Remover fila?")) return;
    
    var xhr = $.ajax({
        type: "POST",
        url: "<?php echo url_for1('fila/RemoverFila') ?>",
        data: 'id_fila='+id_fila,
        async: false,
        dataType: "html",
        timeout: 5000,
        error: function(){
            alert("Houve um erro ao executar a sua solicitação!");
        }
    });

    if(xhr.readyState == 4){
        document.getElementById('list_filas').innerHTML  = xhr.responseText;
        getError();
    }

    }
</script>

<ul>
    <li>Verifique se a disciplina está disponível na <a target="_blank" href="<?php echo url_for1('oferta/index'); ?>">lista de oferta de disciplinas (Clique aqui para abrir a lista)</a></li>
<li>Digite o <b>código da disciplina</b> e a <b>turma</b> no formulário abaixo e clique em <b>Enviar</b>.</li>
<li>O Código de Trancamento de Semestre é <b>ST999</b>, turma <b>A</b>.</li>
<li>Você pode trancar até quatro semestre letivos.</li>
<li>Verifique se tem o pré-requisito antes de solicita-lá.
Mudanças de grade podem ocasionar esse problema, verifique se o codigo novo esta presente no seu histórico.</li>
</ul>
<div id="erro" class="error" style="background: white;">

</div>
<?php include_partial('form', array('form' => $form)) ?>

<?php endif;?>
</body>