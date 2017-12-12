<?php
use_helper('I18N');
?>
<h3>Selecione o tipo de arquivo e pressione 'Continuar'</h3>
<form action="<?php echo url_for1('loadfile/ListParsing')?>" method="POST">
    <input type="hidden" name="id" value="<?php echo $sf_request->getParameter('id') ?>">
    Selecione o tipo de arquivo:<br>
    <select name="tipo">
        <option value="0">Lista de Aprovados: Vestibular</option>
        <option value="8">Lista de Aprovados: ENEM SISU</option>
        <option value="3">Lista de Aprovados: Graduados e Tranferência</option>
        <option value="2">Lista de Espera: Vestibular</option>
        <option value="4">Lista de Espera: ENEM SISU</option>
        <option value="1">Lista de Disciplinas Eletivas</option>
        <option value="5">Lista de Grades Curriculares</option>
        <option value="6">Lista de Pré-requisitos de Disciplinas</option>
        <option value="7">Lista de Aprovados UAB</option>
        <option value="9">Corrige CPV</option>
        <option value="10">Dados do Censo</option>
        <option value="11">Aproveitamento de Disciplinas</option>
        <option value="12">Ofertas</option>
<!--        <option value="2">soonho[lm1]</option>
        <option value="3">soonho[lm2]</option>-->
    </select>
    <input type="submit" value="Continuar">
</form>
<?php if(isset ($arr))  echo var_dump($arr);?>