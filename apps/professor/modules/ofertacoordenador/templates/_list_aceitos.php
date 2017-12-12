<?php if( $tboferta->getVagas() >= $tboferta->getSolicitacoesAceitas() ): ?>
<span style="color:green"><?php echo $tboferta->getSolicitacoesAceitas(); ?></span>
<?php else: ?>
<span style="color:red" title="Há mais solicitações do que vagas"><?php echo $tboferta->getSolicitacoesAceitas(); ?></span>
<?php endif ?>