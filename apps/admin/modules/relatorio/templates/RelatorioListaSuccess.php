<?php use_helper('I18N') ?>
<h1><?php echo $form->getTitulo() ?></h1>
<div class="info">

    <?php if(isset($ano)) : ?>
    <p>Ano: <?php echo $ano ?></p>
    <?php endif ?>

    <?php if(isset($semestre)) : ?>
    <p>Semestre: <?php echo $semestre ?></p>
    <?php endif ?>

    <?php if(isset($periodo)) : ?>
    <p>Período: <?php echo $periodo ?></p>
    <?php endif ?>
    
    <?php if(isset($periodos)) : ?>
    <p>
        <?php echo (count($periodos) > 1) ? 'Períodos': 'Período' ?>:
        <?php foreach ($periodos as $p): ?>
            <?php echo $p ?><?php echo ( current($periodos)>1 ) ? ', ' :'' ?>
        <?php endforeach ?>
    </p>
    <?php endif ?>

    <?php if(isset($cursos)) : ?>
    <p>
        <?php echo (count($cursos) > 1) ? 'Cursos': 'Curso' ?>:
        <?php foreach ($cursos as $curso): ?>
            <?php echo $curso->getDescricao() ?><?php echo ( current($cursos)>1 ) ? ', ' : '' ?>
        <?php endforeach ?>
    </p>
    <?php endif ?>
    <?php if(isset ($aluno)){ ?> 
    <p> <?php echo "Aluno:".$aluno->getNome()." Matricula: ".$aluno->getMatricula() ; ?>
        <br>
     <?php echo "Curso:".$aluno->getTbcursoversao()->getDescricao(); ?>
        <br>
     <?php echo "Dt de Ingresso:".$aluno->getDtIngresso('d/m/Y');?>
        <br>
    <h3>
        <?php
        $ch_ele_curso = $aluno->getTbcursoversao()->getChEletiva();
        $ch_ele_aluno = $aluno->getChCursada(true);
        ?>
     <?php echo "CH Eletiva do Curso:".$ch_ele_curso;?>
<!--        <br>-->
     <?php echo "/CH Eletiva Cursada:".$ch_ele_aluno;?>
<!--        <br>-->
     <?php echo "/CH Eletiva restante:".($ch_ele_aluno- $ch_ele_curso);?>
</h3>
    <?PHP IF(($ch_ele_curso - $ch_ele_aluno )<=0): ?>
    <div style="background-color: green;color: white; width: 450px;font-size: 14px;">
        Ch. Eletiva Completa
    </div>
    <?PHP else: ?>
    <div style="background-color: red;color: white; width: 450px; font-size: 14px;">
        Ch. Eletiva Incompleta
    </div>
    <?PHP endif; ?>

    <h3>
        <?php
        $ch_obr_curso = $aluno->getTbcursoversao()->getChObr();
        $ch_obr_aluno = $aluno->getChObrigCursada();
        ?>
     <?php echo "CH Obrigatória do Curso:".$ch_obr_curso;?>
<!--        <br>-->
     <?php echo "/CH Obrigatória Cursada:".$ch_obr_aluno;?>
<!--        <br>-->
     <?php echo "/CH Obrigatória restante:".($ch_obr_aluno- $ch_obr_curso);?>
</h3>
    <?PHP IF(($ch_obr_curso - $ch_obr_aluno )<=0): ?>
    <div style="background-color: green;color: white; width: 450px;font-size: 14px;">
        Ch. Obrigatória Completa
    </div>
    <?PHP else: ?>
    <div style="background-color: red;color: white; width: 450px; font-size: 14px;">
        Ch. Obrigatória Incompleta
    </div>
    <?PHP endif; ?>


    <p/>
    <h4>  Lista de Disciplinas a Cursar </h4>
    <?php
    }?>      
</div>

<?php 
if (isset ($list)) {
    include_partial('relatorio/list_fields',array('list' => $list, 'show_fields' => $show_fields,'data_fields' => $data_fields));
} else {
    echo "Curso: " . $idcurso . "<br>";
    foreach ($lista as $sublista) {
        echo "<br><br>Período: " . TbperiodoPeer::retrieveByPK($sublista['id'])->getDescricao() . "<br>";
        include_partial('relatorio/list_fields_rep',array('list' => $sublista['lista']));
    }
}
?>

 <?php if(isset ($aluno)){ ?>
    <p>
    <h4>  Lista de Disciplinas Cursando no semestre <?php echo $periodo->getAno().".".$periodo->getSemestre(); ?></h4>
    <p/>
    <?php
    }?>


<?php if(isset ($list2)) { ?>
<?php  include_partial('relatorio/list_fields',array('list' => $list2, 'show_fields' => $show_fields,'data_fields' => $data_fields))?>
<?php }?>

