<h1>Dados Pessoais</h1>
<div>
    <span class="art-button-wrapper">
        <span class="l"> </span>
        <span class="r"> </span>
        <a class="voltar" href="<?php echo url_for('painel/index') ?>">Voltar</a>
    </span>
    <span class="art-button-wrapper">
        <span class="l"> </span>
        <span class="r"> </span>
        <a class="alterar-dados" href="<?php echo url_for('dadospessoais/edit') ?>">Alterar</a>
    </span>

    <span class="art-button-wrapper">
        <span class="l"> </span>
        <span class="r"> </span>
        <a class="trocar-senha" href="<?php echo url_for('dadospessoais/alterarSenha') ?>">Trocar senha</a>
    </span>
<!--    <span class="art-button-wrapper">
        <span class="l"> </span>
        <span class="r"> </span>
        <a class="trocar-senha" href="<?php //echo url_for('solicitacoes/index') ?>">Sistemas de solicitações</a>
    </span>-->
</div>
<br />
<table>
    <tbody>
        <tr>
            <th>Nome</th>
            <td><?php echo $aluno->getNome() ?></td>
        </tr>
        <tr>
            <th>Matrícula</th>
            <td><?php echo $aluno->getMatricula() ?></td>
        </tr>
        <tr>
            <th>Curso</th>
            <td><?php echo $aluno->getTbcursoversao() ?></td>
        </tr>
        <tr>
            <th>Celular</th>
            <td><?php echo $aluno->getCelular() ?></td>
        </tr>
        <tr>
            <th>Telefone residencial</th>
            <td><?php echo $aluno->getFoneResidencial() ?></td>
        </tr>
        <tr>
            <th>e-mail</th>
            <td><?php echo $aluno->getEmail() ?></td>
        </tr>
        <?php /*
        <tr>
            <th>C.H. Obrigatória cursada</th>
            <td><?php echo $aluno->getChObrigCursada() ?>h</td>
        </tr>
        <tr>
            <th>C.H. Obrigatória solicitada</th>
            <td><?php echo $aluno->getChObrigSolicitada() ?>h</td>
        </tr>
        <tr>
            <th>C.H. Eletiva cursada</th>
            <td><?php echo $aluno->getChEletivaCursada() ?>h</td>
        </tr>
        <tr>
            <th>C.H. Eletiva solicitada</th>
            <td><?php echo $aluno->getChEletivaSolicitada() ?>h</td>
        </tr>
        */ ?>
        <tr>
            <th>C.H. Total</th>
            <td><?php echo $aluno->getChTotal() ?>h</td>
        </tr>
    </tbody>
</table>