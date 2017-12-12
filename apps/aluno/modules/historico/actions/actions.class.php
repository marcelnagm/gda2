<?php

/**
 * historico actions.
 *
 * @package    derca
 * @subpackage historico
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class historicoActions extends sfActions {

    public function preExecute() {
        $this->aluno = $this->getUser()->getAttribute('aluno');
        $this->forward404Unless($this->aluno);
    }

    public function executeIndex(sfWebRequest $request) {
        $this->historicos = TbhistoricoPeer::doSelectJoinTbdisciplina($this->getCriteriaHistoricos());
    }

    public function executeImprimir(sfWebRequest $request) {
        $this->setLayout('imprimir');
        $this->historicos = TbhistoricoPeer::doSelectJoinTbdisciplina($this->getCriteriaHistoricos());
    }

    public function getCriteriaHistoricos() {
        $criteria = new criteria();
        $criteria->add(TbhistoricoPeer::MATRICULA,$this->aluno->getMatricula());
        $criteria->addJoin(TbhistoricoPeer::ID_PERIODO,TbperiodoPeer::ID_PERIODO);
        $criteria->addDescendingOrderByColumn(TbperiodoPeer::ANO);
        $criteria->addDescendingOrderByColumn(TbperiodoPeer::SEMESTRE);
        $criteria->addDescendingOrderByColumn(TbperiodoPeer::PERIODO);
        return $criteria;
    }

}
