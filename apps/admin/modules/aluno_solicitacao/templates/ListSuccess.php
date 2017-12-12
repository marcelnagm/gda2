
<form action="<?php echo url_for1('aluno_solicitacao/Processa?id_solicitacao='.$sf_request->getParameter('id_solicitacao'));?>" method="get">
    <input type="hidden" name="id_solicitacao" value="<?php echo $sf_request->getParameter('id_solicitacao')?>">
    <input type="hidden" name="acao" value="<?php echo $sf_request->getParameter('acao')?>">
    <font style="text-align: center;"> Diga o motivo do Cancelamento/Deferimento</font><br>
    <textarea cols="60" rows="4" name="observacao" ></textarea>
    <input type="submit" value="Processar">
</form>