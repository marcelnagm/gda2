<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('solicitacoes/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id_solicitacao='.$form->getObject()->getIdSolicitacao() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('solicitacoes/index') ?>">Back to list</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'solicitacoes/delete?id_solicitacao='.$form->getObject()->getIdSolicitacao(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>       
      <tr>
        <th><?php echo $form['tipo']->renderLabel() ?></th>
        <td>
          <?php echo $form['tipo']->renderError() ?>
          <?php echo $form['tipo'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['descricao']->renderLabel() ?></th>
        <td>
          <?php echo $form['descricao']->renderError() ?>
          <?php echo $form['descricao'] ?>
        </td>
      </tr>
      
    </tbody>
  </table>
</form>
