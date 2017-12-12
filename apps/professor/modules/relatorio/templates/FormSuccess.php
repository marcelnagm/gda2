<?php
use_helper('I18N');
use_helper('jQuery');
use_stylesheet('/sfPropelPlugin/css/default.css');
use_stylesheet('/sfPropelPlugin/css/global.css');
?>
<div id="sf_admin_container">
    <h1>Relatórios</h1>
    <h2><?php echo $form->getTitulo() ?></h2>
    <div><?php echo $form->getDescricao() ?></div>
    <br />
    <div class="sf_admin_form">

        <form class="relatorio-form" action="<?php echo url_for($form->getURLPost()) ?>" method="POST">
            <?php  if(isset ($form['_csrf_token'] )) echo $form['_csrf_token'] ?>
            <?php if ($form->hasGlobalErrors()): ?>
                <?php echo $form->renderGlobalErrors() ?>
            <?php endif; ?>
            <fieldset id="sf_fieldset_none">

                <?php foreach ($form->getFields() as $name => $type): ?>

                    <?php include_partial('relatorio/form_field', array(
                            'name'       => $name,
                            'help'       => null,
                            'form'       => $form,
                            'field'      => $form[$name],
                            'type'       => $type,
                            'class'      => 'sf_admin_form_row sf_admin_'.strtolower($type).' sf_admin_form_field_'.$name,
                            )) ?>

                <?php endforeach; ?>

            </fieldset>
            <?php #echo $form ?>
            <input type="submit" value="Gerar relatório"/>
        </form>
    </div>
</div>
<script type="text/javascript">
    // checkboxlist option
    $('<a href="javascript:void(0)" onclick="$(\'.checkbox_list input[type=checkbox]\',this.parent).attr(\'checked\',true)">Todos</a> | <a href="javascript:void(0)" onclick="$(\'.checkbox_list input[type=checkbox]\',this.parent).attr(\'checked\',false)">Nenhum</a>').insertBefore('ul.checkbox_list');
    //sort list
<?php if(isset($form['show_fields'])) : ?>
    $(".sf_admin_form_field_show_fields ul.checkbox_list").sortable({ axis: 'y' }).attr('title','Clique e arraste para ordenar os campos');
    $(".sf_admin_form_field_show_fields ul.checkbox_list").hover(function(){
        $(this).addClass('can-drag');
    },function(){
        $(this).removeClass('can-drag');
    });
<?php endif ?>
</script>

<?php if($form->getRelatorioNome() == 'AlunosPorCurso') : ?>
<style type="text/css">
    .sf_admin_form_field_ano,
    .sf_admin_form_field_semestre,
    .sf_admin_form_field_periodo {
        display: none;
    }
</style>
<script type="text/javascript">
    $('#relatorio_id_fila_situacao').change(function(){
        if(this.options[this.selectedIndex].value!=''){
            $('.sf_admin_form_field_ano').show(300);
            $('.sf_admin_form_field_semestre').show(300);
            $('.sf_admin_form_field_periodo').show(300);
        } else {
            $('.sf_admin_form_field_ano').hide(300);
            $('.sf_admin_form_field_semestre').hide(300);
            $('.sf_admin_form_field_periodo').hide(300);
        }
    });
</script>
<?php endif ?>