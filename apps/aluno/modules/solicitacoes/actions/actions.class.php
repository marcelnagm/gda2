<?php

/**
 * solicitacoes actions.
 *
 * @package    derca
 * @subpackage solicitacoes
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class solicitacoesActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $criteira =  new Criteria();
    $criteira->add(TbalunosolicitacaoPeer::MATRICULA,  $this->getUser()->getAttribute('aluno')->getMatricula());
    $this->Tbalunosolicitacaos = TbalunosolicitacaoPeer::doSelect($criteira);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new TbalunosolicitacaoForm(); 
    
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new TbalunosolicitacaoForm();
    unset($this->form['observacao']);
    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }


  public function executeDelete(sfWebRequest $request)
  {
    

    $this->forward404Unless($Tbalunosolicitacao = TbalunosolicitacaoPeer::retrieveByPk($request->getParameter('id_solicitacao')), sprintf('Object Tbalunosolicitacao does not exist (%s).', $request->getParameter('id_solicitacao')));
    if($Tbalunosolicitacao->getSituacao()=='pendente'){
    $Tbalunosolicitacao->delete();
    }else{
        $this->getUser()->setFlash('error', 'Você só pode remover solicitacoes pendentes');
    }

    $this->redirect('solicitacoes/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $this->getUser()->setFlash('notice', 'Sua Solicitação foi cadastrada')  ;
      $Tbalunosolicitacao = $form->save();

      $this->redirect('solicitacoes/index');
    }
  }
}
