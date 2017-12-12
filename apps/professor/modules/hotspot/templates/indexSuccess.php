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
<h1>Autorização de acesso à internet</h1>

<h4>O siape <?php echo $usuario->getSiape() ?> não tem autorização para autenticação na rede.</h4>

Leia atentamente a declaração para ativação do acesso à internet:

<pre>
Eu, <b><?php echo $usuario->getNome() ?></b>, quero ativar o acesso à internet com meu
siape, <b><?php echo $usuario->getSiape() ?></b>, e me comprometo a:

* Usar a rede de acordo com o que estabelece a <a href="http://www.cecomp.ufrr.br/docs/Resolucao_CUni_001-2009.pdf"><b>Resolução CUNI 001-2009</b></a>
e as <a href="http://www.cecomp.ufrr.br/docs/rnp.pdf"><b>Políticas de Uso da RNP</b></a>;

* Não revelar minha senha de acesso a ninguém e tomar o máximo de
cuidado para que ela permaneça somente de meu conhecimento;

* Não acessar sites pornográficos ou de compartilhamento de arquivos
protegidos por direitos autorais;

* Não utilizar a Internet para manifestações de difamação, racismo
ou qualquer tipo de preconceito.

</pre>

<div>
    Aviso: Todos os acessos serão registrados para auditoria. O usu&aacute;rio terá o
acesso à internet suspenso por 7 dias se houver acessos que contrariem
esta declaração. O acesso será permanentemente suspenso no caso
de reincidência.
</div>
<br/>
<form action="<?php echo url_for('hotspot/index') ?>" method="POST">
    <?php echo $form; ?>
    <br /><br />
    <input type="submit" value="Ativar acesso" />
</form>
