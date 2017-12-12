<h1>Dados Pessoais</h1>
<div>
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
</div>
<br />
<table>
    <tbody>
        <tr>
            <th>Nome:</th>
            <td><?php echo $Tbprofessor->getNome() ?></td>
        </tr>
        <tr>
            <th>Código:</th>
            <td><?php echo $Tbprofessor->getMatriculaProf() ?></td>
        </tr>
        <tr>
            <th>SIAPE:</th>
            <td><?php echo $Tbprofessor->getSiape() ?></td>
        </tr>
        <tr>
            <th>Curso:</th>
            <td><?php echo $Tbprofessor->getTbcurso() ?></td>
        </tr>
        <tr>
            <th>Setor:</th>
            <td><?php echo $Tbprofessor->getTbsetor() ?></td>
        </tr>
        <tr>
            <th>Celular:</th>
            <td><?php echo $Tbprofessor->getCelular() ?></td>
        </tr>
        <tr>
            <th>Telefone residencial:</th>
            <td><?php echo $Tbprofessor->getFoneResidencial() ?></td>
        </tr>
        <tr>
            <th>e-mail:</th>
            <td><?php echo $Tbprofessor->getEmail() ?></td>
        </tr>
    </tbody>
</table>