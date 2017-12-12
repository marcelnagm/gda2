<?php use_helper('I18N'); ?>
<div class="authform">
    <div class="art-Block">
        <div class="art-Block-body">
            <div class="art-BlockHeader">
                <div class="l"></div>
                <div class="r"></div>
                <div class="art-header-tag-icon">
                    <div class="t">Recuperação de Senha</div>
                </div>
            </div>
            <div class="art-BlockContent">
                <div class="art-BlockContent-tl"></div>
                <div class="art-BlockContent-tr"></div>
                <div class="art-BlockContent-bl"></div>
                <div class="art-BlockContent-br"></div>
                <div class="art-BlockContent-tc"></div>
                <div class="art-BlockContent-bc"></div>
                <div class="art-BlockContent-cl"></div>
                <div class="art-BlockContent-cr"></div>
                <div class="art-BlockContent-cc"></div>
                <div class="art-BlockContent-body">
                    <div>
                        <form action="<?php echo url_for('senha/AtualizaSenha') ?>" method="post">
                            <?php if (isset($form['_csrf_token']))
                                echo $form['_csrf_token'] ?>
                                <h2 style="text-align: center">Selecione seu nome:</h2>
                                <fieldset id="sf_fieldset_none">
                                    <?php foreach ($form->getFields() as $name => $type): ?>
                                        <div class="<?php echo 'sf_admin_form_row sf_admin_' . strtolower($type) . ' sf_admin_form_field_' . $name ?>">
                                            <?php echo $form[$name]->renderError() ?>
                                            <div>
                                                <div class="content"><?php echo $form[$name]->render() ?></div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </fieldset>
                            <input type="submit" value="Continuar" />
                        </form>
                    </div>
                    <div class="cleared"></div>
                </div>
            </div>
            <div class="cleared"></div>
            <br/>
            <span class="art-button-wrapper">
                <span class="l"> </span>
                <span class="r"> </span>
                <a class="voltar" href="<?php echo url_for('painel/index') ?>">Voltar</a>
            </span>
        </div>
    </div>
</div>