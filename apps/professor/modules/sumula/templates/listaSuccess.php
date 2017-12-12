<?php use_helper('Date') ?>
<?php use_helper('jQuery') ?>
<?php jq_add_plugin('jquery-ui-1.7.2.custom.min.js'); ?>
<?php jq_add_plugin('jquery.ui.datepicker-pt-BR.js'); ?>
<?php use_stylesheet('/sfJqueryReloadedPlugin/css/ui-lightness/jquery-ui-1.7.2.custom.css') ?>
<?php use_javascript('/js/frm_sumulas.js'); ?>
<?php use_javascript('/js/tinymce/jscripts/tiny_mce/tiny_mce.js'); ?>

<script>
    function Adicionar(){
        var dia = $('#sumula_data_day').val();
        var mes=$('#sumula_data_month').val();
        var ano =$('#sumula_data_year').val();
        var descricao = tinyMCE.get('sumula_descricao').getContent();
        var id_turma =$('#sumula_id_turma').val();
        
                          tinyMCE.get('sumula_descricao').setContent("");
        alert("Adicionando....AGUARDE!");
        document.getElementById('list_sumula').innerHTML = $.ajax({
            type: "POST",
            url:"<?php echo url_for1('sumula/AdicionaSumula') ?>",
            data: 'dia='+dia+'&mes='+mes+'&ano='+ano+'&descricao='+descricao+'&id_turma='+id_turma,
            async: false,
            dataType: "html",
            success:   function(){
                alert("Adicionado!");                
            },
            error: function(){
                alert("Houve um erro ao adicionar a sumula!");
            }
        }).responseText;

    }

    function Remover(id_sumula){

        alert("Removendo....AGUARDE!");
        document.getElementById('list_sumula').innerHTML =  $.ajax({
            type: "POST",
            url:"<?php echo url_for1('sumula/RemoveSumula') ?>",
            data: 'id_sumula='+id_sumula,
            async: false,
            dataType: "html",
            success:   function(){
                alert("Removido!");
            },
            error: function(){
                alert("Houve um erro ao remover a sumula!");
            }
        }).responseText;


    }     
</script>

<h1>Súmula</h1>

<table>
    <tr>
        <td>
            <?php include_component('turma', 'info', array('id_turma' => $id_turma)) ?>
            <br />
            <div>
                <span class="art-button-wrapper">
                    <span class="l"> </span>
                    <span class="r"> </span>
                    <a class="voltar" href="<?php echo url_for('turma/index') ?>">Voltar</a>
                </span>                            
                <span class="art-button-wrapper">
                    <span class="l"> </span>
                    <span class="r"> </span>
                    <a class="imprimir" target="_blank" href="<?php echo url_for('sumula/imprimir?id=' . $sf_request->getParameter('id')) ?>">Imprimir</a>
                </span>
            </div>
            <br />  
        </td>
    </tr>
</table>
<table style="position: relative; bottom: 220px; left: 38%; width: 400px; border: 1px; ">
    <tr>
        <td rowspan="2" colspan="2">
            <h3>Nova Súmula</h3>
            <?php include_partial('form', array('form' => $form, 'TbturmaSumula' => $TbturmaSumula, 'id_turma' => $id_turma)) ?>

        </td>
    </tr>
</table>
<table  style="position: relative;  bottom: 220px;">
    <tr>
        <td>
   <div id="list_sumula" >
                <?php include_partial('sumula/list_sumulas', array('TbturmaSumulas' => $TbturmaSumulas)) ?>
            </div>
            </td>
    </tr>
</table>
