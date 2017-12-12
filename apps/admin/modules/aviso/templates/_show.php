<?php if(count($avisos)): ?>
    <?php foreach ($avisos as $aviso): ?>
        <h2><?php echo $aviso->getTitulo(); ?></h2>
        <div><?php echo htmlspecialchars_decode($aviso->getTexto()); ?></div>
    <?php endforeach ?>
<?php endif ?>