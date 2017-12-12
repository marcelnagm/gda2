<?php

require_once dirname(__FILE__).'/../lib/historicoGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/historicoGeneratorHelper.class.php';

/**
 * historico actions.
 *
 * @package    derca
 * @subpackage historico
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class historicoActions extends autoHistoricoActions {

    function executeBatchMudarDisciplina(sfWebRequest $request) {
        $request->setAttribute('ids', $request->getParameter('ids'));
        $this->forward('historico','mudarDisciplina');
    }

    function executeMudarDisciplina(sfWebRequest $request) {
        $this->ids = $request->getAttribute('ids');
        $form = new MudarDisciplinaForm();
        if($request->isMethod(sfRequest::POST) && $request->hasParameter($form->getName())) {
            $form->bind($request->getParameter($form->getName()));
            if($form->isValid()) {
                try {
                    $form->save();
                    $this->getUser()->setFlash('notice','Disciplina trocado');
                } catch (Exception $exc) {
                    $this->getUser()->setFlash('error','Erro ao trocar disciplina');
                }
            }
            $this->redirect('historico/index');
        }
        $this->form = $form;
    }

    function executeBatchMudarConceito(sfWebRequest $request) {
        $request->setAttribute('ids', $request->getParameter('ids'));
        $this->forward('historico','mudarConceito');
    }

    function executeMudarConceito(sfWebRequest $request) {
        $this->ids = $request->getAttribute('ids');
        $form = new MudarConceitoForm();
        if($request->isMethod(sfRequest::POST) && $request->hasParameter($form->getName())) {
            $form->bind($request->getParameter($form->getName()));
            if($form->isValid()) {
                try {
                    $form->save();
                    $this->getUser()->setFlash('notice','Conceito trocado');
                } catch (Exception $exc) {
                    $this->getUser()->setFlash('error','Erro ao trocar conceito');
                }
            }
            $this->redirect('historico/index');
        }
        $this->form = $form;
    }

    function executeExportar(sfWebRequest $request) {
        $sf_user = sfContext::getInstance()->getUser();
        $sf_user->getAttribute('historico.filters', array(), 'admin_module');
        $this->filters = $this->configuration->getFilterForm($this->getFilters());
        $criteria = $this->filters->buildCriteria($this->getFilters());
        $ofertas = TbhistoricoPeer::doSelect($criteria);
        $request->setAttribute('list', $ofertas);

        $request->setAttribute('show_fields', array('matricula','Tbaluno','Tbperiodo','Tbdisciplina','carater','media','faltas','Tbconceito'));
        $this->forward('exportar', 'Exportar');
    }
}
