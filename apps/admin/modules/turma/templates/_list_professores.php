<?php foreach($tbturma->getTbturmaProfessors() as $turmaProfessor) : ?>
<span style="margin-bottom: 5px;display: block">
        <a class="icone-pequeno user-small" href="<?php echo url_for('professor/show?matricula_prof='.$turmaProfessor->getMatriculaProf()) ?>">
                <?php echo $turmaProfessor ?>
        </a>
</span>
<?php endforeach ?>