<?php use_helper('I18N'); ?>
<div class="authform signin">
    <div class="art-Block">
        <div class="art-Block-body">
            <div class="art-BlockHeader">
                <div class="l"></div>
                <div class="r"></div>
                <div class="art-header-tag-icon">
                    <div class="t"><?php echo __('Authentication' , null) ?></div>
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
                        <form action="<?php echo url_for('@auth_signin') ?>" method="post">
                            <table align="center">
                                <?php echo $form ?>
                            </table>
                            <input type="submit" value="<?php echo __('sign in' , null) ?>" />
                        </form>
                    </div>
                    <div class="cleared"></div>
                </div>
            </div>
            <div class="cleared"></div>
        </div>
    </div>
    <span class="art-button-wrapper">
        <span class="l"> </span>
        <span class="r"> </span>
        <a class="trocar-senha" href="<?php echo url_for('@auth_cadastroSenha') ?>">Cadastre sua senha aqui</a>
    </span>
    <br>
    <span class="art-button-wrapper">
        <span class="l"> </span>
        <span class="r"> </span>
        <a style="background-image: url('../../images/icons/configuracao-small.png');" href="<?php echo url_for('senha/recuperaSenha') ?>">Esqueci minha senha</a>
    </span>
</div>

<div id="avisos">
    <?php include_component('aviso', 'show',array('local'=>'aluno-signin')) ?>
</div>

