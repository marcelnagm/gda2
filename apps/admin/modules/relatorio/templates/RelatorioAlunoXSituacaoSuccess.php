<?php use_helper('I18N') ?>
<h1><?php echo $form->getTitulo() ?></h1>
<div class="info">

    <?php if(isset($cod_curso)) : ?>
<p>
        <?php echo (count($cod_curso) > 1) ? 'Cursos': 'Curso' ?>:
        <?php foreach ($cod_curso as $curso ): ?>
            <?php echo $curso ?><?php echo ', '?>
        <?php endforeach ?>
    </p>
    <?php endif ?>
<div class="lista">
<table  >
<thead><tr>
<th>Cursos</th>

<?php foreach ($id_situacao as $situacao => $v):?>
<th> <?php echo strtolower($v); ?></th>
<?php endforeach;?>
</tr>

</thead>

<tbody>
    <?php foreach ($cod_curso as $curso => $v): ?>
    <tr>
        <td><?php echo $v; ?></td>
        <?php foreach ($list[$curso] as $result => $total): ?>
        <td><?php echo $total; ?></td>
            <?php $to ?>
        <?php endforeach;?>
    </tr>
   <?php endforeach;?>
</tbody>
</table>
</div>
Total de alunos listados: <?php echo $total_alunos;?>
