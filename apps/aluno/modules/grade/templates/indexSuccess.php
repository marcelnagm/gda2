<h1>Grade do curso</h1>
<div>
    <span class="art-button-wrapper">
        <span class="l"> </span>
        <span class="r"> </span>
        <a class="voltar" href="<?php echo url_for('painel/index') ?>">Voltar</a>
    </span>
    <span class="art-button-wrapper">
        <span class="l"> </span>
        <span class="r"> </span>
        <a class="imprimir" target="_blank" href="<?php echo url_for('grade/imprimir') ?>">Imprimir</a>
    </span>
    <span class="art-button-wrapper">
        <span class="l"> </span>
        <span class="r"> </span>
        <a class="restante" href="<?php echo url_for('grade/ACursar') ?>">A cursar</a>
    </span>
</div>
<br />
<?php include_partial('info',array('tbcursoversao'=>$tbcursoversao,'aluno' => $aluno)) ?>
<br />
<table>
    <thead>
        <tr>
            <th>Disciplina</th>
            <th>C.H.</th>
            <th>Caráter</th>
            <th>Requisitos</th>
            <th>Cursada?</th>
        </tr>
    </thead>
    <tbody>
        <?php $semestre = null; ?>
        <?php foreach ($Tbcurriculodisciplinass as $Tbcurriculodisciplinas): ?>
            <?php if($semestre != $Tbcurriculodisciplinas->getSemestreDisciplina()): ?>
        <tr>
            <td colspan="5" style="background: #F5F5FF;font-weight: bold">
                <a href="<?php echo url_for2('default',
                        array('module' => 'oferta', 'action' => 'index', 'semestre' => $Tbcurriculodisciplinas->getSemestreDisciplina())); ?>">
                    <?php echo $Tbcurriculodisciplinas->getSemestreDisciplina() ?>o. Semestre
                </a>
            </td>
        </tr>
            <?php endif; ?>
        <tr>
            <td><a href="<?php echo url_for2('default', 
                    array('module' => 'oferta', 'action' => 'index', 'cod_disc' => $Tbcurriculodisciplinas->getCodDisciplina())); ?>">
                    <?php echo $Tbcurriculodisciplinas->getTbdisciplina() ?>
                </a>
            </td>
            <td class="centro"><?php echo $Tbcurriculodisciplinas->getTbdisciplina()->getCh() ?></td>
            <td class="centro"><?php echo $Tbcurriculodisciplinas->getTbcarater() ?></td>            
            <td class="centro">
                    <?php echo get_partial('list_field_requisitos', array(
                    'value' =>$Tbcurriculodisciplinas,'aluno' =>$aluno)
                    ) ?>
            </td>
            <td class="centro">
                    <?php echo get_partial('list_field_boolean', array(
                    'value' => in_array($Tbcurriculodisciplinas->getCodDisciplina(),$sf_data->getRaw('aluno_disciplinas_cursadas'))
                    )) ?>
            </td>
        </tr>
            <?php $semestre = $Tbcurriculodisciplinas->getSemestreDisciplina(); ?>
        <?php endforeach; ?>
    </tbody>
</table>
