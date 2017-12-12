<?php

require_once dirname(__FILE__) . '/../lib/cursoGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/cursoGeneratorHelper.class.php';

/**
 * curso actions.
 *
 * @package    derca
 * @subpackage curso
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class cursoActions extends autoCursoActions {

    function executeExportar(sfWebRequest $request) {
        $sf_user = sfContext::getInstance()->getUser();
        $sf_user->getAttribute('curso.filters', array(), 'admin_module');
        $this->filters = $this->configuration->getFilterForm($this->getFilters());
        $criteria = $this->filters->buildCriteria($this->getFilters());
        $profs = TbcursoPeer::doSelect($criteria);
        $request->setAttribute('list', $profs);

        $request->setAttribute('show_fields', array('codCurso','descricao','sucinto','centro','Tbcursonivel'));
        $this->forward('exportar', 'Exportar');
    }

}
