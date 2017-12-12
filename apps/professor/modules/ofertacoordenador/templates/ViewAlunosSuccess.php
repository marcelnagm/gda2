<?php use_helper('I18N', 'Date') ?>

<div class="content">
    <h1 align="center">Lista de alunos</h1>
    <br/>
    <div class="info" align="center">
        <table>
            <tr>
                <th align="right">Professores:</th>
                <?php $p1 = $oferta->getTbprofessorRelatedByIdMatriculaProf();?>
                <?php $p2 = $oferta->getTbprofessorRelatedByIdMatriculaProf2();?>
                <td>
                    <span style="white-space: nowrap">
                            <?php if (isset($p1)) echo $p1->getNome() ?>
                    </span>
                    <span style="white-space: nowrap">
                            <?php if (isset($p2)) echo $p2->getNome() ?>
                    </span>
                </td>
            </tr>
            <tr>
                <th align="right">Oferta:</th>
                <td>
                    <?php echo $oferta ?>
                </td>
            </tr>
        </table>
    </div>
</div>
<br/>
<div align="center">
    <table style="border-collapse:collapse;border: black 1px solid;font-size:12px" border="1" bordercolor="#000000">
        <thead>
            <tr>
                <th width="100" align="center">Matrícula</th>
                <th width="300" align="center">Nome</th>
                <th width="200" align="center">Situação</th>
                <th width="100" align="center">Telefone Residencial</th>
                <th width="100" align="center">Telefone Celular</th>
                <th width="150" align="center">e-mail</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($list as $item): ?>
                <tr>
                    <td nowrap align="center"><?php echo $item->getMatricula() ?> </td>
                    <td nowrap><?php echo $item->getTbaluno()->getNome() ?></td>
                    <td nowrap align="center"><?php echo $item->getTbfilasituacao()->getDescricao() ?></td>
                    <td nowrap align="center"><?php echo $item->getTbaluno()->getFoneResidencial() ?></td>
                    <td nowrap align="center"><?php echo $item->getTbaluno()->getCelular() ?></td>
                    <td nowrap align="center"><?php echo $item->getTbaluno()->getEmail() ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>                
</div>