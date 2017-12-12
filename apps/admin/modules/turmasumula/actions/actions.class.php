<?php

require_once dirname(__FILE__) . '/../lib/turmasumulaGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/turmasumulaGeneratorHelper.class.php';

/**
 * turmasumula actions.
 *
 * @package    derca
 * @subpackage turmasumula
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class turmasumulaActions extends autoTurmasumulaActions {

  

    public function executeSumulaTurma(sfRequest $request) {

        $c = new Criteria();
        $c->add(TbturmaSumulaPeer::ID_TURMA, $request->getParameter('id_turma'));
        $c->addJoin(TbturmaSumulaPeer::ID_TURMA, TbturmaProfessorPeer::ID_TURMA);
        $c->addAscendingOrderByColumn(TbturmaSumulaPeer::DATA);
        $this->TbturmaSumulas = TbturmaSumulaPeer::doSelect($c);
        $this->form = new ProfessorSumulaForm();
        $this->id_turma = $request->getParameter('id_turma');
    }

    public function executeImprimir(sfWebRequest $request) {

        $this->setLayout(false);        

        $c = new Criteria();
        $c->add(TbturmaSumulaPeer::ID_TURMA, $request->getParameter('id_turma'));
        $c->addAscendingOrderByColumn(TbturmaSumulaPeer::DATA);
        $this->TbturmaSumulas = TbturmaSumulaPeer::doSelect($c);
        $this->id_turma = $request->getParameter('id_turma');
    }

    public function executeRemoveSumula(sfWebRequest $request) {
        $sumula = TbturmaSumulaPeer::retrieveByPK($request->getParameter('id_sumula'));

        $c = new Criteria();
        $c->add(TbturmaProfessorPeer::MATRICULA_PROF, $this->getUser()->getAttribute('professor_turma')->getMatriculaProf());
        $c->add(TbturmaSumulaPeer::ID_TURMA, $sumula->getIdTurma());
        $c->addJoin(TbturmaSumulaPeer::ID_TURMA, TbturmaProfessorPeer::ID_TURMA);
        $c->addAscendingOrderByColumn(TbturmaSumulaPeer::DATA);

        $sumula->delete();

        return $this->renderText(get_partial('list_sumulas', array('TbturmaSumulas' => TbturmaSumulaPeer::doSelect($c))));
    }

    public function executeNew(sfWebRequest $request)
  {
    $form = new TbturmaSumulaForm();

    $form =      $this->configuration->getForm();
    if($request->getParameter('id_turma')){
        $criteria = new Criteria();
        $criteria->add(TbturmaPeer::ID_TURMA,$request->getParameter('id_turma'));
        $form->getWidget('id_turma')->setOption('criteria', $criteria);
        $form->getWidget('matricula_prof')->setOption('default',sfContext::getInstance()->getUser()->getAttribute('professor_turma')->getMatriculaProf());
        sfContext::getInstance()->getUser()->setAttribute('id_turma', $request->getParameter('id_turma'));        

    }
    $this->form = $form;
    $this->tbturmasumula = $this->form->getObject();
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';

      $tbturmasumula = $form->save();

      $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $tbturmasumula)));
      if(sfContext::getInstance()->getUser()->hasAttribute('id_turma')){
          $request->setParameter('id_turma', sfContext::getInstance()->getUser()->getAttribute('id_turma'));
          $this->forward('turma','ListSumulas');
      }

      if ($request->hasParameter('_save_and_add'))
      {
        $this->getUser()->setFlash('notice', $notice.' You can add another one below.');

        $this->redirect('@tbturmasumula_new');
      }
      else
      {
        $this->getUser()->setFlash('notice', $notice);

        $this->redirect(array('sf_route' => 'tbturmasumula_edit', 'sf_subject' => $tbturmasumula));
      }
    }
    else
    {
      $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
    }
  }

}
