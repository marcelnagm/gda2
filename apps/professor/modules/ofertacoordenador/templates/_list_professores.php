<table class="horario">
    <tr>
        <td>
            <?php echo $tboferta->getTbprofessorRelatedByIdMatriculaProf() ?>
        </td>
    </tr>
    <?php if ($tboferta->getTbprofessorRelatedByIdMatriculaProf2() != null): ?>
    <tr>
        <td>
            <?php echo $tboferta->getTbprofessorRelatedByIdMatriculaProf2() ?>
        </td>
    </tr>
    <?php endif;?>
</table>