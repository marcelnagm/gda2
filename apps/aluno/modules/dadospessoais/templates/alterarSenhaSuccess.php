<?php use_helper('I18N'); ?>
<h1>Dados Pessoais</h1>
<span class="art-button-wrapper">
    <span class="l"> </span>
    <span class="r"> </span>
    <a class="voltar" href="<?php echo url_for('dadospessoais/index') ?>">Voltar</a>
</span>
<br /><br />
<form action="<?php echo url_for('dadospessoais/alterarSenha') ?>" method="post">
    <table>
        <tfoot>
            <tr>
                <td align="center" colspan="2">
                    <input type="submit" value="<?php echo __('Save') ?>" />
                </td>
            </tr>
        </tfoot>
        <tbody>
            <?php echo $form ?>
        </tbody>
    </table>
</form>
