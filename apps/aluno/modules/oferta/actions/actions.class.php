<?php

/**
 * oferta actions.
 *
 * @package    derca
 * @subpackage oferta
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ofertaActions extends sfActions {

    protected $aluno = null;

//    public function preExecute() {
//        $this->aluno = $this->getUser()->getAttribute('aluno');
//        $this->forward404Unless($this->aluno);
//    }

    public function executeIndex(sfWebRequest $request) {
        try {
            if ($this->getUser()->hasAttribute('aluno')) {
                $aluno = TbalunoPeer::retrieveByPK($this->getUser()->getAttribute('aluno')->getMatricula());
                $this->periodo = TbperiodoPeer::getSemestreAtualOferta($aluno);
                $p_fila = TbperiodoPeer::getSemestreAtualFila($aluno);
                if (!isset($p_fila)) {
                    $this->fila_allow = false;
                } else {
                    $this->fila_allow = true;
                }
            } else {
                $this->periodo = TbperiodoPeer::getSemestreAtualOferta();
                $this->fila_allow = false;
            }

            if (!isset($this->periodo)) {
                $request->setParameter('message', 'Oferta de Disciplina não disponivel');
                $this->forward('aviso', 'Out');
            }

//        if (($this->periodo->getDtInicioOferta('d-m-Y') < date('d-m-Y'))) {
//            $request->setParameter('message', 'Oferta de Disciplina não disponivel');
//            $this->forward('aviso', 'Out');
//        }

            $this->form = new OfertaAlunoFilterForm();
            if ($this->getUser()->hasAttribute('oferta.filter')) {
                $formValues = $this->getUser()->getAttribute('oferta.filter');
                $this->form->setDefaults($formValues);
            }

            //filtrar por codigo de disciplina quando tiver o parametro cod_disc
            if ($request->hasParameter('cod_disc')) {
                $formValues = array('num_campo' => '3', 'filtro' => array($request->getParameter('cod_disc')));
//                $this->form->setDefaults($formValues);
            }

            //filtrar por semestre quando tiver o parametro semestre
            if ($request->hasParameter('semestre')) {
                $criteria = new Criteria();
                $criteria->add(TbcurriculodisciplinasPeer::ID_VERSAO_CURSO, $aluno->getIdVersaoCurso());
                $criteria->add(TbcurriculodisciplinasPeer::ID_CARATER, 1);
                $criteria->add(TbcurriculodisciplinasPeer::SEMESTRE_DISCIPLINA, $request->getParameter('semestre'));
                $array = array();
                foreach (TbcurriculodisciplinasPeer::doSelect($criteria) as $disc) {
                    $array[] = $disc->getCodDisciplina();
                }
                $formValues = array('num_campo' => '3', 'filtro' => $array);
//                $this->form->setDefaults($formValues);
            }

            # filtrar por data
            $criteria = new Criteria();
            $criteria->add(TbofertaPeer::ID_PERIODO, $this->periodo->getIdPeriodo());
            if ($this->getUser()->hasAttribute('aluno')) {
                $criteria->add(TbofertaPeer::ID_POLO, $this->getUser()->getAttribute('aluno')->getIdPolo());
            }

//        $criteria->add(TbofertaPeer::ID_SITUACAO, array(1,4), Criteria::IN);
            $criteria->add(TbofertaPeer::ID_SITUACAO, array(1), Criteria::IN);

            if ($this->periodo->getDtFimCadastro('d-m-Y') > date('d-m-Y')) {
//        $criteria->add(TbofertaPeer::TURMA, 'CAL%' , Criteria::NOT_LIKE);
            }
            $criteria->addJoin(TbofertaPeer::ID_MATRICULA_PROF, TbprofessorPeer::MATRICULA_PROF);
            $criteria->addJoin(TbofertaPeer::COD_DISCIPLINA, TbdisciplinaPeer::COD_DISCIPLINA);
            $criteria->addJoin(TbofertaPeer::ID_POLO, TbpolosPeer::ID_POLO);

            $criteria->addAscendingOrderByColumn(TbofertaPeer::COD_DISCIPLINA);

            if (isset($formValues)) {
                switch ($formValues['num_campo']) {
                    case 1:
                        $criteria->add(TbofertaPeer::COD_DISCIPLINA, '%' . $formValues['filtro'] . '%', Criteria::LIKE);
                        break;
                    case 2:
                        $criteria->add(TbdisciplinaPeer::DESCRICAO, '%' . $formValues['filtro'] . '%', Criteria::LIKE);
                        break;
                    case 3:
                        $criteria->add(TbofertaPeer::COD_DISCIPLINA, $formValues['filtro'], Criteria::IN);
                        break;
                }
            }

            $pager = new sfPropelPager('Tboferta', 20);
            $pager->setCriteria($criteria);
            $pager->setPage($this->getRequestParameter('page', 1));
            $pager->init();
            $this->pager = $pager;
            if (!$this->getUser()->hasAttribute('aluno')) {
                $this->setLayout('noheader');
            }
        } catch (Exception $ex) {
//            $message = sfContext::getInstance()->getMailer()->compose('erros@derca.ufrr.br', 'marcel@derca.ufrr.br', 'Abrir Oferta',
//                            'Erro ao abrir oferta - matrícula: ' . $this->getUser()->getAttribute('aluno')->getMatricula().
//                            '\nException: '.$ex
//            );
//            sfContext::getInstance()->getMailer()->send($message);
        }
    }

    public function executeFilter(sfWebRequest $request) {

        if ($request->hasParameter('reset')) {
            $this->getUser()->setAttribute('oferta.filter', null);
            $this->redirect('oferta/index');
        }

        if ($request->isMethod('POST')) {
            $form = new OfertaAlunoFilterForm();
            $form->bind($request->getParameter($form->getName()));

            if ($form->isValid()) {
                $this->getUser()->setAttribute('oferta.filter', $form->getValues());
            }
            $this->redirect('oferta/index');
        }
    }

}
