<?php use_helper('I18N', 'Date') ?>
<?php include_partial('turma/assets') ?>
<div id="sf_admin_container">


    <h1><?php echo __('Edit Turma', array(), 'messages') ?></h1>

    <?php include_partial('turma/flashes') ?>

    <div id="sf_admin_header">
        <ul class="sf_admin_actions">
            <li class="sf_admin_action_list"><a href="<?php echo url_for('turma/index') ?>">Voltar para lista</a></li>
            <li class="sf_admin_action_new"><a href="<?php echo url_for('turma/new') ?>">Adicionar outra turma</a></li>
        </ul>
        <?php include_partial('turma/form_header', array('tbturma' => $tbturma, 'form' => $form, 'configuration' => $configuration)) ?>
    </div>

    <div id="sf_admin_content">

        <?php include_partial('turma/form', array('tbturma' => $tbturma, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>

        <?php include_partial('turma/alunos_edit', array('tbturma' => $tbturma, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>

    </div>

    <div id="sf_admin_footer">
        <?php include_partial('turma/form_footer', array('tbturma' => $tbturma, 'form' => $form, 'configuration' => $configuration)) ?>
    </div>
</div>
