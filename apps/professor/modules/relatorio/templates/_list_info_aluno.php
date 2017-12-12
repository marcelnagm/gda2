   <p> <?php echo "Aluno:".$aluno->getNome()." Matricula: ".$aluno->getMatricula() ; ?>
        <br>
     <?php echo "Curso:".$aluno->getTbcursoversao()->getDescricao(); ?>
        <br>
     <?php echo "Dt de Ingresso:".$aluno->getDtIngresso('d/m/Y');?>
        <br>

   <h3>
<?php echo "CH Obrigatoria do Curso:" . $aluno->getTbcursoversao()->getChObr(); ?>
        <!--        <br>-->
<?php echo "/CH Obrigatoria Cursada:" . $aluno->getChObrigCursada(); ?>
        <!--        <br>-->
<?php echo "/CH Obrigatoria restante:" . ($aluno->getTbcursoversao()->getChObr() - $aluno->getChObrigCursada()); ?>
    </h3>
    <h3>
<?php echo "CH Eletiva do Curso:" . $aluno->getTbcursoversao()->getChEletiva(); ?>
        <!--        <br>-->
<?php echo "/CH Eletiva Cursada:" . $aluno->getChEletivaCursada(); ?>
        <!--        <br>-->
<?php echo "/CH Eletiva restante:" . ($aluno->getTbcursoversao()->getChEletiva() - $aluno->getChEletivaCursada()); ?>
    </h3>