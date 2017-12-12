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
                        <form action="<?php echo url_for('senha/recuperacaoCPF') ?>" method="post">

                            <table align="center">
                                    <?php echo $form ?>
                            </table>
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