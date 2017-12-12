<?php if( $tbfila->getIdSituacao() == 1 ): ?>
<span style="color:green; font-weight: bold"><?php echo $tbfila->getTbfilasituacao() ?></span>
<?php else: ?>
<span title="<?php echo $tbfila->getTbfilasituacao()->getDescricao() ?>"><?php echo $tbfila->getTbfilasituacao() ?></span>
<?php endif ?>