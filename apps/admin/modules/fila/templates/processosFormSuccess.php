<?php
use_helper('I18N');
use_helper('jQuery');
use_stylesheet('/sfPropelPlugin/css/default.css');
use_stylesheet('/sfPropelPlugin/css/global.css');
?>

<div id="sf_admin_container">
    <h1>Fila Eletrônica - Processos</h1>
    <?php if ($sf_user->hasFlash('error')): ?>
    <ul class="error_list">
        <li><?php echo $sf_user->getFlash('error') ?></li>
    </ul>
    <?php endif ?>
    <?php if ($sf_user->hasFlash('notice')): ?>
    <ul class="notice">
        <li><?php echo $sf_user->getFlash('notice') ?></li>
    </ul>
    <?php endif ?>
</div>
<div class="sf_admin_form">
    <?php if(isset($resultado) && count($resultado)): ?>
    <div class="notice">
        <h3>Resultado da fila eletrônica</h3>
        <table>
            <tr>
                <th>Situação na fila</th>
                <th>Qtde.</th>
            </tr>
                <?php foreach($resultado as $r): ?>
            <tr>
                <td><?php echo $r['descricao'] ?></td>
                <td><?php echo $r['contador'] ?></td>
            </tr>
                <?php endforeach ?>
        </table>
    </div>
    <?php endif ?>

    <form action="<?php echo url_for('fila/processosForm') ?>" method="POST">
        <fieldset>
            <?php if ($form->hasGlobalErrors()): ?>
                <?php echo $form->renderGlobalErrors() ?>
            <?php endif; ?>

            <?php echo $form->renderHiddenFields(); ?>

            <div class="<?php $form['id_periodo']->hasError() and print ' errors' ?>">
                <?php echo $form['id_periodo']->renderError() ?>
                <?php echo $form['id_periodo']->renderLabel() ?>
                <?php echo $form['id_periodo'] ?>
            </div>
            <br />
            <div class="<?php $form['fase']->hasError() and print ' errors' ?>">
                <?php echo $form['fase']->renderError() ?>
                <?php echo $form['fase']->renderLabel() ?>
                <?php echo $form['fase'] ?>
            </div>
            <br />
            <div class="processos<?php $form['executar_processos']->hasError() and print ' errors' ?>">
                <?php echo $form['executar_processos']->renderError() ?>
                <?php echo $form['executar_processos']->renderLabel() ?>
                <?php echo $form['executar_processos'] ?>
            </div>

            <div>
                <input type="submit" value="Executar" />
            </div>
        </fieldset>
    </form>
</div>
<script type="text/javascript">
    // checkboxlist option
    $('<a href="javascript:void(0)" onclick="$(\'.checkbox_list input[type=checkbox]\',this.parent).attr(\'checked\',true)">Todos</a> | <a href="javascript:void(0)" onclick="$(\'.checkbox_list input[type=checkbox]\',this.parent).attr(\'checked\',false)">Nenhum</a>').insertBefore('ul.checkbox_list');
    //sort list
    $(".processos ul.checkbox_list").sortable({ axis: 'y' }).attr('title','Clique e arraste para ordenar os campos');
    $(".processos ul.checkbox_list").hover(function(){
        $(this).addClass('can-drag');
    },function(){
        $(this).removeClass('can-drag');
    });
</script>