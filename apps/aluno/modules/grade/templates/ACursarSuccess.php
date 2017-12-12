<h1>Lista de Disciplinas a Cursar</h1>
<br />
<h4>Estas são disciplinas da sua grade curricular que você necessita cursar para se formar.</h4>
<?php include_partial('info',array('tbcursoversao'=>$tbcursoversao,'aluno' => $aluno)) ?>
<br />
<table>
    <thead>
        <tr>
            <th>Disciplina</th>
            <th>C.H.</th>
            <th>Caráter</th>
            <th>Requisitos</th>            
        </tr>
    </thead>
    <tbody>
        <?php $semestre = null; ?>
        <?php foreach ($Tbcurriculodisciplinass as $Tbcurriculodisciplinas): ?>
            <?php if($semestre != $Tbcurriculodisciplinas->getSemestreDisciplina()): ?>
        <tr>
            <td colspan="5" style="background: #F5F5FF;font-weight: bold">
                        <?php echo $Tbcurriculodisciplinas->getSemestreDisciplina() ?>o. Semestre
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
           </tr>
            <?php $semestre = $Tbcurriculodisciplinas->getSemestreDisciplina(); ?>
        <?php endforeach; ?>
    </tbody>
</table>
