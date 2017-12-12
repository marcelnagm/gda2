<?php
use_stylesheet('/sfPropelPlugin/css/default.css');
use_stylesheet('/sfPropelPlugin/css/global.css');
$aluno = new Tbaluno();
?>
<div class="botoes">
    <a class="imprimir" href="javascript: window.print()">Imprimir</a>
</div>
<!--include_partial('aluno/list_fields',array('list' => $list, 'show_fields' => $show_fields))-->
<form action="ListaEspera" method="POST">
    <table>
        <tr><td>Tipo: </td><td><select name="tipo">
            <option value="0">Lista de Espera</option>
            <option value="1">Chamados pela Lista</option>
            <option value="2">Lista de Espera: ENEM SISU</option>
            <option value="3">Chamados pela Lista: ENEM SISU</option>
        </select></td></tr>
        <tr><td>Curso: </td><td><select name="curso">
            <option value="-1"></option>
            <option value="12">ADMINISTRAÇÃO</option>
            <option value="114">ANTROPOLOGIA</option>
            <option value="28">ARQ E URBANISMO</option>
            <option value="59">BIOLOGIA (B)</option>
            <option value="23">CIENCIAS SOCIAIS</option>
            <option value="18">COMUNICAÇÃO SOCIAL</option>
            <option value="47">DIREITO</option>
            <option value="60">ECONOMIA MATUTINO</option>
            <option value="38">ECONOMIA VESP/NOTURNO</option>
            <option value="50">FISICA</option>
            <option value="56">GEOGRAFIA</option>
            <option value="78">GEOLOGIA</option>
            <option value="116">GESTÃO TERRITORIAL INDIGENA</option>
            <option value="63">HISTORIA MATUTINO</option>
            <option value="64">HISTORIA NOTURNO</option>
            <option value="90">INTERCULTURAL</option>
            <option value="110">LITERATURA</option>
            <option value="111">ESPANHOL</option>
            <option value="112">FRANCES</option>
            <option value="113">INGLES</option>
            <option value="55">MATEMATICA (B)</option>
            <option value="51">MATEMATICA (L)</option>
            <option value="62">MEDICINA</option>
            <option value="95">PEDAGOGIA</option>
            <option value="29">PSICOLOGIA</option>
            <option value="61">QUIMICA</option>
            <option value="66">RELAÇÕES INTERNACIONAIS</option>
            <option value="108">SECRETARIADO</option>
            <option value="30">ZOOTECNIA</option>
            <option value="58">BIOLOGIA (L)</option>
            <option value="34">AGRONOMIA</option>
            <option value="96">COMPUTAÇÃO</option>
            <option value="37">ENG. CIVIL</option>
            <option value="109">CONTABILIDADE</option>
            <option value="122">ARTES VISUAIS</option>
            <option value="149">ENG. ELETRICA</option>
        </select></td></tr>
        <tr><td>Vagas: </td><td><input name="vagas" type="text" value="<?php $sf_request->getParameter('vagas') ?>"></td></tr>
        <tr><td>2ª Op: </td><td><input name="flag" type="text" value="<?php $sf_request->getParameter('flag') ?>"></td></tr>
        <tr><td colspan="2"><input type="submit" name="Enviar"><br></td></tr>
    </table>
</form>
<?php include_partial('aluno/list_fields', array('list' => $list, 'show_fields' => $show_fields)) ?>
<form action="ChamaLista" method="POST">
    <input type="submit" name="Enviar">
</form>