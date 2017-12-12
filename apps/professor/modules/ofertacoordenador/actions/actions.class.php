<?php

require_once dirname(__FILE__) . '/../lib/ofertacoordenadorGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/ofertacoordenadorGeneratorHelper.class.php';
require dirname(__FILE__) . '/../../../../../lib/vendor/symfony/lib/helper/PartialHelper.php';

/**
 * ofertacoordenador actions.
 *
 * @package    derca
 * @subpackage ofertacoordenador
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class ofertacoordenadorActions extends autoOfertacoordenadorActions {

    public function executeExport(sfWebRequest $request) {
        $this->professor = sfContext::getInstance()->getUser()->getAttribute('professor');

        $periodo = $request->getGetParameter('id_periodo');
        if (!isset($periodo)) {
            $per = TbperiodoPeer::getSemestreAtualOfertaCadastro($this->professor);
            if (isset($per)) {
                $periodo = $per->getIdPeriodo();
            }
        }

        $criteria = new Criteria();
        $criteria->add(TbofertaPeer::ID_PERIODO, $periodo);
        $criteria->add(TbofertaPeer::COD_CURSO, $this->professor->getCodCurso());
        $criteria->addAscendingOrderByColumn(TbofertaPeer::COD_DISCIPLINA);
        $criteria->addAscendingOrderByColumn(TbofertaPeer::TURMA);

        $this->list = TbofertaPeer::doSelect($criteria);
        $this->setLayout('relatorio');
    }

    public function executeAnterior(sfWebRequest $request) {
        $this->professor = sfContext::getInstance()->getUser()->getAttribute('professor');

        $criteria = new Criteria();
        $criteria->addJoin(TbperiodoPeer::ID_PERIODO, TbofertaPeer::ID_PERIODO);
        $criteria->add(TbofertaPeer::COD_CURSO, $this->professor->getCodCurso());
        $criteria->setDistinct();

        $this->periodos = TbperiodoPeer::doSelect($criteria);
    }

    public function executeChecaHorario(sfWebRequest $request) {
        $horario = new Tbofertahorario();
        $tboferta = TbofertaPeer::retrieveByPK(sfContext::getInstance()->getUser()->getAttribute('id_oferta'));
        $horario->setIdOferta(sfContext::getInstance()->getUser()->getAttribute('id_oferta'));
        $horario->setHoraInicio(strtotime($request->getParameter('hora_inicio') . ':' . $request->getParameter('minuto_inicio')));
        $horario->setHoraFim(strtotime($request->getParameter('hora_fim') . ':' . $request->getParameter('minuto_fim')));
        $horario->setDia($request->getParameter('dia'));
        if ($tboferta->verificaHorario($horario)) {
            return $this->renderText('True');
        } else {
            return $this->renderText('False');
        }
    }

    public function executeReturnErro(sfWebRequest $request) {
        return $this->renderText(get_partial('erro'));
    }

    public function executeIndex(sfWebRequest $request) {

        // sorting
        if ($request->getParameter('sort') && $this->isValidSortColumn($request->getParameter('sort'))) {
            $this->setSort(array($request->getParameter('sort'), $request->getParameter('sort_type')));
        }

        // pager
        if ($request->getParameter('page')) {
            $this->setPage($request->getParameter('page'));
        }

        $this->pager = $this->getPager();
        $this->sort = $this->getSort();
        sfContext::getInstance()->getUser()->setAttribute('oferta_horario_erro', null);

        $professor = sfContext::getInstance()->getUser()->getAttribute('professor');
        $per = TbperiodoPeer::getSemestreAtualOfertaCadastro($professor);
        if (!isset($per)) {
            $this->forward('ofertacoordenador','anterior');
        }
        $this->per = $per;
    }

    public function executeNew(sfWebRequest $request) {

        if (TbperiodoPeer::getSemestreAtualOfertaCadastro(sfContext::getInstance()->getUser()->getAttribute('professor')) == null) {
            $this->setTemplate('OfertaOut');
        }

        $this->tboferta = new tboferta();
        $form = new TbofertaForm($this->tboferta);

        $this->form = $form;
    }

    public function executeRemoveHorario(sfWebRequest $request) {
        $ofertahorario = TbofertahorarioPeer::retrieveByPK($request->getParameter('idHorario'));
        $oferta = $ofertahorario->getTboferta();
        $ofertahorario->delete();
        sfContext::getInstance()->getUser()->setAttribute('oferta_horario_erro', null);
        return $this->renderText(get_partial('horario_oferta', array('tboferta' => $oferta)));
//        return $this;
    }

    public function executeAdicionaHorario(sfWebRequest $request) {
        $horario = new Tbofertahorario();
        $tboferta = TbofertaPeer::retrieveByPK(sfContext::getInstance()->getUser()->getAttribute('id_oferta'));
        $horario->setIdOferta(sfContext::getInstance()->getUser()->getAttribute('id_oferta'));
        $horario->setHoraInicio(strtotime($request->getParameter('hora_inicio') . ':' . $request->getParameter('minuto_inicio')));
        $horario->setHoraFim(strtotime($request->getParameter('hora_fim') . ':' . $request->getParameter('minuto_fim')));
        $horario->setDia($request->getParameter('dia'));
        $horario->save();

        sfContext::getInstance()->getUser()->setAttribute('oferta_horario_erro', null);

        return $this->renderText(get_partial('horario_oferta', array('tboferta' => $tboferta)));
    }

    public function executeListAdicionaHorario(sfWebRequest $request) {

        if (TbperiodoPeer::getSemestreAtualOfertaCadastro(sfContext::getInstance()->getUser()->getAttribute('professor')) == null) {
                $this->getUser()->setFlash('error', 'Horário nao pode ser alterado após o inicio das aulas');
                $this->redirect('ofertacoordenador/index');
        }

        $this->oferta = $this->getRoute()->getObject() ? $this->getRoute()->getObject() : TbofertaPeer::retrieveByPK(sfContext::getInstance()->getUser()->getAttribute('id_oferta'));
        sfContext::getInstance()->getUser()->setAttribute('id_oferta', $this->oferta->getIdOferta());
        $this->form = new TbofertahorarioForm();
        $criteria = new Criteria();
        $criteria->add(TbofertaPeer::ID_OFERTA, $this->oferta->getIdOferta());
        $this->form->getWidget('id_oferta')->addOption('criteria', $criteria);
    }

    public function executeEdit(sfWebRequest $request) {

        $limitado = false;
        $criteria = new Criteria();
        if (TbperiodoPeer::getSemestreAtualOfertaCadastro(sfContext::getInstance()->getUser()->getAttribute('professor')) == null) {
            $criteria->add(TbperiodoPeer::DT_INICIO_AJUSTE_RESULTADO, date('Y-m-d'), Criteria::LESS_EQUAL);
            $criteria->add(TbperiodoPeer::ID_NIVEL, sfContext::getInstance()->getUser()->getAttribute('professor')->getTbcurso()->getIdNivel());
            if (TbperiodoPeer::doCount($criteria) > 0) {
                $limitado = true;
            } else {
                $this->setTemplate('OfertaOut');
            }
        }


        $professor = new Tbprofessor();
        $professor = sfContext::getInstance()->getUser()->getAttribute('professor');
        $criteria = new Criteria();
        $criteria->add(TbcursoPeer::COD_CURSO, $professor->getCodCurso());

        $this->tboferta = $this->getRoute()->getObject();

        $form = new TbofertaForm($this->tboferta);
        $form->getWidget('cod_curso')->addOption('criteria', $criteria);
//        if($write==true){
//        $criteria = new Criteria();
//        $criteria->add(TbturnoPeer::ID_TURNO, $this->getRoute()->getObject()->getIdTurno());
//        $form->getWidget('id_turno')->addOption('criteria', $criteria);
//
//        $form->getWidget('turma')->setAttribute('readonly', 'readonly');
//        $form->getWidget('vagas')->setAttribute('readonly', 'readonly');
//
//        $criteria = new Criteria();
//        $criteria->add(TbsetorPeer::ID_SETOR, $this->tboferta->getIdSetor());
//        $form->getWidget('id_setor')->addOption('criteria', $criteria);
//
//        $criteria = new Criteria();
//        $criteria->add(TbofertasituacaoPeer::ID_SITUACAO, $this->tboferta->getIdSituacao());
//        $form->getWidget('id_situacao')->addOption('criteria', $criteria);
//
//        $criteria = new Criteria();
//        $criteria->add(TbdisciplinaPeer::COD_DISCIPLINA, $this->tboferta->getCodDisciplina());
//        $form->getWidget('cod_disciplina')->addOption('criteria', $criteria);

//        }


        $this->form = $form;
    }

    public function buildCriteria() {

        if (null === $this->filters) {
            $this->filters = $this->configuration->getFilterForm($this->getFilters());
        }
        $criteria = new Criteria();
        $criteria = $this->filters->buildCriteria($this->getFilters());
        /** Parte Inserida  para limitas com apenas os alunos do curso dele * */
        $professor = new Tbprofessor();
        $professor = sfContext::getInstance()->getUser()->getAttribute('professor');
//        $criteria->addJoin(TbofertacoordenadorPeer::ID_OFERTA, TbofertaPeer::ID_OFERTA);
//        $criteria->add(TbofertacoordenadorPeer::MATRICULA_PROF, $professor->getMatriculaProf());
        $per = TbperiodoPeer::getSemestreAtualOfertaCadastro($professor);
        if (isset($per)) {
            $criteria->addAnd(TbofertaPeer::ID_PERIODO, $per->getIdPeriodo());
        } else {
            $periodo_dois = TbperiodoPeer::getSemestreAtualOfertaView($professor);
            if (isset($periodo_dois)) {
                $criteria->addAnd(TbofertaPeer::ID_PERIODO, $periodo_dois->getIdPeriodo());
            }
        }
        $criteria->addAnd(TbofertaPeer::COD_CURSO, $professor->getTbcurso()->getCodCurso());
        /** Parte Inserida  para limitas com apenas os alunos do curso dele * */
        $this->addSortCriteria($criteria);

        $event = $this->dispatcher->filter(new sfEvent($this, 'admin.build_criteria'), $criteria);
        $criteria = $event->getReturnValue();

        return $criteria;
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {

            $professor = new Tbprofessor();
            $professor = sfContext::getInstance()->getUser()->getAttribute('professor');


            if ($form->getObject()->isNew()) {
                $tboferta = $form->save();
                $tbofertaCoordenador = new Tbofertacoordenador();
                $tbofertaCoordenador->setIdOferta($tboferta->getIdOferta());
                $tbofertaCoordenador->setMatriculaProf($professor->getMatriculaProf());
                $tbofertaCoordenador->save();
            } else {
                $tboferta = $form->save();
            }


            $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $tboferta)));

            if ($request->hasParameter('_save_and_add')) {
                $this->getUser()->setFlash('notice', $notice . ' You can add another one below.');

                $this->redirect('@tboferta_new');
            } else {

                $this->redirect('ofertacoordenador/index');
            }
        } else {
            $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
        }
    }

    public function executeOfertaAnteriores(sfRequest $request) {


        if ($request->getMethod() == 'POST') {

            $criteria = new Criteria();
            $criteria->add(TbofertaPeer::ID_PERIODO, $request->getParameter('id_periodo'));
            $criteria->add(TbofertaPeer::ID_SETOR, $request->getParameter('id_setor'));
            $this->professor = sfContext::getInstance()->getUser()->getAttribute('professor');
            $this->pager = $this->configuration->getPager('tboferta');
            $this->pager->setCriteria($criteria);
            $this->pager->setPage($this->getPage());
            $this->pager->setPeerMethod($this->configuration->getPeerMethod());
            $this->pager->setPeerCountMethod($this->configuration->getPeerCountMethod());
            $this->pager->init();
            $this->setTemplate('export');
            $this->setLayout(false);
        } else {
            $this->form = new OfertaAnterioresForm();
        }
    }

    public function executeDelete(sfWebRequest $request) {
        $request->checkCSRFProtection();


        if (TbperiodoPeer::getSemestreAtualOfertaCadastro(sfContext::getInstance()->getUser()->getAttribute('professor')) == null) {
            $this->getUser()->setFlash('error', 'Oferta não pode ser removida após o inicio das aulas');
            $this->redirect('ofertacoordenador/index');
        }
        $this->dispatcher->notify(new sfEvent($this, 'admin.delete_object', array('object' => $this->getRoute()->getObject())));

        $this->getRoute()->getObject()->delete();

        $this->getUser()->setFlash('notice', 'The item was deleted successfully.');

        $this->redirect('@tboferta');
    }

    public function executeViewAlunos(sfWebRequest $request) {
        $id_oferta = $request->getParameter('id_oferta');

        $criteria = new Criteria();
        $criteria->addJoin(TbfilaPeer::MATRICULA, TbalunoPeer::MATRICULA);
        $criteria->add(TbfilaPeer::ID_OFERTA, $id_oferta);
        $criteria->addAscendingOrderByColumn(TbfilaPeer::ID_SITUACAO);
        $criteria->addAscendingOrderByColumn(TbalunoPeer::NOME);

        $this->list = TbfilaPeer::doSelectJoinTbaluno($criteria);
        $this->oferta = TbofertaPeer::retrieveByPK($id_oferta);

        $this->setLayout('relatorio');
    }

}
