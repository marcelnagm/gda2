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
    <table align="center">
        <tr><td>Processo: </td><td><select name="processo">
            <option value="SISU-2012">Lista de Espera: ENEM SISU 2012</option>
            <option value="VEST-2012">Vestibular 2012</option>
        </select></td></tr>
        <tr><td>Opção: </td><td><select name="opcao">
            <option value="ESPERA">ESPERA</option>
            <option value="CHAMADO">CHAMADO</option>
            <option value="MATRICULADO">MATRICULADO</option>
            <option value="PRÉ-MATRICULADO">PRÉ-MATRICULADO</option>
        </select></td></tr>
        <tr><td>Curso: </td><td><select name="curso">
            <option value="-1"></option>
            <option value="12">ADMINISTRAÇÃO</option>
            <option value="34">AGRONOMIA</option>
            <option value="114">ANTROPOLOGIA</option>
            <option value="28">ARQ E URBANISMO</option>
            <option value="159">ARTES VISUAIS</option>
            <option value="173">BIOLOGIA (B)</option>
            <option value="174">BIOLOGIA (L)</option>
            <option value="23">CIENCIAS SOCIAIS</option>
            <option value="96">COMPUTAÇÃO</option>
            <option value="175">COMUNICAÇÃO SOCIAL</option>
            <option value="109">CONTABILIDADE</option>
            <option value="47">DIREITO</option>
            <option value="60">ECONOMIA MATUTINO</option>
            <option value="38">ECONOMIA VESP/NOTURNO</option>
            <option value="37">ENG. CIVIL</option>
            <option value="149">ENG. ELETRICA</option>
            <option value="50">FISICA</option>
            <option value="57">GEOGRAFIA (B)</option>
            <option value="21">GEOGRAFIA (L)</option>
            <option value="78">GEOLOGIA</option>
            <option value="116">GESTÃO TERRITORIAL INDIGENA</option>
            <option value="166">HISTORIA MATUTINO</option>
            <option value="167">HISTORIA NOTURNO</option>
            <option value="90">INTERCULTURAL</option>
            <option value="110">LETRAS - LITERATURA</option>
            <option value="111">LETRAS - ESPANHOL</option>
            <option value="112">LETRAS - FRANCES</option>
            <option value="113">LETRAS - INGLES</option>
            <option value="182">MATEMATICA (B)</option>
            <option value="183">MATEMATICA (L)</option>
            <option value="155">MEDICINA</option>
            <option value="95">PEDAGOGIA</option>
            <option value="29">PSICOLOGIA</option>
            <option value="179">QUIMICA</option>
            <option value="66">RELAÇÕES INTERNACIONAIS</option>
            <option value="108">SECRETARIADO</option>
            <option value="30">ZOOTECNIA</option>
        </select></td></tr>
        <tr><td colspan="2" align="center"><input type="submit" name="Enviar" value="Listar"><br></td></tr>
    </table>
</form>
<?php if (isset($list)) include_partial('aluno/list_fields', array('list' => $list, 'show_fields' => $show_fields)) ?>
<form action="ChamaLista" method="POST">
    <input type="submit" name="Enviar" value="Chamar">
</form>