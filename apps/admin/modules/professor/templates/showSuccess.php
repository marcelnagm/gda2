<?php use_helper('I18N', 'Date') ?>
<?php include_partial('professor/assets') ?>

<div id="sf_admin_container">
    <h1>Professor</h1>

  <?php include_partial('professor/show_actions',array('object'=>$tbprofessor, 'helper'=> $helper)) ?>

    <table>
        <tr>
            <th>SIAPE</th>
            <td><?php echo $tbprofessor->getSiape() ?></td>
        </tr>
        <tr>
            <th>Nome</th>
            <td><?php echo $tbprofessor->getNome() ?></td>
        </tr>
        <tr>
            <th>Celular</th>
            <td><?php echo $tbprofessor->getCelular() ?></td>
        </tr>
        <tr>
            <th>Tel. Residencial</th>
            <td><?php echo $tbprofessor->getFoneResidencial() ?></td>
        </tr>
        <tr>
            <th>e-mail</th>
            <td><?php echo $tbprofessor->getEmail() ?></td>
        </tr>
        <tr>
            <th>Necessidade Especial</th>
            <td><?php echo $tbprofessor->getTbnecesespecial() ?></td>
        </tr>
        <tr>
            <th>Curso</th>
            <td><?php echo $tbprofessor->getTbcurso() ?></td>
        </tr>
        <tr>
            <th>Tipo de Vínculo</th>
            <td><?php echo $tbprofessor->getTbproftipovinculo() ?></td>
        </tr>
        <tr>
            <th>Formação</th>
            <td><?php echo $tbprofessor->getTbformacao() ?></td>
        </tr>
        <tr>
            <th>Situação</th>
            <td><?php echo $tbprofessor->getTbprofessorsituacao() ?></td>
        </tr>
        <tr>
            <th>Setor</th>
            <td><?php echo $tbprofessor->getTbsetor() ?></td>
        </tr>
    </table>

</div>