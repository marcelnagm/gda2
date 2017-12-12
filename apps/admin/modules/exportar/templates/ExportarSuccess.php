<?php
use_stylesheet('/sfPropelPlugin/css/default.css');
use_stylesheet('/sfPropelPlugin/css/global.css');
?>
<div class="botoes">
<a class="imprimir" href="javascript: window.print()">Imprimir</a>
</div>
<?php  include_partial('exportar/list_fields',array('list' => $list, 'show_fields' => $show_fields))?>
