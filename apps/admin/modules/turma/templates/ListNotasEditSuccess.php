<?php

use_stylesheet('/css/lista_notas.css');
use_javascript('/js/frm_notas.js');

?>
<script type="text/javascript">
    $(document).ready(function(){
        caixas  = $('.objNota');
        caixas.change(function(){
            $.ajax({
                type: "POST",
                url: "<?php echo url_for('@form_nota') ?>",
                data: this.name+"="+this.value+"&obj_id="+this.id,
                success: ajaxMessage,
                error: function(serverMsg){
                    statusMsg(2);
                }

            });
        });
        caixas.focus(function(){$(this).addClass('caixaFoco')});
        caixas.blur(function(){$(this).removeClass('caixaFoco')});
    });
</script>
<h1>Notas</h1>

<?php include_component('turma','info', array( 'tbturma' => $tbturma,'id_turma' => $tbturma->getIdTurma() )) ?>

<?php if(!count($tbturmaAlunos)): ?>

<span id="status" class="erro semSeta" style="display: block;position:static;width: 300px;margin:0px auto;text-align: center"><span>Não há alunos cadastrados nesta turma</span></span>

<?php else: ?>
<br />
<div class="info">
    <div id="status"><span></span></div>
    <form name="frm_n_notas" method="POST" action="<?php echo url_for('@form_nnotas') ?>" onsubmit="return validaFormNNotas(<?php echo $tbturma->getNNotas() ?>)">
        <input type="hidden" name="id_turma" value="<?php echo $tbturma->getIdTurma() ?>" />
        <label for="n_notas">Número de Avaliações:
            <select id="n_notas" name="n_notas">
                <option value="1" <?php echo ($tbturma->getNNotas()==1)?'selected="selected"':""?>>1</option>
                <option value="2" <?php echo ($tbturma->getNNotas()==2)?'selected="selected"':''?>>2</option>
                <option value="3" <?php echo ($tbturma->getNNotas()==3)?'selected="selected"':''?>>3</option>
                <option value="4" <?php echo ($tbturma->getNNotas()==4)?'selected="selected"':''?>>4</option>
                <option value="5" <?php echo ($tbturma->getNNotas()==5)?'selected="selected"':''?>>5</option>
                <option value="6" <?php echo ($tbturma->getNNotas()==6)?'selected="selected"':''?>>6</option>
                <option value="7" <?php echo ($tbturma->getNNotas()==7)?'selected="selected"':''?>>7</option>
                <option value="8" <?php echo ($tbturma->getNNotas()==8)?'selected="selected"':''?>>8</option>
                <option value="9" <?php echo ($tbturma->getNNotas()==9)?'selected="selected"':''?>>9</option>
                <option value="10" <?php echo ($tbturma->getNNotas()==10)?'selected="selected"':''?>>10</option>
            </select>
            <input type="submit" value="Trocar" style="height: 2em" />
        </label>
    </form>
    <span class="art-button-wrapper">
        <span class="l"> </span>
        <span class="r"> </span>
        <a href="<?php echo url_for('turma/index') ?>">Voltar</a>
    </span>
    <span class="art-button-wrapper">
        <span class="l"> </span>
        <span class="r"> </span>
        <a href="<?php echo url_for('login/Signout') ?>">Sair</a>
    </span>    
    <span class="art-button-wrapper">
        <span class="l"> </span>
        <span class="r"> </span>
        <a target="_blank" href="?layout=impressao&id_turma=<?php echo $tbturma->getIdTurma();?>">Imprimir</a>
    </span>
</div>
<br />
Ao término da edição das notas clique em "SAIR"

<table class="formnotas">
    <thead>
        <tr>
            <th rowspan="2" width="50">
                Matrícula
            </th>
            <th rowspan="2" width="250">
                Nome
            </th>
            <th rowspan="2">
                Faltas
            </th>
            <th colspan="<?php echo ($tbturma->getNNotas() + 1) ?>">
                Nota<?php echo ($tbturma->getNNotas()>1)?'s':''?>
            </th>
            <th rowspan="2">
                Exame
                <br>
                Rec.
            </th>
            <th rowspan="2">
                Média
                <br>
                Final
            </th>
            <th rowspan="2">
                Conceito<b>*</b>
            </th>
        </tr>
        <tr>
                <?php for ($i=0;$i<$tbturma->getNNotas();$i++): ?>
            <th class="caixa"><?php echo ($i+1) ?>a.</th>
                <?php endfor ?>

            <th>
                Média
                <br>
                Parcial
            </th>
        </tr>
    </thead>
    <tbody>

            <?php

            $countAlunos = count($tbturmaAlunos);
            $tabIndex = 0;

            foreach ($tbturmaAlunos as $k=>$ta):



                ?>

        <tr id="linha<?php echo $ta->getIdAluno() ?>" class="<?php echo ($k % 2) ? 'even':'odd' ?>">
            <td><?php echo $ta->getMatricula() ?></td>
            <td><?php echo $ta->getTbaluno()->getNome() ?></td>
            <td>
                <input tabindex="<?php echo (++$tabIndex) ?>" name="form[<?php echo $ta->getIdAluno() ?>][faltas]" id="faltas_<?php echo $ta->getIdAluno() ?>" value="<?php echo $ta->getFaltas() ?>" type="text" class="objNota" title="Digite um número inteiro e aperte a tecla TAB">
            </td>

                    <?php

                    for ($nNota=1; $nNota <= $tbturma->getNNotas(); $nNota++):

                        $campoNota['id']    = "nota_{$ta->getIdAluno()}_$nNota";
                        $campoNota['name']  = "form[{$ta->getIdAluno()}][nota][$nNota]";
                        $campoNota['value'] = @$notas[$ta->getIdAluno()][$nNota];


                        ?>

            <td class="caixa">
                <input tabindex="<?php echo ($tabIndex+$countAlunos*$nNota) ?>" name="<?php echo $campoNota['name'] ?>" id="<?php echo $campoNota['id']  ?>" value="<?php echo $campoNota['value'] ?>" type="text" class="objNota" title="Digite um número entre 0 e 10 (Ex.: 9.99) e aperte a tecla TAB">
            </td>

                    <?php endfor ?>

            <td class="mp">
                <span id="mp_<?php echo $ta->getIdAluno() ?>">
                            <?php echo $ta->getMediaParcial()?>
                </span>
            </td>
            <td>
                <input tabindex="<?php echo ($tabIndex+$countAlunos*$nNota) ?>" name="form[<?php echo $ta->getIdAluno() ?>][notaer]" id="notaer_<?php echo $ta->getIdAluno() ?>" value="<?php echo $ta->getExameRecuperacao() ?>" type="text" class="objNota" title="Digite um número entre 0 e 10 (Ex.: 9.99)">
            </td>
            <td class="mf">
                <span id="mf_<?php echo $ta->getIdAluno() ?>">
                            <?php echo $ta->getMediaFinal() ?>
                </span>
            </td>
            <td class="conceito">
                <span id="c_<?php echo $ta->getIdAluno() ?>" class="conceito<?php echo $ta->getIdConceito() ?>">
                            <?php echo $ta->getIdConceito() ?>
                </span>
            </td>
        </tr>
            <?php endforeach; ?>
    </tbody>
</table>

    <?php include_component('turma','legendaConceito') ?>

<?php endif ?>
