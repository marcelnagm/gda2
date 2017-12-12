<?php use_helper('I18N') ?>
<h1><?php echo $form->getTitulo() ?></h1>
<?php foreach($array as $item) :
    $periodo = $item['periodo'];
    $aluno = $item['aluno'];
    $show_fields = $item['show_fields'];
    $data_fields = $item['data_fields'];
    $list = $item['list'];
    $list2 = $item['list2'];
?>
    <div class="info">
        <?php if(isset ($aluno)) { ?>
            <p><?php
                echo "Matricula: ".$aluno->getMatricula() . 
                        "<br>Aluno: ".$aluno->getNome().
                        "<br>Curso: ".$aluno->getTbcursoversao()->getDescricao() .
                        "<br>Situação: ".$aluno->getTbalunosituacao();
                $ch_ele_curso = $aluno->getTbcursoversao()->getChEletiva();
                $ch_ele_aluno = $aluno->getChCursada(true);
                ?>
            </p>
            <?PHP IF(($ch_ele_curso - $ch_ele_aluno )<=0): ?>
                <div style="background-color: green;color: white; width: 450px;font-size: 14px;">
                    Ch. Eletiva Completa (<?php echo $ch_ele_aluno . "/" . $ch_ele_curso ?>)
                </div>
            <?PHP else: ?>
                <div style="background-color: red;color: white; width: 450px; font-size: 14px;">
                    Ch. Eletiva Incompleta (<?php echo $ch_ele_aluno . "/" . $ch_ele_curso ?>)
                </div>
            <?PHP endif;
            echo "<br>";
            $ch_obr_curso = $aluno->getTbcursoversao()->getChObr();
            $ch_obr_aluno = $aluno->getChObrigCursada();
            IF(($ch_obr_curso - $ch_obr_aluno )<=0): ?>
                <div style="background-color: green;color: white; width: 450px;font-size: 14px;">
                    Ch. Obrigatória Completa (<?php echo $ch_obr_aluno . "/" . $ch_obr_curso ?>)
                </div>
            <?PHP else: ?>
                <div style="background-color: red;color: white; width: 450px; font-size: 14px;">
                    Ch. Obrigatória Incompleta (<?php echo $ch_obr_aluno . "/" . $ch_obr_curso ?>)
                </div>
            <?PHP endif;
            echo "<br>";
        }?>
    </div>
    <?php
    if (isset($list)) {
        echo ("Lista de Disciplinas a Cursar:");
        include_partial('relatorio/list_fields', array('list' => $list, 'show_fields' => $show_fields, 'data_fields' => $data_fields));
    }

    if (isset($list2)) {
        echo "<br>Cursando no semestre " . $periodo->getAno() . "." . $periodo->getSemestre();
        include_partial('relatorio/list_fields', array('list' => $list2, 'show_fields' => $show_fields, 'data_fields' => $data_fields));
    } ?>
    <hr size="10px" style="color: black">
<?php endforeach; ?>