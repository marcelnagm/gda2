<?php use_helper('I18N', 'Date') ?>
<html>
    <head>
        <title>Demanda: Alunos com pré-requisito que necessitam cursar a disciplina</title>
        <LINK REL="StyleSheet" HREF="/professor/css/impressao.css" TYPE="text/css">
    </head>
    <body>
        <div align="center">
            <div class="content">
                <h2 align="center">Lista de alunos</h2>
                <br/>
            </div>
        </div>
        <br/>
        <div align="center">
            <table style="border-collapse:collapse;border: black 1px solid;font-size:12px" border="1" bordercolor="#000000">
                <thead>
                    <tr>
                        <th width="100" align="center">Matrícula</th>
                        <th width="300" align="center">Nome</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($alunos as $item): ?>
                        <tr>
                            <td nowrap align="center"><?php echo $item[0]; ?> </td>
                            <td nowrap><?php echo $item[1]; ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </body>
</html>