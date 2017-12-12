<?php
$dias_semana = sfConfig::get('app_dias_semana');
unset($dias_semana[7]);

$Tbofertas = $pager->getResults();
//include_stylesheets();
?>

<div>
    <span class="art-button-wrapper">
        <span class="l"> </span>
        <span class="r"> </span>
        <a class="voltar" href="<?php echo url_for('painel/index') ?>">Voltar</a>
    </span>
</div>


<div>
<h3 style="text-align: center">
UNIVERSIDADE FEDERAL DE RORAIMA<br/>
PRÓ-REITORIA DE ENSINO E GRADUAÇÃO<br/>
DEPARTAMENTO DE REGISTRO E CONTROLE ACADÊMICO - DERCA<br/>
OFERTA DE DISCIPLINAS DO SEMESTRE <?php echo $periodo->getAno().'.'.$periodo->getSemestre(); ?>  </h3>
</div>

<div style="text-align: center">
   <?php include_partial('form_filtro',array('form' => $form, 'sf_user' => $sf_user))?>
</div>

<br />

<?php if (count($Tbofertas) == 0): ?>
<div>Nenhuma oferta encontrada.</div>
<?php else: ?>

<?php echo $pager->getNbResults() ?> registros encontrados. Mostrando <?php echo $pager->getFirstIndice() ?> até  <?php echo $pager->getLastIndice() ?>.

<?php include_partial('paginas',array('pager' => $pager))?>

<table>
    <thead>
        <tr style="border: 1px solid gray;" bgcolor="#dddddd">
<!--            <th>Período</th>-->
            <?php if ($fila_allow) echo '<th>Fila Eletrônica</th>'; ?>
            <th>Cód. D.</th>
            <th>Turma</th>
            <th>Descrição</th>
            <th>Sala</th>      
            <th>CH</th>      
            <th>Professor</th>
            <th>Pólo</th>
            <?php foreach($dias_semana as $dia): ?>
            <th style="white-space: nowrap ;text-align: center">
              <?php echo $dia;?>
            </th>
        <?php endforeach; ?>
            <th title="Solicitações / Vagas" >S./V.</th>
            <th title="Vagas Remanescentes/ Vagas - Aceitos" >Vagas</th>
        </tr>
    </thead>
    <tbody>
        <?php include_partial('list_tbody',array('Tbofertas' => $Tbofertas, 'dias_semana' => $dias_semana, 'fila_allow' => $fila_allow))?>
    </tbody>
</table>

            <?php include_partial('paginas',array('pager' => $pager))?>

<?php endif; ?>
