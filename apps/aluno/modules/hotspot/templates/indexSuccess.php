<style type="text/css" media="all">
    input {
        display: block;
    }
    input[type=checkbox] {
        float: left;
    }
    .error_list {
        float: left;
    }
    label {
        line-height: 2em;
    }
</style>
<h1>Autoriza&ccedil;&atilde;o de acesso &agrave; internet</h1>

<h4>A matr&iacute;cula <?php echo $usuario->getMatricula() ?> n&atilde;o tem autoriza&ccedil;&atilde;o para autentica&ccedil;&atilde;o na rede.</h4>

Leia atentamente a declara&ccedil;&atilde;o para ativa&ccedil;&atilde;o do acesso &agrave; internet:

<pre>
Eu, <b><?php echo $usuario->getNome() ?></b>, quero ativar o acesso &agrave; internet com minha
matr&iacute;cula, <b><?php echo $usuario->getMatricula() ?></b>, e me comprometo a:

* Usar a rede de acordo com o que estabelece a <a href="http://www.cecomp.ufrr.br/docs/Resolucao_CUni_001-2009.pdf"><b>Resolu&ccedil;&atilde;o CUNI 001-2009</b></a>
e as <a href="http://www.cecomp.ufrr.br/docs/rnp.pdf"><b>Pol&iacute;ticas de Uso da RNP</b></a>;

* N&atilde;o revelar minha senha de acesso a ningu&eacute;m e tomar o m&aacute;ximo de
cuidado para que ela permane&ccedil;a somente de meu conhecimento;

* N&atilde;o acessar sites pornogr&aacute;ficos ou de compartilhamento de arquivos
protegidos por direitos autorais;

* N&atilde;o utilizar a Internet para manifesta&ccedil;&otilde;es de difama&ccedil;&atilde;o, racismo
ou qualquer tipo de preconceito.

</pre>

<div>
    Aviso: Todos os acessos ser&atilde;o registrados para auditoria. O usu&aacute;rio ter&aacute; o
acesso &agrave; internet suspenso por 7 dias se houver acessos que contrariem
esta declara&ccedil;&atilde;o. O acesso ser&aacute; permanentemente suspenso no caso
de reincid&ecirc;ncia.
</div>
<br/>
<form action="<?php echo url_for('hotspot/index') ?>" method="POST">
    <?php echo $form; ?>
    <br /><br />
    <input type="submit" value="Ativar acesso" />
</form>
