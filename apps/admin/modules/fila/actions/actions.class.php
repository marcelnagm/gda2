<?php

require_once dirname(__FILE__) . '/../lib/filaGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/filaGeneratorHelper.class.php';

/**
 * fila actions.
 *
 * @package    derca
 * @subpackage fila
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class filaActions extends autoFilaActions {

    function executeInsereMuitos(sfWebRequest $request) {
        $this->forward('fila', 'InsereMuitosForm');
    }

    function executeMudarSituacao(sfWebRequest $request) {

        $request->setAttribute('ids', $request->getParameter('ids'));
        $this->forward('fila', 'mudarSituacaoForm');
    }

    function executeMudarOferta(sfWebRequest $request) {

        $request->setAttribute('ids', $request->getParameter('ids'));
        $this->forward('fila', 'mudarOfertaForm');
    }

    function executeBatchMudarSituacao(sfWebRequest $request) {

        $request->setAttribute('ids', $request->getParameter('ids'));
        $this->forward('fila', 'mudarSituacaoForm');
    }

    function executeBatchMudarOferta(sfWebRequest $request) {

        $request->setAttribute('ids', $request->getParameter('ids'));
        $this->forward('fila', 'mudarOfertaForm');
    }

    function executeMudarSituacaoForm(sfWebRequest $request) {

        $this->ids = $request->getAttribute('ids');
        $form = new MudarSituacaoForm();

        if ($request->isMethod(sfRequest::POST) && $request->hasParameter($form->getName())) {

            $form->bind($request->getParameter($form->getName()));

            if ($form->isValid()) {
                try {
                    $form->save();
                    $this->getUser()->setFlash('notice', 'Situação trocada');
                } catch (Exception $exc) {
                    $this->getUser()->setFlash('error', 'Erro ao trocar situação:' . $exc->getMessage());
                }
            }
            $this->redirect('fila/index');
        }

        $this->form = $form;
    }

    function executeInsereMuitosForm(sfWebRequest $request) {

        $this->ids = $request->getAttribute('ids');
        $form = new InsereMuitosForm();

        if ($request->isMethod(sfRequest::POST) && $request->hasParameter($form->getName())) {

            $form->bind($request->getParameter($form->getName()));

            if ($form->isValid()) {
                try {
                    $form->save();
                    $this->getUser()->setFlash('notice', 'Filas adicionadas!');
                } catch (Exception $exc) {
                    $this->getUser()->setFlash('error', 'Erro ao executar:' . $exc->getMessage());
                }
            }
            $this->redirect('fila/index');
        }

        $this->form = $form;
    }

    function executeMudarOfertaForm(sfWebRequest $request) {

        $this->ids = $request->getAttribute('ids');
        $form = new MudarOfertaForm();

        if ($request->isMethod(sfRequest::POST) && $request->hasParameter($form->getName())) {

            $form->bind($request->getParameter($form->getName()));

            if ($form->isValid()) {
                try {
                    $form->save();
                    $this->getUser()->setFlash('notice', 'Situação trocada');
                } catch (Exception $exc) {
                    $this->getUser()->setFlash('error', 'Erro ao trocar situação:' . $exc->getMessage());
                }
            }
            $this->redirect('fila/index');
        }

        $this->form = $form;
    }

    function executeProcessosForm(sfWebRequest $request) {

        $form = new FilaProcessosForm();

        if ($request->isMethod(sfRequest::POST)) {
            $form->bind($request->getParameter($form->getName()));
            if ($form->isValid()) {
                try {
                    $values = $form->getValues();

                    if (count($values['executar_processos'])) {
                        TbfilaPeer::processarFilaPorPeriodo($values['id_periodo'], $values['executar_processos'], $values['fase']);
                    }

                    $con = Propel::getConnection();
                    $sql = "SELECT count(tbfila.id_situacao) as contador, fs.descricao FROM tbfila
                            JOIN tbfilasituacao fs USING (id_situacao)
                            JOIN tboferta USING (id_oferta)
                            WHERE id_periodo = ? GROUP BY tbfila.id_situacao, fs.descricao,fs.id_situacao ORDER BY fs.descricao;
                            ";
                    $stmt = $con->prepare($sql);
                    $stmt->bindValue(1, $values['id_periodo']);

                    $stmt->execute();
                    $this->resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

//                    $this->getUser()->setFlash('notice','Processos executados');
                } catch (Exception $exc) {
                    $this->getUser()->setFlash('error', $exc->getMessage());
                }
            }
        }
        $this->form = $form;
    }

    function executeExportar(sfWebRequest $request) {
        $sf_user = sfContext::getInstance()->getUser();
        $sf_user->getAttribute('fila.filters', array(), 'admin_module');
        $this->filters = $this->configuration->getFilterForm($this->getFilters());
        $criteria = $this->filters->buildCriteria($this->getFilters());
        $disciplinas = TbfilaPeer::doSelect($criteria);
        $request->setAttribute('list', $disciplinas);

        $request->setAttribute('show_fields', array('matricula', 'Tbaluno', 'Tboferta', 'Tbfilasituacao', 'createdBy', 'createdAt', 'updatedBy', 'updatedAt'));
        $this->forward('exportar', 'Exportar');
    }

    function executeVerificaTrancamento(sfWebRequest $request) {
        $form = new VerificaTrancamentoForm();
        if ($request->isMethod('POST')) {
            $form->bind($request->getParameter($form->getName()));
            if ($form->isValid()) {
                $values = $form->getValues();
                $periodo = $values['periodo'];

                $criteria = new Criteria();
                $criteria->addJoin(TbfilaPeer::ID_OFERTA, TbofertaPeer::ID_OFERTA);
                $criteria->add(TbofertaPeer::COD_DISCIPLINA, 'ST999');
                $criteria->addAnd(TbofertaPeer::ID_PERIODO, $periodo);
                foreach (TbfilaPeer::doSelect($criteria) as $vars) {
                    $c = new Criteria();
                    $c->addJoin(TbfilaPeer::ID_OFERTA, TbofertaPeer::ID_OFERTA);
                    $c->add(TbfilaPeer::MATRICULA, $vars->getMatricula());
                    $c->addAnd(TbofertaPeer::ID_PERIODO, $periodo);
                    foreach (TbfilaPeer::doSelect($criteria) as $v) {
                        if ($v->getTboferta()->getCodDisciplina() != 'ST999') {
                            $v->setIdSituacao('12');
                            $v->save();
                        }
                    }
                }
            }
            $this->redirect('fila/index');
        } else {
            $this->form = $form;
        }
    }
    
    function executeTrancamentoRemove(sfWebRequest $request) {
        $form = new TrancamentoRemoveForm();
        if ($request->isMethod('POST')) {
            $form->bind($request->getParameter($form->getName()));
            if ($form->isValid()) {
                $values = $form->getValues();
                $periodo = $values['periodo'];

                $criteria = new Criteria();
                $criteria->addJoin(TbfilaPeer::ID_OFERTA, TbofertaPeer::ID_OFERTA);
                $criteria->addJoin(TbturmaPeer::ID_OFERTA, TbofertaPeer::ID_OFERTA);
                $criteria->addJoin(TbturmaAlunoPeer::ID_TURMA, TbturmaPeer::ID_TURMA);
                $criteria->addJoin(TbfilaPeer::MATRICULA, TbturmaAlunoPeer::MATRICULA);
                $criteria->add(TbfilaPeer::ID_SITUACAO, array(11, 12), Criteria::IN);
                $criteria->addAnd(TbofertaPeer::ID_PERIODO, $periodo);
                $vars = new Tbfila();
                foreach (TbfilaPeer::doSelect($criteria) as $vars) {
                    $vars->save();
                }
//                sfContext::getInstance()->getUser()->setFlash('error', $criteria->toString());
                $this->redirect('fila/index');
            }
        } else {
            $this->form = $form;
        }
    }

}
