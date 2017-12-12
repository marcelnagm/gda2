<?php if( $tboferta->getVagas() >= $tboferta->getSolicitacoes() ): ?>
<span style="color:green"><?php echo $tboferta->getSolicitacoes(); ?></span>
<?php else: ?>
<span style="color:red" title="Há mais solicitações do que vagas"><?php echo $tboferta->getSolicitacoes(); ?></span>
<?php endif ?>