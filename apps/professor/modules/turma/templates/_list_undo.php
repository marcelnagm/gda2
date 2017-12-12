<h4>Para desfazer a finalização da turma basta clicar na disciplina que aparece na lista.</h4>

<table>
    <thead>
    <th>
        Disciplina
    </th>
    <th>
        Desfazer?
    </th>

    </thead>
    <tbody>
        <?php if(count($history) > 0) : ?>
        <?php foreach ($history as $his): ?>        
        <tr>
            <td>
                <?php echo $his->getTbdisciplina()->getDescricao().'-'.$his->getTurma(); ?>
            </td>
            <td>
                <a href="<?php echo url_for1('turma/Desfazer?id='.$his->getIdTurma());  ?>"><img src="/images/icons/retry.png"  />Desfazer </a>
            </td>
        </tr>
        <?php endforeach;?>
    <?php endif; ?>
    </tbody>
    
</table>



