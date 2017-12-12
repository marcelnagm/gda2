<?php

/**
 * turmacoordenador actions.
 *
 * @package    derca
 * @subpackage turmacoordenador
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class turmacoordenadorActions extends sfActions {

    public function executeIndex(sfWebRequest $request) {
        $this->professor = sfContext::getInstance()->getUser()->getAttribute('professor');

        $criteria = new Criteria();
        $criteria->addJoin(TbperiodoPeer::ID_PERIODO, TbofertaPeer::ID_PERIODO);
        $criteria->addJoin(TbturmaPeer::ID_OFERTA, TbofertaPeer::ID_OFERTA);
        $criteria->add(TbofertaPeer::COD_CURSO, $this->professor->getCodCurso());
        $criteria->setDistinct();

        $this->periodos = TbperiodoPeer::doSelect($criteria);
    }

    private function getTbturma($id) {
        $c = new Criteria();
        $c->add(TbturmaPeer::ID_TURMA, $id);
        return TbturmaPeer::doSelectOne($c);
    }

    public function executePeriodo(sfWebRequest $request) {
        $professor = $this->getUser()->getAttribute('professor');

        $periodo = $request->getGetParameter('id_periodo');
        if (!isset($periodo)) {
            $per = TbperiodoPeer::getSemestreAtualOfertaCadastro($this->professor);
            if (isset($per)) {
                $periodo = $per->getIdPeriodo();
            }
        }

        $criteria = new Criteria();
        $criteria->addJoin(TbturmaPeer::ID_OFERTA, TbofertaPeer::ID_OFERTA);
        $criteria->add(TbofertaPeer::COD_CURSO, $professor->getCodCurso());
        $criteria->add(TbofertaPeer::ID_PERIODO, $periodo);
        $criteria->addAscendingOrderByColumn(TbofertaPeer::COD_DISCIPLINA);
        $criteria->addAscendingOrderByColumn(TbofertaPeer::TURMA);

        $this->tbturmasfinalized = TbturmaPeer::doSelect($criteria);
        $this->periodo = TbperiodoPeer::retrieveByPK($periodo);
    }

    public function executeContato(sfWebRequest $request) {

        $this->tbturma = $this->getTbturma($request->getParameter('id'));
        $this->tbturmaAlunos = $this->tbturma->getTbturmaAlunos();
        $this->setLayout(false);
    }

    public function executeNotas(sfWebRequest $request) {

        if ($request->getParameter('layout') == 'impressao') {
            $this->setTemplate('notasImprimir');
            $this->setLayout(false);
        }

        $this->tbturma = $this->getTbturma($request->getParameter('id'));

        $this->forward404If($this->tbturma->getNotasNoHistorico() && $request->getParameter('layout') != 'impressao');

        $this->tbturmaAlunos = $this->tbturma->getListTbturmaAlunos();

        $notaAlunos = array();

        foreach ($this->tbturmaAlunos as $ta) {
            $notas = $ta->getTbturmaNotas();
            foreach ($notas as $n) {
                $notaAlunos[$n->getIdAluno()][$n->getNNota()] = $n->getValor();
            }
        }

        $this->notas = $notaAlunos;

        #$this->setTemplate('notasOut');
    }

    public function executeImprimir(sfWebRequest $request) {

        $this->setLayout(false);

        $c = new Criteria();
        $c->add(TbturmaSumulaPeer::ID_TURMA, $request->getParameter('id'));
        $c->addAscendingOrderByColumn(TbturmaSumulaPeer::DATA);
        $this->TbturmaSumulas = TbturmaSumulaPeer::doSelect($c);
    }

}
