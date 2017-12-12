<?php

use_stylesheet('/css/lista_notas.css');
use_javascript('/js/frm_notas.js');

?>
<h1>Notas</h1>

<?php include_component('turma','info', array( 'Tbturma' => $Tbturma )) ?>

<p>
<span id="status" class="erro semSeta" style="display: block;position:static;width: 300px;margin:0px auto;text-align: center"><span>Sistema de notas indisponível no momento</span></span>
</p>
