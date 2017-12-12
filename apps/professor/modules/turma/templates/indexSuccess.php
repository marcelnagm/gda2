<body <?php if (isset($popup)) echo 'onload="alert(\'Você possui turmas 100% preenchidas, por favor, não esqueça de finalizá-las!\')"'?>>
<h1>Lista de turmas</h1>
<div class="error"> ATENÇÃO! APÓS TERMINAR OS LANÇAMENTOS DAS SÚMULAS E NOTAS, CLIQUE EM FINALIZAR PARA TRANSFERIR OS DADOS PARA O HISTÓRICO DOS ALUNOS!</div>
<table>
    <thead>
        <tr>
            <th>Turma</th>
            <th>Disciplina</th>
            <th>Alunos</th>
            <th>Contatos</th>
            <th>Frequência</th>
            <th>Súmula</th>
            <th>Notas</th>
            <th>Finalizar turma?</th>
            <th>Copiar súmulas?</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($tbturmas as $k=>$tbturma): ?>
        <tr class="<?php echo ($k % 2) ? 'even':'odd' ?>">
            <td><?php echo $tbturma ?></td>
            <td><?php echo $tbturma->getTbdisciplina()->getDescricao() ?></td>
            <td><?php echo $tbturma->getQtdeAlunos() ?></td>
            <td nowrap align="center">
                <a href="<?php echo url_for('turma/contato?id='.$tbturma->getIdTurma()) ?>" target="_blank"><img src="/images/icons/lista-small.png" alt="Contatos" /></a>
            </td>
            <td nowrap align="center">
                <a href="<?php echo url_for('turma/frequencia?id='.$tbturma->getIdTurma()) ?>" target="_blank"><img src="/images/icons/lista-small.png" alt="Frequência" /></a>
            </td>
            <td nowrap align="center">
                <a href="<?php echo url_for('sumula/lista?id='.$tbturma->getIdTurma()) ?>"><img src="/images/icons/calendar-small.png" alt="Súmula: " /> <?php echo $tbturma->countTbturmaSumulas() ?></a>
            </td>
            <td nowrap align="center">
                <?php if(!$tbturma->getNotasNoHistorico()): ?>
                    <a href="<?php echo url_for('turma/notas?id='.$tbturma->getIdTurma()) ?>"><img src="/images/icons/folder_table-small.png" alt="Notas: " /> <?php echo $tbturma->getPorcentagemPreenchido() ?>%</a>
                <?php endif ?>
            </td>
            <td nowrap align="center">
                <a href="<?php echo url_for('turma/FinalizaTurma?id='.$tbturma->getIdTurma()) ?>" onclick="alert('Atenção! Ao executar esta ação, as notas serão transferidas para o histórico e as súmulas armazenadas.\nApós finalizar e sair do sistema, o processo será irreversível. Se desejar retificar alguma nota após\na finalização, você deverá encaminhar um memo ao DERCA solicitando a retificação.');
                    var porcentagem = <?php echo $tbturma->getPorcentagemPreenchido() ?>;
                    if(porcentagem =='100'){
                    if (confirm('Tem certeza que deseja executar esta ação?')) { var f = document.createElement('form'); f.style.display = 'none'; this.parentNode.appendChild(f); f.method = 'post'; f.action = this.href;var m = document.createElement('input'); m.setAttribute('type', 'hidden'); m.setAttribute('name', 'sf_method'); m.setAttribute('value', 'delete'); f.appendChild(m);var m = document.createElement('input'); m.setAttribute('type', 'hidden'); m.setAttribute('name', '_csrf_token'); m.setAttribute('value', 'd1b669a68e5268082be8fa99b94807c0'); f.appendChild(m);f.submit(); };
                    return false;
                    } else {
                        alert('Ainda existem notas que faltam ser preenchidas. Preencha todas as notas,\nincluindo 0 (zero) caso o aluno não tenha nota ou faltas. Caso todas as notas\nestejam preenchidas e ainda assim não completar os 100% nem finalizar,\npor favor, entre em contato com DERCA pelo telefone 3621-3129.');
                        return false;
                    }
       "><img src="/images/icons/tick-small.png" alt="Finalizar " /> Finalizar</a>
            </td>
            <td nowrap align="center">
                <a href="<?php echo url_for('sumula/copiasumula?id='.$tbturma->getIdTurma()) ?>">Copiar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php include_partial('turma/list_undo',array('history' => $history));  ?>
<?php include_partial('turma/list_finalized',array('tbturmasfinalized' => $tbturmasfinalized));  ?>
</body>