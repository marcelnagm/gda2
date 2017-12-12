<?php

require_once dirname(__FILE__) . '/../lib/instexternaGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/instexternaGeneratorHelper.class.php';

/**
 * instexterna actions.
 *
 * @package    derca
 * @subpackage instexterna
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class instexternaActions extends autoInstexternaActions {

    function executeExportar(sfWebRequest $request) {
        $sf_user = sfContext::getInstance()->getUser();
        $sf_user->getAttribute('instexterna.filters', array(), 'admin_module');
        $this->filters = $this->configuration->getFilterForm($this->getFilters());
        $criteria = $this->filters->buildCriteria($this->getFilters());
        $ies = TbinstexternaPeer::doSelect($criteria);
        $request->setAttribute('list', $ies);

        $request->setAttribute('show_fields', array('descricao','sucinto','uf'));
        $this->forward('exportar', 'Exportar');
    }

}
