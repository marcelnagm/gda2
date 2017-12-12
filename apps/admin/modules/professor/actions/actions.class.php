<?php

require_once dirname(__FILE__) . '/../lib/professorGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/professorGeneratorHelper.class.php';

/**
 * professor actions.
 *
 * @package    derca
 * @subpackage professor
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class professorActions extends autoProfessorActions {

    function executeShow(sfWebRequest $request) {
        $this->forward404Unless($pk = $request->getParameter('matricula_prof'));
        $this->tbprofessor = TbprofessorPeer::retrieveByPK($pk);
    }

    function executeListTrocarCoordenador(sfWebRequest $request) {
        if ($request->isMethod('POST')) {
            $form = new TrocarCoordenadorForm();

            TbprofessorPeer::retrieveByPK($request->getParameter('matricula_prof_antigo'))->TrocarCoordenador($request->getParameter('matricula_prof'));
        } else {
            $form = new TrocarCoordenadorForm();
            $form->setMatriculaProf($request->getParameter('matricula_prof'));
            $form->configure();
            $this->form = $form;
        }
    }


    function executeExportar(sfWebRequest $request) {
        $sf_user = sfContext::getInstance()->getUser();
        $sf_user->getAttribute('professor.filters', array(), 'admin_module');
        $this->filters = $this->configuration->getFilterForm($this->getFilters());
        $criteria = $this->filters->buildCriteria($this->getFilters());
        $profs = TbprofessorPeer::doSelect($criteria);
        $request->setAttribute('list', $profs);

        $request->setAttribute('show_fields', array('matriculaProf','siape','nome','email','foneResidencial','celular','Tbcurso','Tbsetor','Tbproftipovinculo','Tbprofessorsituacao'));
        $this->forward('exportar', 'Exportar');
    }

}
