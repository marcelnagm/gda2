<b>Legenda:</b>
<?php foreach ($conceitos as $conceito): ?>
    <?php echo $conceito->getSucinto() ?> = <?php echo $conceito->getDescricao() ?>;
<?php endforeach ?>