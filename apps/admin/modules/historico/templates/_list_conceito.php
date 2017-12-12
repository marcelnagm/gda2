<?php if($tbhistorico->getTbconceito()!=null): ?>
<span title="<?php echo $tbhistorico->getTbconceito()->getDescricao() ?>" class="conceito<?php echo $tbhistorico->getIdConceito() ?>">
<?php echo $tbhistorico->getTbconceito()->getSucinto() ?>
</span>
<?php endif ?>