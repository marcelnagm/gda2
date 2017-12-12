<?php
require dirname(__FILE__) . '/../../../../../lib/vendor/symfony/lib/helper/PartialHelper.php';

/**
 * sumula actions.
 *
 * @package    derca
 * @subpackage sumula
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sumulaActions extends sfActions {

    public function executeRemoveSumula(sfWebRequest $request) {       
        $sumula = TbturmaSumulaPeer::retrieveByPK($request->getParameter('id_sumula'));

        $c = new Criteria();
        $c->add(TbturmaProfessorPeer::MATRICULA_PROF, $this->getUser()->getAttribute('professor')->getMatriculaProf());
        $c->add(TbturmaSumulaPeer::ID_TURMA, $sumula->getIdTurma());
        $c->addJoin(TbturmaSumulaPeer::ID_TURMA, TbturmaProfessorPeer::ID_TURMA);
        $c->addAscendingOrderByColumn(TbturmaSumulaPeer::DATA);

        $sumula->delete();
        
        return $this->renderText(get_partial('list_sumulas',  array('TbturmaSumulas' => TbturmaSumulaPeer::doSelect($c))));

    }
    public function executeAdicionaSumula(sfWebRequest $request) {
        $sumula = new TbturmaSumula();
        $sumula->setData($request->getParameter('ano').'/'.$request->getParameter('mes').'/'.$request->getParameter('dia'));
        $sumula->setDescricao($request->getParameter('descricao'));
        $sumula->setIdTurma($request->getParameter('id_turma'));
        $sumula->setMatriculaProf($this->getUser()->getAttribute('professor')->getMatriculaProf());
        $sumula->save();

        $c = new Criteria();
        $c->add(TbturmaProfessorPeer::MATRICULA_PROF, $this->getUser()->getAttribute('professor')->getMatriculaProf());
        $c->add(TbturmaSumulaPeer::ID_TURMA, $request->getParameter('id_turma'));
        $c->addJoin(TbturmaSumulaPeer::ID_TURMA, TbturmaProfessorPeer::ID_TURMA);
        $c->addAscendingOrderByColumn(TbturmaSumulaPeer::DATA);        
        return $this->renderText(get_partial('list_sumulas',  array('TbturmaSumulas' => TbturmaSumulaPeer::doSelect($c))));

    }

    public function executeCopiasumula(sfWebRequest $request) {
        $this->forward404Unless(TbturmaPeer::professorDaTurma($this->getUser()->getAttribute('professor')->getMatriculaProf(), $request->getParameter('id')), 'Professor com matricula ' . $this->getUser()->getAttribute('professor')->getMatriculaProf() . ' não tem vínculo com a turma ' . $request->getParameter('id'));
        if ($request->isMethod('POST')) {
            try {
                $para = $request->getParameter('to_id');
                $c = new Criteria();
                $c->add(TbturmaProfessorPeer::MATRICULA_PROF, $this->getUser()->getAttribute('professor')->getMatriculaProf());
                $c->add(TbturmaSumulaPeer::ID_TURMA, $request->getParameter('id'));
                $c->addJoin(TbturmaSumulaPeer::ID_TURMA, TbturmaProfessorPeer::ID_TURMA);
                $c->addAscendingOrderByColumn(TbturmaSumulaPeer::DATA);
                foreach (TbturmaSumulaPeer::doSelect($c) as $sumula) {
                    $copy = new TbturmaSumula();
                    $copy->setData($sumula->getData());
                    $copy->setDescricao($sumula->getDescricao());
                    $copy->setIdTurma($para);
                    $copy->setMatriculaProf($sumula->getMatriculaProf());
                    $copy->save();
                }
            } catch (Exception $ex) {
                sfContext::getInstance()->getUser()->setFlash('error', 'Houve um erro ao tentar copiar as súmulas!');
            }
            $this->redirect('turma/index');
        }
        $this->to_turma = TbturmaPeer::retrieveByProfessor($this->getUser()->getAttribute('professor')->getMatriculaProf());
        $this->turma = TbturmaPeer::retrieveByPK($request->getParameter('id'));
    }
    
    public function executeLista(sfWebRequest $request) {

        $this->forward404Unless(TbturmaPeer::professorDaTurma($this->getUser()->getAttribute('professor')->getMatriculaProf(), $request->getParameter('id')), 'Professor com matricula ' . $this->getUser()->getAttribute('professor')->getMatriculaProf() . ' não tem vínculo com a turma ' . $request->getParameter('id'));

        $c = new Criteria();
        $c->add(TbturmaProfessorPeer::MATRICULA_PROF, $this->getUser()->getAttribute('professor')->getMatriculaProf());
        $c->add(TbturmaSumulaPeer::ID_TURMA, $request->getParameter('id'));
        $c->addJoin(TbturmaSumulaPeer::ID_TURMA, TbturmaProfessorPeer::ID_TURMA);
        $c->addAscendingOrderByColumn(TbturmaSumulaPeer::DATA);
        $this->TbturmaSumulas = TbturmaSumulaPeer::doSelect($c);
        $this->forward404Unless(TbturmaPeer::professorDaTurma($this->getUser()->getAttribute('professor')->getMatriculaProf(), $request->getParameter('id')), 'Professor com matricula ' . $this->getUser()->getAttribute('professor')->getMatriculaProf() . ' não tem vínculo com a turma ' . $request->getParameter('id'));
        $this->form = new ProfessorSumulaForm();
        $this->TbturmaSumula = new TbturmaSumula();
        $this->id_turma = $request->getParameter('id');
    }

    public function executeImprimir(sfWebRequest $request) {

        $this->setLayout(false);
        $this->forward404Unless(TbturmaPeer::professorDaTurma($this->getUser()->getAttribute('professor')->getMatriculaProf(), $request->getParameter('id')), 'Professor com matricula ' . $this->getUser()->getAttribute('professor')->getMatriculaProf() . ' não tem vínculo com a turma ' . $request->getParameter('id'));

        $c = new Criteria();
        $c->add(TbturmaProfessorPeer::MATRICULA_PROF, $this->getUser()->getAttribute('professor')->getMatriculaProf());
        $c->add(TbturmaSumulaPeer::ID_TURMA, $request->getParameter('id'));
        $c->addJoin(TbturmaSumulaPeer::ID_TURMA, TbturmaProfessorPeer::ID_TURMA);
        $c->addAscendingOrderByColumn(TbturmaSumulaPeer::DATA);
        $this->TbturmaSumulas = TbturmaSumulaPeer::doSelect($c);
    }

    public function executeNew(sfWebRequest $request) {
        $this->forward404Unless(TbturmaPeer::professorDaTurma($this->getUser()->getAttribute('professor')->getMatriculaProf(), $request->getParameter('id')), 'Professor com matricula ' . $this->getUser()->getAttribute('professor')->getMatriculaProf() . ' não tem vínculo com a turma ' . $request->getParameter('id'));
        $this->form = new ProfessorSumulaForm();
        $this->TbturmaSumula = new TbturmaSumula();
    }

    public function executeCreate(sfWebRequest $request) {

        $this->forward404Unless(TbturmaPeer::professorDaTurma($this->getUser()->getAttribute('professor')->getMatriculaProf(), $request->getParameter('id')), 'Professor com matricula ' . $this->getUser()->getAttribute('professor')->getMatriculaProf() . ' não tem vínculo com a turma ' . $request->getParameter('id'));
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new ProfessorSumulaForm();
        $this->TbturmaSumula = new TbturmaSumula();

        $this->processForm($request, $this->form, $this->TbturmaSumula);

        $this->setTemplate('edit');
    }

    public function executeEdit(sfWebRequest $request) {

        $this->forward404Unless(TbturmaPeer::professorDaTurma($this->getUser()->getAttribute('professor')->getMatriculaProf(), $request->getParameter('id')), 'Professor não tem vínculo com a turma requisitada');
        $this->forward404Unless($TbturmaSumula = TbturmaSumulaPeer::retrieveByPk($request->getParameter('id_sumula')), sprintf('Object TbturmaSumula does not exist (%s).', $request->getParameter('id_sumula')));
        $this->form = new ProfessorSumulaForm();

        $this->TbturmaSumula = $TbturmaSumula;
        

        $values['data'] = $this->TbturmaSumula->getData();
        $values['descricao'] = $this->TbturmaSumula->getDescricao();
        $values['id_sumula'] = $this->TbturmaSumula->getIdSumula();
        $this->form->setDefaults($values);
    }

    public function executeUpdate(sfWebRequest $request) {

        $this->forward404Unless(TbturmaPeer::professorDaTurma($this->getUser()->getAttribute('professor')->getMatriculaProf(), $request->getParameter('id')), 'Professor com matricula ' . $this->getUser()->getAttribute('professor')->getMatriculaProf() . ' não tem vínculo com a turma ' . $request->getParameter('id'));
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($this->TbturmaSumula = TbturmaSumulaPeer::retrieveByPk($request->getParameter('id_sumula')));

        $this->form = new ProfessorSumulaForm();

        $this->processForm($request, $this->form, $this->TbturmaSumula);

        $this->setTemplate('edit');
    }

    public function executeIndex(sfWebRequest $request) {
        $this->executeLista($request);
    }

    public function executeDelete(sfWebRequest $request) {
        #$request->checkCSRFProtection();


        $this->forward404Unless($TbturmaSumula = TbturmaSumulaPeer::retrieveByPk($request->getParameter('id_sumula')), sprintf('Object TbturmaSumula does not exist (%s).', $request->getParameter('id_sumula')));
        $this->forward404Unless(TbturmaPeer::professorDaTurma($this->getUser()->getAttribute('professor')->getMatriculaProf(), $TbturmaSumula->getIdTurma()), 'Professor com matricula ' . $this->getUser()->getAttribute('professor')->getMatriculaProf() . ' não tem vínculo com a turma ' . $TbturmaSumula->getIdTurma());
        $TbturmaSumula->delete();

        $this->redirect('sumula/lista?id=' . $TbturmaSumula->getIdTurma());
    }

    public function processForm($request, $form, $TbturmaSumula) {

        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));

        if ($form->isValid()) {

            $values = $form->getValues();

            $TbturmaSumula->fromArray($values, BasePeer::TYPE_FIELDNAME);
            $TbturmaSumula->setMatriculaProf($this->getUser()->getAttribute('professor')->getMatriculaProf());
            if ($TbturmaSumula->isNew())
                $TbturmaSumula->setIdturma($request->getParameter('id'));

            try {

                $TbturmaSumula->save();
            } catch (PropelException $exc) {
                sfContext::getInstance()->getLogger()->err('Erro ao inserir súmula: ' . $TbturmaSumula->getDescricao());
                $this->getUser()->setFlash('error', 'Não foi possível incluir a súmula do dia ' . $TbturmaSumula->getData() . (preg_match('/Untranslatable character/', $exc->getMessage()) ? '. Caracteres inválidos no campo Descrição.' : '' ));
            } catch (Exception $exc) {
                sfContext::getInstance()->getLogger()->err('Erro ao inserir súmula: ' . $exc->getMessage());
                $this->getUser()->setFlash('error', 'Erro ao incluir a súmula do dia ' . $TbturmaSumula->getData() . 'Erro ao inserir súmula: ' . $exc->getMessage());
            }

            $this->redirect('sumula/lista?id=' . $request->getParameter('id'));
        }
    }

    
}
