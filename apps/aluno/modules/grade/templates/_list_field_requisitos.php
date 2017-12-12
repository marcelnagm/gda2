<?php use_helper('I18N'); ?>
<?php //$value = new Tbcurriculodisciplinas();?>
<?php //$aluno =new Tbaluno();?>
<?php //$aluno = sfContext::getInstance()->getUser()->getAttribute('aluno');?>
<?php foreach (TbdisciplinarequisitosPeer::getRequisitos($aluno, $value->getTbdisciplina()) as $requisitos):?>
<?php echo $requisitos;?>
<br>
<?php endforeach ;?>