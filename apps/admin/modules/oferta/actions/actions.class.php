<?php

require_once dirname(__FILE__).'/../lib/ofertaGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/ofertaGeneratorHelper.class.php';

/**
 * oferta actions.
 *
 * @package    derca
 * @subpackage oferta
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class ofertaActions extends autoOfertaActions {

    function executeBatchPutCalouros(sfWebRequest $request) {

        $request->setAttribute('ids', $request->getParameter('ids'));
        $this->forward('oferta', 'putCalourosForm');
    }

    function executePutCalourosForm(sfWebRequest $request) {

        $this->ids = $request->getAttribute('ids');
        $form = new PutCalourosForm();
        if ($request->isMethod(sfRequest::POST) && $request->hasParameter($form->getName())) {
            $form->bind($request->getParameter($form->getName()));

            if ($form->isValid()) {
                try {
                    $form->save();
                    $this->getUser()->setFlash('notice', 'Cadastrados como disciplinas de calouros!');
                } catch (Exception $exc) {
                    $this->getUser()->setFlash('error', 'Erro durante a operação!');
                }
                $this->redirect('oferta/index');
            }
        }
        $this->setTemplate('Form');
        $this->form = $form;
    }

    function executeBatchCriaTurma(sfWebRequest $request) {
        $i =0;
        foreach (TbofertaPeer::retrieveByPKs($request->getParameter('ids') ) as $oferta){         
            try{
            $oferta->criaTurma();
            $i++;
            }  catch (Exception $ex){
                
            }
        }
        $this->getUser()->setFlash('notice','Turmas criadas: '.$i);
        $this->redirect('oferta/index');

    }



    function executeOfertas(sfWebRequest $request){
        $form = new TbofertaForm();
        $form->mergeForm(new TbofertaForm());
        $this->form = $form;
        
//        $this->redirect('oferta/new');
        
    }

    function executeListCriaTurma(sfWebRequest $request){
        $oferta = TbofertaPeer::retrieveByPK($request->getParameter('id_oferta'));
        $oferta->criaTurma();
        $this->redirect('oferta/index');

    }

    function executeExportar(sfWebRequest $request) {
        $sf_user = sfContext::getInstance()->getUser();
        $sf_user->getAttribute('oferta.filters', array(), 'admin_module');
        $this->filters = $this->configuration->getFilterForm($this->getFilters());
        $criteria = $this->filters->buildCriteria($this->getFilters());
        $ofertas = TbofertaPeer::doSelect($criteria);
        $request->setAttribute('list', $ofertas);

        $request->setAttribute('show_fields', array('Tbperiodo','codDisciplina','turma','Tbdisciplina','Tbofertahorarios','vagas','solicitacoesAceitas','solicitacoes','Tbprofessor','tbofertasituacao'));
        $this->forward('exportar', 'Exportar');
    }
    
}
