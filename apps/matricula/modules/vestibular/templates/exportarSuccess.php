<?php
use_stylesheet('/sfPropelPlugin/css/default.css');
use_stylesheet('/sfPropelPlugin/css/global.css');
$aluno = new Tbaluno();
?>
<div class="botoes">
<a class="imprimir" href="javascript: window.print()">Imprimir</a>
</div>
<?php  include_partial('aluno/list_fields',array('list' => $list, 'show_fields' => $show_fields))?>
