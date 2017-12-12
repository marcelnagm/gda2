<h1>Lista de Solicitações</h1>

<table>
  <thead>
    <tr>
      <th>Identificador da Solicitação</th>
      <th>Tipo</th>
      <th>Descricao</th>
      <th>Data solicitacao</th>
      <th>Data encerrado</th>
      <th>Situacao</th>
      <th>Ações</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Tbalunosolicitacaos as $Tbalunosolicitacao): ?>
      <tr title="<?php echo $Tbalunosolicitacao->getObservacao(); ?>">
      <td><?php echo $Tbalunosolicitacao->getIdSolicitacao() ?></td>            
      <td><?php echo $Tbalunosolicitacao->getTipoCompleto() ?></td>
      <td><?php echo $Tbalunosolicitacao->getDescricao() ?></td>
      <td><?php echo $Tbalunosolicitacao->getDataSolicitacao() ?></td>
      <td><?php echo $Tbalunosolicitacao->getDataEncerrado() ?></td>
      <td align="center"><?php include_partial('solicitacoes/list_field_situacao', array('value' => $Tbalunosolicitacao->getSituacao()))?></td>
      <td align="center"><a href="<?php echo url_for1('solicitacoes/delete?id_solicitacao='.$Tbalunosolicitacao->getIdSolicitacao()) ?>"><?php echo image_tag('/images/remover.png',array('alt' => 'Remover','title'=> 'Remover'));?></a></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('solicitacoes/new') ?>">New</a>
