<span>
<?php
$temp = $tbcurriculodisciplinas->getTbgradeEquivalente();
if (isset($temp)) {
    echo $temp->getTbdisciplina();
}
?>
</span>