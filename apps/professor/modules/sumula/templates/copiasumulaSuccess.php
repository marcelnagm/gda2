<?php
use_helper('I18N');
use_helper('jQuery');
use_stylesheet('/sfPropelPlugin/css/default.css');
use_stylesheet('/sfPropelPlugin/css/global.css');
?>
<h1>Copiar súmulas</h1>
<h2>Você está copiando as súmulas da turma <?php echo $turma; ?>. 
    Escolha abaixo a turma para onde deseja copiar:</h2>
<form action="<?php echo url_for('sumula/copiasumula') ?>" method="POST">
    <input type="hidden" name="id" value="<?php echo $turma->getIdTurma(); ?>">
    <select name="to_id">
        <?php foreach ($to_turma as $possible) : ?>
            <option value="<?php echo $possible->getIdTurma(); ?>"><?php echo $possible; ?></option>
        <?php endforeach; ?>
    </select>
    <input type="submit" value="Copiar" />
</form>