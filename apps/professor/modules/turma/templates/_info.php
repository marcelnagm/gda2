<?php //$tbturma = new Tbturma();?>
<div class="info">
    <table>
        <tr>
            <th><?php echo (count($tbturma->getTbturmaProfessors())>1) ? 'Professores' : 'Professor(a)' ?></th>
            <td>
                <?php foreach($tbturma->getTbturmaProfessors() as $turmaProfessor) : ?>
                <span style="white-space: nowrap">
                        <?php echo $turmaProfessor ?>
                </span>
                <br />
                <?php endforeach ?>
            </td>
        </tr>
        <tr>
            <th>Turma</th>
            <td>
                <?php echo $tbturma ?>
            </td>
        </tr>
        <tr>
            <th>Disciplina</th>
            <td>
                <?php echo $tbturma->getTbdisciplina()->getDescricao() ?>
            </td>
        </tr>
        <tr>
            <th>Carga Horária / Sala </th>
            <td>
             <?php echo $tbturma->getTbdisciplina()->getCh() . 'h / '.($tbturma->getTboferta() != null ? $tbturma->getTboferta()->getTbsala() : 'Não definida')?>
            </td>
        </tr>        
       <tr>
            <th>Dias:</th>
            <td>
                    <?php echo nl2br($tbturma->getTboferta() != null ? $tbturma->getTboferta()->getDias() : ''); ?>
            </td>
        </tr>
    </table>
</div>