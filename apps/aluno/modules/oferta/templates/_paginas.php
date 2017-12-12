<?php if ($pager->haveToPaginate()): ?>
<div class="pager">
Páginas:

  <?php echo link_to('&laquo;', 'oferta/index?page='.$pager->getFirstPage(), array('title'=>'Primeira p&aacute;gina') ) ?>
  <?php echo link_to('&lt;', 'oferta/index?page='.$pager->getPreviousPage(), array('title'=>'P&aacute;gina anterior') ) ?>
  <?php $links = $pager->getLinks(10); foreach ($links as $page): ?>
    <?php echo ($page == $pager->getPage()) ? '<span class="current">'.$page.'</span>' : link_to($page, 'oferta/index?page='.$page) ?>
  <?php endforeach ?>
  <?php echo link_to('&gt;', 'oferta/index?page='.$pager->getNextPage(), array('title'=>'Pr&oacute;xima p&aacute;gina') ) ?>
  <?php echo link_to('&raquo;', 'oferta/index?page='.$pager->getLastPage(), array('title'=>'&Uacute;ltima p&aacute;gina') ) ?>

</div>
<?php endif ?>
