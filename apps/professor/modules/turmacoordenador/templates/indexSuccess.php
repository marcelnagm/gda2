<?php use_helper('I18N', 'Date') ?>


<div align="center">
<h2>DEPARTAMENTO DO CURSO DE <?php echo  $professor->getTbcurso()->getDescricao(); ?><br>
    COORDENADOR DO CURSO: <?php echo ucwords(strtolower($professor->getNome()));?>
</h2>
<br/>
<table>
    <thead>
        <th><big>Lista de Ofertas Anteriores</big></th>
    </thead>
    <?php foreach ($periodos as $per) : ?>
        <tr class="center_head sf_admin_row">    
            <td align="center"><big><a target="_blank" href="<?php echo url_for2('show_periodo', array('id_periodo' => $per->getIdPeriodo())); ?>">
                <?php echo $per; ?>
            </a></big></td>
        </tr>
    <?php endforeach; ?>
</table>
</div>