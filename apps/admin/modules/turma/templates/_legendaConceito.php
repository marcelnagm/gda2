<div align="center">
    <div id="legenda" align="left" class="conceito">
        <b>* Legenda:</b>
        <br>
        <span class="conceito1">1</span> = Aprovado<br />
        <span class="conceito2">2</span> = Reprovado por nota<br />
        <span class="conceito3">3</span> = Reprovado por falta<br />
        <span class="conceito4">4</span> = Aprovado com exame de recuperação<br />
    </div>
    <br>
    Observação: O aluno só tem direito a fazer o Exame de Recuperação se <br>a Média Parcial for maior ou igual a 6 e menor que 7.
</div>
<?php /* if(count($Conceitos)) : ?>
<div align="center">
    <div id="legenda" align="left" class="conceito">
        <b>* Legenda:</b>
        <br>
        <?php foreach ($Conceitos as $conceito) : ?>
        <span class="conceito<?php echo $conceito->getIdConceito() ?>"><?php echo $conceito->getIdConceito() ?></span> = <?php echo $conceito->getDescricao() ?><br />
        <?php endforeach ?>
    </div>
    <br>
    Observação: O aluno só tem direito a fazer o Exame de Recuperação se <br>a Média Parcial for maior ou igual a 6 e menor que 7.
    

</div>
<?php endif */?>
<!--<font size="2" face="tahome">-->
    Professor lembre-se que para nos alunos reprovados por falta ainda
    <br> deve ser preenchido a nota do aluno com 0.
<!--</font>-->