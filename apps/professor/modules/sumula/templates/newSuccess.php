<h1>Súmula</h1>
<?php include_component('turma','info',array('id'=>$sf_request->getParameter('id'))) ?>
<br/>
<?php include_partial('form', array('form' => $form, 'TbturmaSumula' => $TbturmaSumula)) ?>
