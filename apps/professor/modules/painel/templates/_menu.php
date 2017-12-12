<div class="art-Block-body">
    <div class="art-BlockHeader">
        <div class="l"></div>
        <div class="r"></div>
        <div class="art-header-tag-icon">
            <div class="t">Menu</div>
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

            <a class="dados-pessoais" href="<?php echo url_for('dadospessoais/index') ?>">Dados Pessoais</a>
            <a class="turma" href="<?php echo url_for('turma/index') ?>">Lista de turmas</a>
            <a class="sair" href="<?php echo url_for('@auth_signout') ?>">Sair</a>

            <div class="cleared"></div>
        </div>
    </div>
    <div class="cleared"></div>
</div>