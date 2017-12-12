<?php

require_once dirname(__FILE__) . '/../lib/disciplinaGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/disciplinaGeneratorHelper.class.php';

/**
 * disciplina actions.
 *
 * @package    derca
 * @subpackage disciplina
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class disciplinaActions extends autoDisciplinaActions {

    public function executeListTrocaCodigo(sfRequest $request) {

        $this->disciplina = TbdisciplinaPeer::retrieveByPK($request->getParameter('cod_disciplina'));
    }

    public function executeTrocaCodigo(sfRequest $request) {
        if ($request->getMethod() == 'POST') {
            $criteria = new Criteria();
            $criteria->add(TbdisciplinaPeer::COD_DISCIPLINA, $request->getParameter('cod_disciplina_novo'));
            if (TbdisciplinaPeer::doCount($criteria) == 0) {
                try {
                    $con = Propel::getConnection();
                    $con->beginTransaction();
                    TbdisciplinaPeer::retrieveByPK($request->getParameter('cod_disciplina_original'))->setCodDisciplina($request->getParameter('cod_disciplina_novo'));
                    $this->message = 'A disciplina foi trocado o código de ' . $request->getParameter('cod_disciplina_original') . '->' . $request->getParameter('cod_disciplina_novo');
                    $con->commit();
                } catch (Exception $ex) {
                    $con->rollBack();
                    $this->exception = $ex->getMessage();
                }
            } else {
                $this->exception = 'O sistema já possui um disciplina cadastrada com este código, disciplina - ' . TbdisciplinaPeer::retrieveByPK($request->getParameter('cod_disciplina_novo'))->getDescricao();
            }
        } else {
            $this->redirect('disciplina/index');
        }
    }

    function executeExportar(sfWebRequest $request) {
        $sf_user = sfContext::getInstance()->getUser();
        $sf_user->getAttribute('disciplina.filters', array(), 'admin_module');
        $this->filters = $this->configuration->getFilterForm($this->getFilters());
        $criteria = $this->filters->buildCriteria($this->getFilters());
        $disciplinas = TbdisciplinaPeer::doSelect($criteria);
        $request->setAttribute('list', $disciplinas);

        $request->setAttribute('show_fields', array('CodDisciplina', 'descricao', 'ch', 'ChTeorica', 'ChPratica', 'inicio', 'termino', 'Tbdisciplinasituacao'));
        $this->forward('exportar', 'Exportar');
    }

}
