<?php

require_once dirname(__FILE__) . '/../lib/curriculodisciplinasGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/curriculodisciplinasGeneratorHelper.class.php';

/**
 * curriculodisciplinas actions.
 *
 * @package    derca
 * @subpackage curriculodisciplinas
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class curriculodisciplinasActions extends autoCurriculodisciplinasActions {

    function executeExportar(sfWebRequest $request) {
        $sf_user = sfContext::getInstance()->getUser();
        $sf_user->getAttribute('curriculodisciplinas.filters', array(), 'admin_module');
        $this->filters = $this->configuration->getFilterForm($this->getFilters());
        $criteria = $this->filters->buildCriteria($this->getFilters());
        $profs = TbcurriculodisciplinasPeer::doSelect($criteria);
        $request->setAttribute('list', $profs);

        $request->setAttribute('show_fields', array('Tbcursoversao','Tbdisciplina','semestreDisciplina','Tbcarater'));
        $this->forward('exportar', 'Exportar');
    }

}
