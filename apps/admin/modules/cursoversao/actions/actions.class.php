<?php

require_once dirname(__FILE__) . '/../lib/cursoversaoGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/cursoversaoGeneratorHelper.class.php';

/**
 * cursoversao actions.
 *
 * @package    derca
 * @subpackage cursoversao
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class cursoversaoActions extends autoCursoversaoActions {

    function executeExportar(sfWebRequest $request) {
        $sf_user = sfContext::getInstance()->getUser();
        $sf_user->getAttribute('cursoversao.filters', array(), 'admin_module');
        $this->filters = $this->configuration->getFilterForm($this->getFilters());
        $criteria = $this->filters->buildCriteria($this->getFilters());
        $profs = TbcursoversaoPeer::doSelect($criteria);
        $request->setAttribute('list', $profs);

        $request->setAttribute('show_fields', array('IdVersaoCurso','descricao','Tbcurso','situacao','chObr','chEletiva','chTotal','prazoMin','prazoMax','Tbturno','semestreInicio'));

        $this->forward('exportar', 'Exportar');
    }

}
