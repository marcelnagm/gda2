<h1>Autorização de acesso à internet</h1>
<h4>O acesso à internet com a matrícula <?php echo $usuario->getMatricula() ?> está autorizado.</h4>
Estes são seus dados para se autenticar na rede:
<ul>
    <li><b>Usu&aacute;rio:</b> <?php echo $usuario->getMatricula() ?></li>
    <li><b>Senha:</b> É a mesma cadastrada para entrar no sistema do DERCA</li>
</ul>
<br />
<span class="art-button-wrapper">
    <span class="l"> </span>
    <span class="r"> </span>
    <a class="sair" href="<?php echo url_for('hotspot/cancelar') ?>">Cancelar acesso</a>
</span>

<?php if(preg_match('/^200\.139\.16\.20$/', $_SERVER['REMOTE_ADDR'] )) : ?>
<span class="art-button-wrapper">
    <span class="l"> </span>
    <span class="r"> </span>
    <a class="foldertable-small"  href="http://hotspot.ufrr.br">Abrir formulário de acesso</a>
</span>
<?php endif; ?>
