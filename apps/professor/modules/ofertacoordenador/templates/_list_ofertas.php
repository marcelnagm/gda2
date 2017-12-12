<style type="text/css">
.center_head th {
    font: bold;
    text-align: center;
    background-color: #bfbfbf;
}

.center_head td {
    text-align: center;
}
</style>

<div id="sf_admin_container">
    <h2 align="center"><?php echo 'Lista de Ofertas' ?></h2>
    <div id="sf_admin_content">
        <table align="center" rules="all" border="1">
            <thead>
        <tr class="center_head">
<!--            <th>ID</th>-->
            <th>Período</th>
            <th>Disciplina</th>
            <th>Turma</th>
            <th>Descrição </th>
            <th>Horários</th>
            <th>Duração</th>
            <th>Vagas</th>
            <th>Matriculados</th>
            <th>Solicitações</th>
            <th>Professor(es)</th>
            <th>Sala</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($list as $oferta): ?>
        <tr class="center_head sf_admin_row">
            <?php include_partial('ofertacoordenador/list_td_relatorio', array('tboferta' => $oferta)) ?>
        </tr>
        <?php endforeach; ?>
        </tbody>
</table>

    </div>
</div>