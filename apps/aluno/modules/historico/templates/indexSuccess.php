<h1>Histórico Escolar</h1>
<div>
    <span class="art-button-wrapper">
        <span class="l"> </span>
        <span class="r"> </span>
        <a class="voltar" href="<?php echo url_for('painel/index') ?>">Voltar</a>
    </span>
    <span class="art-button-wrapper">
        <span class="l"> </span>
        <span class="r"> </span>
        <a class="imprimir" target="_blank" href="<?php echo url_for('historico/imprimir') ?>">Imprimir</a>
    </span>
</div>
<br />
<table>
    <thead>
        <tr>
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
        <?php include_partial('list_tbody',array('historicos' => $historicos))?>
    </tbody>
</table>
Data: <?php echo date('d/m/Y H:i')?>
