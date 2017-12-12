<?php use_helper('I18N', 'Date') ?>


<div align="center">
<h2>DEPARTAMENTO DO CURSO DE <?php echo  $professor->getTbcurso()->getDescricao(); ?><br>
    COORDENADOR DO CURSO: <?php echo ucwords(strtolower($professor->getNome()));?>
</h2>
<br/>
<?php include_partial('ofertacoordenador/list_ofertas', array('list' => $list)) ?>
</div>