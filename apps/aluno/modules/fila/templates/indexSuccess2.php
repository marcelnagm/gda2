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
    <?php include_partial('fila/list_filas', array('Tbfilas' => $Tbfilas, 'com_horario' => true, 'label_periodo' => false,'com_delete' => $fila_allow)); ?>
</div>

<?php if($fila_allow == true) :?>

<script type="text/javascript">

    function getError(){

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

        var t=setTimeout("LimpaError();",4000);

    }

function LimpaError(){
document.getElementById('erro').innerHTML ='';


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

        alert("Removendo....\nAperte Ok para Continuar");
        var xhr = $.ajax({
            type: "POST",
            url: "<?php echo url_for1('fila/RemoverFila(') ?>",
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
 }  
        getError();
    }
</script>

<b style="font-size: 16px; background-color: RED; color: WHITE;">Atenção, As turmas com código CAL são voltadas para calouros.<br>
    APENAS a vagas remanescentes serão alocadas na segunda  fase de matricula para os alunos veteranos.   </b>
<ul>
    <li>Verifique se a disciplina está disponível na <a target="_blank" href="<?php echo url_for1('oferta/index'); ?>">lista de oferta de disciplinas (Clique aqui para abrir a lista)</a></li>
<li>Digite o <b>código da disciplina</b> e a <b>turma</b> no formulário abaixo e clique em <b>Enviar</b>.</li>
<li>O Código de Trancamento de Semestre é <b>ST999</b>, turma <b>A</b>.</li>
<li>Você pode trancar até quatro semestre letivos.</li>
<li>Verifique se tem o pré-requisito antes de solicita-lá.
Mudanças de grade podem ocasionar esse problema,verifique se o codigo novo esta presente no seu histórico</li>
</ul>

<div id="erro" class="error">    
</div>
<?php include_partial('form', array('form' => $form)) ?>

<?php endif;?>