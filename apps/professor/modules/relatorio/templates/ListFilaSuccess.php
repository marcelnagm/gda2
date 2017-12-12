<?php use_helper('I18N') ?>
<h1><?php echo $form->getTitulo() ?></h1>
<div class="info">

    <?php if(isset($periodo)) : ?>
    <p>Período: <?php echo $periodo ?></p>
    <?php endif ?>
    <?php if(isset ($aluno)){ ?>
    <?php  include_partial('relatorio/list_info_aluno',array('aluno' => $aluno))?>
    <p/>
    <h4>  Lista de Disciplinas</h4>
    <?php
    }?>
</div>

<?php  include_partial('relatorio/list_fields',array('list' => $list, 'show_fields' => $show_fields,'data_fields' => $data_fields))?>


