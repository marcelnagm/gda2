<?php

/**
 * fila actions.
 *
 * @package    derca
 * @subpackage fila
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class filaActions extends sfActions {

    protected $aluno = null;

    public function preExecute() {
        $this->aluno = $this->getUser()->getAttribute('aluno');

        $this->forward404Unless($this->aluno);
    }

    public function executeIndex(sfWebRequest $request) {

//         $request->setParameter('message', 'Fila eletrônica Indisponivel');
//         $this->forward('aviso', 'Out');
        $aluno = new Tbaluno();        

        $aluno = $this->getUser()->getAttribute('aluno');
        if (!in_array($aluno->getIdSituacao(), array(0, 12, 9))) {
            $request->setParameter('message', 'Sua situação não permite acesso a esta seção, situação - ' . $this->aluno->getTbalunosituacao());
            $this->forward('aviso', 'Out');
        }

        $periodo = TbperiodoPeer::getSemestreAtualFila($aluno);
//        if (!isset($periodo) || !in_array($aluno->getTbcursoversao()->getCodCurso(), array('57','48','38','82','46','36','23','84','53','37','56','54','88'))) {
        if (!isset($periodo)) {
            $this->fila_allow = false;
            $periodo = TbperiodoPeer::getSemestreAtualResultadoFila($aluno);
            if (!isset($periodo)) {
                $periodo = TbperiodoPeer::getLastSemestreAtual($aluno);
                $request->setParameter('message', 'Seção não disponivel no momento.');
//                $request->setParameter('message', 'Periodo de Fila: ' . $periodo->getDtInicioFila('d/m/y') . ' - ' . $periodo->getDtFimFila('d/m/y') . "\n" .
//                        'Periodo de Ajuste da Fila: ' . $periodo->getDtInicioAjusteFila('d/m/y') . ' - ' . $periodo->getDtFimAjusteFila('d/m/y') . "\n".
//                        "\n" . 'Seção não disponivel no momento ' . "\n");
                $this->forward('aviso', 'Out');
            }
        } else {
            $this->fila_allow = true;
        }
        
        $criteria = new Criteria();
        $criteria->add(TbfilaPeer::MATRICULA, $aluno->getMatricula());
        $criteria->add(TbofertaPeer::ID_PERIODO, $periodo->getIdPeriodo());
        $this->Tbfilas = TbfilaPeer::doSelect($criteria);
        $this->form = new FilaAlunoForm();
        if ($this->fila_allow && $request->hasParameter('cod_disciplina')
                && $request->hasParameter('turma') && $request->getMethod() == 'POST') {
            $this->form->setDefault('cod_disciplina', $request->getParameter('cod_disciplina'));
            $this->form->setDefault('turma', $request->getParameter('turma'));
            $this->ativar_fila = true;
        }
        $this->label_periodo = false;
        $this->com_delete = true;

        $periodo = TbperiodoPeer::getSemestreAtualTrancamento($aluno);
        if (!isset($periodo) || $aluno->isCalouro() || in_array($aluno->getIdSituacao(), array(12, 9))) {
            $this->com_tranc = false;
            $this->render = false;
        } else {
            $this->com_tranc = true;
            $criteria->clear();
            $criteria->addJoin(TbfilaPeer::ID_OFERTA, TbofertaPeer::ID_OFERTA);
            $criteria->add(TbfilaPeer::MATRICULA, $aluno->getMatricula());
            $criteria->addAnd(TbofertaPeer::ID_PERIODO, $periodo->getIdPeriodo());
            $criteria->addAnd(TbofertaPeer::COD_DISCIPLINA, 'ST999');
            if (TbfilaPeer::doCount($criteria) < 1) {
                $this->render = true;
            } else {
                $this->render = false;
            }
        }
        
        if ($aluno->isCalouro() || in_array($aluno->getIdSituacao(), array(12, 9))) {
            $this->fila_allow = false;
//            $periodo = TbperiodoPeer::getSemestreAtualResultadoFila($aluno);
//            if (!isset($periodo)) {
//                $periodo = TbperiodoPeer::getLastSemestreAtual($aluno);
//                $request->setParameter('message', 'Seção não disponível para calouros ' . "\n");
//                $this->forward('aviso', 'Out');
//            }
        }
    }

    public function executeAnteriores(sfWebRequest $request) {
        $periodo = new Tbperiodo();
        $this->aluno = $this->getUser()->getAttribute('aluno');
        $this->com_delete = false;
        $criteria = new Criteria();
        $criteria->addJoin(TbofertaPeer::ID_PERIODO, TbperiodoPeer::ID_PERIODO);
        $criteria->addDescendingOrderByColumn(TbperiodoPeer::ID_PERIODO);
        $criteria->add(TbofertaPeer::ID_PERIODO, TbperiodoPeer::getLastSemestreAtual($this->aluno)->getIdPeriodo(), Criteria::NOT_EQUAL);

        $this->Tbfilas = $this->aluno->getTbfilasJoinTboferta($criteria);
    }

    public function executeRemoverFila(sfWebRequest $request) {

        $Tbfila = TbfilaPeer::retrieveByPk($request->getParameter('id_fila'));

        $aluno = new tbaluno();
        $aluno = $this->getUser()->getAttribute('aluno');
        $periodo = TbperiodoPeer::getSemestreAtualFila($aluno);

        if ($aluno->isCalouro()) {
            sfContext::getInstance()->getUser()->setAttribute('fila_horario_erro', 'Calouros não podem remover ou solicitar disciplinas. Consulte a portaria nº 011 no Painel');
            $criteria = new Criteria();
            $criteria->add(TbofertaPeer::ID_PERIODO, $periodo->getIdPeriodo());
            return $this->renderPartial('fila/list_filas', array('Tbfilas' => $aluno->getTbfilasJoinTboferta($criteria),
                'com_horario' => true, 'label_periodo' => false, 'com_delete' => true, 'com_tranc' => false));
        }
//count($aluno->getTbfilasJoinTboferta($criteria)) == 0
//        if ($Tbfila->getIdSituacao() != 0) {
//            sfContext::getInstance()->getUser()->setAttribute('fila_horario_erro', 'Você só pode ');
//        } else {
        if ( $Tbfila instanceof Tbfila && $aluno instanceof Tbaluno && $Tbfila->getMatricula()==$aluno->getMatricula() ) {
            $Tbfila->delete();
        }
//        }

        $criteria = new Criteria();
        $criteria->add(TbofertaPeer::ID_PERIODO, $periodo->getIdPeriodo());
        return $this->renderPartial('fila/list_filas', array('Tbfilas' => $aluno->getTbfilasJoinTboferta($criteria),
            'com_horario' => true, 'label_periodo' => false, 'com_delete' => true, 'com_tranc' => false));
    }

    public function executeTrancarFila(sfWebRequest $request) {

        $Tbfila = TbfilaPeer::retrieveByPk($request->getParameter('id_fila'));

        $aluno = new tbaluno();
        $aluno = $this->getUser()->getAttribute('aluno');
        $periodo = TbperiodoPeer::getSemestreAtualTrancamento($aluno);

        if ($aluno->isCalouro()) {
            sfContext::getInstance()->getUser()->setAttribute('fila_horario_erro', 'Calouros não podem remover ou solicitar disciplinas. Consulte a portaria nº 011 no Painel');
            $criteria = new Criteria();
            $criteria->add(TbofertaPeer::ID_PERIODO, $periodo->getIdPeriodo());
            return $this->renderPartial('fila/list_filas', array('Tbfilas' => $aluno->getTbfilasJoinTboferta($criteria),
                'com_horario' => true, 'label_periodo' => false, 'com_delete' => false, 'com_tranc' => true));
        }

        $Tbfila2 = $Tbfila->copy();
        $Tbfila2->setIdSituacao(11);
        $Tbfila2->setIdFila();
        $Tbfila2->setCreatedAt($_SERVER['REQUEST_TIME']);
        $Tbfila2->setCreatedBy($aluno->getMatricula());
        $Tbfila2->save();
        
        $Tbfila->delete();

        $criteria = new Criteria();
        $criteria->add(TbofertaPeer::ID_PERIODO, $periodo->getIdPeriodo());
        return $this->renderPartial('fila/list_filas', array('Tbfilas' => $aluno->getTbfilasJoinTboferta($criteria),
            'com_horario' => true, 'label_periodo' => false, 'com_delete' => false, 'com_tranc' => true));
    }

    public function executeTrancarSemestre(sfWebRequest $request) {

        $Tbfila = new Tbfila();

        $aluno = new tbaluno();
        $aluno = $this->getUser()->getAttribute('aluno');
        $periodo = TbperiodoPeer::getSemestreAtualTrancamento($aluno);
        
        if ($aluno->isCalouro()) {
            sfContext::getInstance()->getUser()->setAttribute('fila_horario_erro', 'Calouros não podem trancar o semestre. Consulte a portaria nº 011 no Painel');
            $criteria = new Criteria();
            $criteria->add(TbofertaPeer::ID_PERIODO, $periodo->getIdPeriodo());
            return $this->renderPartial('fila/list_filas', array('Tbfilas' => $aluno->getTbfilasJoinTboferta($criteria),
                'com_horario' => true, 'label_periodo' => false, 'com_delete' => false, 'com_tranc' => true));
        }

        $criteria = new Criteria();
        $criteria->add(TbofertaPeer::ID_PERIODO, $periodo->getIdPeriodo());
        $criteria->add(TbofertaPeer::COD_DISCIPLINA, 'ST999');

        $Tbfila->setMatricula($aluno->getMatricula());
        $Tbfila->setIdSituacao(1);
        $Tbfila->setTboferta(TbofertaPeer::doSelectOne($criteria));
        $Tbfila->setCreatedAt($_SERVER['REQUEST_TIME']);
        $Tbfila->setCreatedBy($aluno->getMatricula());
        $Tbfila->save();

        $criteria = new Criteria();
        $criteria->add(TbofertaPeer::ID_PERIODO, $periodo->getIdPeriodo());
        return $this->renderPartial('fila/list_filas', array('Tbfilas' => $aluno->getTbfilasJoinTboferta($criteria),
            'com_horario' => true, 'label_periodo' => false, 'com_delete' => false, 'com_tranc' => true));
    }

//    Checagem da fila:
//- Padrão do código da disciplina -
//- Tipo do curso do aluno bate com o tipo de disciplina pedida -
//- Ver se existe na grade do curso
//- Testar se a disciplina já foi cursada pelo aluno -
//- Testar se já foi solicitada a disciplina -
//- Choque de horário -
//- Numero de Trancamentos

    public function executeChecaHorario(sfWebRequest $request) {
        $aluno = TbalunoPeer::retrieveByPK($request->getParameter('matricula'));
        $periodo = TbperiodoPeer::getSemestreAtualFila($aluno);

        $criteria = new Criteria();
        $criteria->add(TbofertaPeer::COD_DISCIPLINA, $request->getParameter('cod_disciplina'));
        $criteria->add(TbofertaPeer::TURMA, $request->getParameter('turma'));
        $criteria->add(TbofertaPeer::ID_PERIODO, $periodo->getIdPeriodo());
//        $criteria->add(TbofertaPeer::ID_SITUACAO, array(1,4), Criteria::IN);
        $criteria->add(TbofertaPeer::ID_SITUACAO, array(1), Criteria::IN);
        switch (TbofertaPeer::doCount($criteria)) {
            case 0: {
                    sfContext::getInstance()->getUser()->setAttribute('fila_horario_erro', 'Não existe uma oferta para a solicitada');
                    return $this->renderText('False');
                }
            case 1: {
                    $oferta = TbofertaPeer::doSelectOne($criteria);
                    $filaResult = TbfilaPeer::IsChoqueHorario($oferta, $aluno->getMatricula());
                    if ($filaResult == '0') {
                        $filaResult = TbfilaPeer::IsTemPreRequisito($oferta, $aluno->getMatricula());
                        if ($filaResult == true) {
                            $filaResult = TbfilaPeer::IsCursada($oferta, $aluno->getMatricula());
                            if ($filaResult == '0') {
                                $filaResult = TbfilaPeer::IsSolicitada($oferta, $aluno->getMatricula());
                                if ($filaResult == '0') {
//                                    $filaResult = TbfilaPeer::IsOfertaCalouros($oferta, $aluno);
//                                    if ($filaResult == 0) {
                                    $filaResult = TbfilaPeer::IsNivelCorreto($oferta, $aluno);
                                    if ($filaResult == '0') {
                                        $filaResult = TbfilaPeer::IsTrancamentosMaximo($oferta, $aluno->getMatricula());
                                        if ($filaResult == '0') {
                                            $fila = new tbfila();
                                            $fila->setIdOferta($oferta->getIdOferta());
                                            $fila->setMatricula($aluno->getMatricula());
                                            $fila->setPontos(0);
                                            $fila->setReprovacoes(0);
                                            $fila->setIdSituacao(0);
                                            $fila->setFormando(0);
                                            try {
                                                $fila->save();
                                                $criteria = new Criteria();
                                                $criteria->add(TbfilaPeer::MATRICULA, $aluno->getMatricula());
                                                $criteria->add(TbofertaPeer::ID_PERIODO, $periodo->getIdPeriodo());
                                                return $this->renderPartial('fila/list_filas', array('Tbfilas' => $aluno->getTbfilasJoinTboferta($criteria), 'com_horario' => true, 'label_periodo' => false, 'com_delete' => true));
                                            } catch (Exception $ex) {
                                                sfContext::getInstance()->getUser()->setAttribute('fila_horario_erro', 'Erro ao solicitar,informe este erro:' . $ex->getMessage() . ' causado por:' . $ex->getTraceAsString());
                                                return $this->renderText('False');
                                            }
                                        } else {
                                            return $this->renderText('False');
                                        }
                                    } else {
                                        sfContext::getInstance()->getUser()->setAttribute('fila_horario_erro', 'Disciplina não voltado para o nivel do seu curso' . $aluno->getTbcurso()->getTbcursonivel());
                                        return $this->renderText('False');
                                    }
//                                    } else {
//                                        sfContext::getInstance()->getUser()->setAttribute('fila_horario_erro', 'Disciplina Voltada EXCLUSIVAMENTE para calouros');
//                                        return $this->renderText('False');
//                                    }
                                } else {
                                    sfContext::getInstance()->getUser()->setAttribute('fila_horario_erro', 'Disciplina já Solicitada');
                                    return $this->renderText('False');
                                }
                            } else {
                                sfContext::getInstance()->getUser()->setAttribute('fila_horario_erro', 'Disciplina já cursada');
                                return $this->renderText('False');
                            }
                        } else {
                            $criteria->clear();
                            $criteria->setDistinct();
                            $criteria->add(TbdisciplinarequisitosPeer::COD_DISCIPLINA, $oferta->getCodDisciplina());
                            $criteria->add(TbdisciplinarequisitosPeer::ID_VERSAO_CURSO, $aluno->getIdVersaoCurso());
                            //se não possuir pré-requisitos na versao dele então procura geral
                            if (TbdisciplinarequisitosPeer::doCount($criteria) == 0) {
                                $criteria->clear();
                                $criteria->setDistinct();
                                $criteria->add(TbdisciplinarequisitosPeer::COD_DISCIPLINA, $oferta->getCodDisciplina());
                                $criteria->add(TbdisciplinarequisitosPeer::ID_VERSAO_CURSO, 0);
                            }

                            $message = 'Disciplina sem pré-requisito' . "\n" . 'Requisitos : ';
                            $disciplinas = new Tbdisciplinarequisitos();
                            foreach (TbdisciplinarequisitosPeer::doSelect($criteria) as $disciplinas) {
                                $message .= $disciplinas->getTbdisciplinaRelatedByCodDiscRequisito() . "\n";
                            }
                            sfContext::getInstance()->getUser()->setAttribute('fila_horario_erro', $message);
                            return $this->renderText('False');
                        }
                    } else {
                        sfContext::getInstance()->getUser()->setAttribute('fila_horario_erro', 'Existe disciplina com choque de horario' . $oferta);
                        return $this->renderText('False');
                    }
                }
            default : {
                    sfContext::getInstance()->getUser()->setAttribute('fila_horario_erro', 'Erro ao solicitar, Confira os dados e se persistir o erro entre em contato do DERCA ');
                    return $this->renderText('False');
                }
        }
    }

    public function executeReturnErro(sfWebRequest $request) {
        return $this->renderPartial('erro');
    }

    public function executeImprimir(sfWebRequest $request) {
        $temp = $request->getParameter('periodo');
        $this->setLayout(false);
        $this->aluno = $this->getUser()->getAttribute('aluno');
        if (isset($temp)) {
            $periodo = TbperiodoPeer::retrieveByPK($temp);
        } else {
            $periodo = TbperiodoPeer::getSemestreAtualFila($this->aluno);
        }
        if (!isset($periodo)) {
            $this->fila_allow = false;
            $periodo = TbperiodoPeer::getSemestreAtualResultadoFila($this->aluno);
            if (!isset($periodo)) {
                $request->setParameter('message', 'Seção não disponivel no momento');
                $this->forward('aviso', 'Out');
            }
        } else {
            $this->fila_allow = true;
        }
        $this->periodo = $periodo;

        $criteria = new Criteria();
        $criteria->add(TbfilaPeer::MATRICULA, $this->aluno->getMatricula());
        $criteria->add(TbofertaPeer::ID_PERIODO, $periodo->getIdPeriodo());
        $this->filas = TbfilaPeer::doSelect($criteria);
    }

}
