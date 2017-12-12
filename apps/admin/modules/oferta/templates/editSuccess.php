<?php use_helper('I18N', 'Date') ?>
<?php include_partial('oferta/assets') ?>
<div id="sf_admin_container">


    <h1><?php echo __('Edit Oferta', array(), 'messages') ?></h1>

    <?php include_partial('oferta/flashes') ?>

    <div id="sf_admin_header">
        <ul class="sf_admin_actions">
            <li class="sf_admin_action_list"><a href="<?php echo url_for('oferta/index') ?>">Voltar para lista</a></li>
            <li class="sf_admin_action_new"><a href="<?php echo url_for('oferta/new') ?>">Adicionar outra oferta</a></li>
        </ul>
        <?php include_partial('oferta/form_header', array('tboferta' => $tboferta, 'form' => $form, 'configuration' => $configuration)) ?>
    </div>

    <div id="sf_admin_content">

        <?php include_partial('oferta/form', array('tboferta' => $tboferta, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>

        <?php include_partial('oferta/horario_edit', array('horarios' => $tboferta->getTbofertahorarios(), 'tboferta' => $tboferta, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>

    </div>

    <div id="sf_admin_footer">
        <?php include_partial('oferta/form_footer', array('tboferta' => $tboferta, 'form' => $form, 'configuration' => $configuration)) ?>
    </div>
</div>
