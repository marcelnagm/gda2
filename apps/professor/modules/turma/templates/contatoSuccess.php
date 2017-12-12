<?php use_helper('I18N', 'Date') ?>
<html>
    <head>
        <title>Dados para contato</title>
        <LINK REL="StyleSheet" HREF="/professor/css/impressao.css" TYPE="text/css">
    </head>
    <body>
        <div align="center">
            <div class="content">
                <h2 align="center">Lista de alunos</h2>
                <br/>
                <?php include_partial('turma/info', array('tbturma' => $tbturma)) ?>
            </div>
        </div>
        <br/>
        <div align="center">
            <table style="border-collapse:collapse;border: black 1px solid;font-size:12px" border="1" bordercolor="#000000">
                <thead>
                    <tr>
                        <th width="100" align="center">Matrícula</th>
                        <th width="300" align="center">Nome</th>
                        <th width="100" align="center">Telefone Residencial</th>
                        <th width="100" align="center">Telefone Celular</th>
                        <th width="150" align="center">e-mail</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($tbturmaAlunos as $item): ?>
                        <tr>
                            <td nowrap align="center"><?php echo $item->getTbaluno()->getMatricula() ?> </td>
                            <td nowrap><?php echo $item->getTbaluno()->getNome() ?></td>
                            <td nowrap align="center"><?php echo $item->getTbaluno()->getFoneResidencial() ?></td>
                            <td nowrap align="center"><?php echo $item->getTbaluno()->getCelular() ?></td>
                            <td nowrap align="center"><?php echo $item->getTbaluno()->getEmail() ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </body>
</html>