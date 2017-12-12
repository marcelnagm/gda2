<div class="principal">
    <div class="cabecalho">
        <h3>UNIVERSIDADE FEDERAL DE RORAIMA</h3>
        <h3>PRÓ-REITORIA DE ENSINO E GRADUAÇÃO</h3>
        <h3>DEPARTAMENTO DE REGISTRO E CONTROLE ACADÊMICO - DERCA</h3>
        <h3>HISTÓRICO ESCOLAR</h3>
        <?php include_component('dadospessoais','info',array('aluno'=>$aluno))  ?>
    </div>
    <table class="lista" border=1 cellpadding=2 style="border-collapse:collapse">

        <thead>
            <tr bgcolor="#DDDDDD">
                <th>Período</th>
                <th>Disciplina</th>
                <th>Caráter</th>
                <th>C.H.</th>
                <th>Faltas</th>
                <th>Média</th>
                <th>Conceito</th>
            </tr>
        </thead>
        <tbody>
            <?php include_partial('list_tbody_imprimir',array('historicos' => $historicos))?>
        </tbody>
    </table>
    <div class="legenda">
        Data: <?php echo date("d/m/Y H\hi")?>

        <p>Obs:. Este documento deve estar assinado por um funcionário do DERCA para ter validade.</p>
        <?php include_component('historico', 'legenda', array()) ?>
    </div>

</div>
</body>
</html>
