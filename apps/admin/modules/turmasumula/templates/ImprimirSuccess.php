<?php

#use_stylesheet('/css/impressao.css');



use_helper('Date');

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <title>Súmula</title>
        <LINK REL="StyleSheet" HREF="/professor/css/impressao.css" TYPE="text/css">
    </head>
    <body>
        <div align="center" style="margin:3px">


            <table border=0 width=735 cellpadding=17 cellspacing=1 bgcolor="#FFFFFF"><tr><td align=center valign=middle>

                        <div align="center">
                            <div class="content">
                                <h1>Universidade Federal de Roraima</h1>
                                <h1>Departamento de Registro e Controle Acadêmico - DERCA</h1>
                                <h1>Súmula</h1>                                
                                <?php include_component('turma','info',array('id_turma'=>$sf_request->getParameter('id_sumula')) ); ?>
                            </div>


                            <br>
                            <div class="content" align="center" style="padding-left:1px;padding-right:1px">

                                <?php if(count($TbturmaSumulas)) : ?>

                                <table id="tbsumula"  style="border-collapse:collapse;border: black 1px solid;font-size:12px" border="1" bordercolor="#000000">
                                    <thead>
                                        <tr>
                                            <th>Data</th>
                                            <th width="82%">Descrição</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <?php foreach ($TbturmaSumulas as $TbturmaSumula): ?>
                                        <tr>
                                            <td><?php echo format_date($TbturmaSumula->getData(),'dd/MM/yyyy') ?></td>
                                            <td><?php echo htmlspecialchars_decode($TbturmaSumula->getDescricao()); ?></td>
                                        </tr>
                                            <?php endforeach; ?>
                                    </tbody>

                                </table>
                                <?php else: ?>
                                Nenhum registro
                                <?php endif ?>

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
