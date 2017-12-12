<?php

/**
 * grade actions.
 *
 * @package    derca
 * @subpackage grade
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class gradeActions extends sfActions {


    public function preExecute() {
        $this->aluno = $this->getUser()->getAttribute('aluno');
        $this->forward404Unless($this->aluno);
    }

    public function executeIndex(sfWebRequest $request) {
        $this->tbcursoversao = $this->aluno->getTbcursoversao();
        $criteria = new Criteria();
        $criteria->add(TbcurriculodisciplinasPeer::ID_VERSAO_CURSO,$this->aluno->getIdVersaoCurso());
        $criteria->add(TbcurriculodisciplinasPeer::ID_CARATER,1);
        $criteria->addAscendingOrderByColumn(TbcurriculodisciplinasPeer::SEMESTRE_DISCIPLINA);
        $criteria->addAscendingOrderByColumn(TbdisciplinaPeer::COD_DISCIPLINA);
        $this->Tbcurriculodisciplinass = TbcurriculodisciplinasPeer::doSelectJoinTbdisciplina($criteria);
        $this->aluno_disciplinas_cursadas = $this->aluno->getDisciplinasCursadas();
        $this->aluno =  $this->getUser()->getAttribute('aluno');

    }

    public function executeImprimir(sfWebRequest $request) {
        $this->executeIndex($request);
        $this->setTemplate('index');
        $this->setLayout(false);

    }

    public function executeACursar(sfWebRequest $request){
        $this->tbcursoversao = $this->aluno->getTbcursoversao();
//        $this->aluno = new Tbaluno();
        $criteria = new Criteria();
        $criteria->add(TbcurriculodisciplinasPeer::ID_VERSAO_CURSO,$this->aluno->getIdVersaoCurso());
        $criteria->addAscendingOrderByColumn(TbcurriculodisciplinasPeer::SEMESTRE_DISCIPLINA);
        $criteria->add(TbcurriculodisciplinasPeer::ID_CARATER,1);
        $criteria->addAscendingOrderByColumn(TbdisciplinaPeer::COD_DISCIPLINA);
        $criteria->add(TbcurriculodisciplinasPeer::COD_DISCIPLINA,  $this->aluno->getDisciplinasCursadas(), Criteria::NOT_IN);
        $this->Tbcurriculodisciplinass = TbcurriculodisciplinasPeer::doSelectJoinTbdisciplina($criteria);
    }

}
