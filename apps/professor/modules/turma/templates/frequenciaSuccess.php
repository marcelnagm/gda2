<?php

#use_stylesheet('/css/impressao.css');

$professor = $sf_user->getAttribute('professor');

$colunas = 12;

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <title>Frequência</title>
        <LINK REL="StyleSheet" HREF="/professor/css/impressao.css" TYPE="text/css">
    </head>
    <body>
        <div align="center" style="margin:3px">
            <table border=0 width=735 cellpadding=17 cellspacing=1 bgcolor="#FFFFFF"><tr><td align=center valign=middle>

                        <div align="center">
                            <div class="content">
                                <h1>Universidade Federal de Roraima</h1>
                                <h1>Departamento de Registro e Controle Acadêmico - DERCA</h1>
                                <h1>Lista de Frequência</h1>
                                <br>

                                <?php include_partial('turma/info', array('tbturma' => $tbturma, 'configuration' => $configuration, 'helper' => $helper)) ?>

                            </div>


                            <br>
                            <div class="content" align="center" style="padding-left:1px;padding-right:1px">

                                <!-- início da lista -->

                                <style>
                                    .caixa{width:22px;height:22px}
                                </style>


                                <h3>Mês:_______________________</h3>
                                <br>


                                <table style="border-collapse:collapse;border: black 1px solid;font-size:12px" border="1" bordercolor="#000000">
                                    <thead>
                                        <tr>
                                            <th rowspan="2" width="50">Matrícula</th><th rowspan="2" width="250">Nome</th><th colspan="<?php echo $colunas ?>">Dias</th>
                                        </tr>
                                        <tr>
                                            <?php for ( $i=0; $i < $colunas; $i++) : ?>
                                            <th class="caixa" style="height:27px"></th>
                                            <?php endfor ?>
                                        </tr>
                                    </thead>
                                    <tbody>


                                        <?php foreach ($tbturmaAlunos as $tbturmaAluno): ?>

                                        <tr>
                                            <td nowrap><?php echo $tbturmaAluno->getMatricula() ?> </td><td nowrap><?php echo $tbturmaAluno->getTbAluno()->getNome() ?></td>

                                                <?php for ($i=0; $i < $colunas ; $i++) : ?>
                                            <td class="caixa"></td>
                                                <?php endfor ?>
                                        </tr>

                                        <?php endforeach ?>

                                    </tbody>
                                </table>
                                <br>

                                <!-- fim lista -->
                                <div class="aviso" style="text-align:left">
                                    <font size=2><b>Prezado Professor(a), contribua com a melhoria dos serviços da PROEG/DERCA, não inclua nomes de alunos nesta lista e tampouco permita que alunos com o nome fora da mesma façam qualquer tipo de avaliação.</b></font>
                                </div>

                            </div>
                        </div>
                        <br>
                        <br>

                        <div align="center">
                            <div id="assinatura">
                                Assinatura do(a) professor(a)
                            </div>
                        </div>
                        <br>
                    </td></tr>
            </table>

    </body>
</html>
