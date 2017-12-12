<?php

require_once dirname(__FILE__) . '/../lib/turmaGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/turmaGeneratorHelper.class.php';

/**
 * turma actions.
 *
 * @package    derca
 * @subpackage turma
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class turmaActions extends autoTurmaActions {

    private function getTbturma($id) {
        $c = new Criteria();
        $c->add(TbturmaPeer::ID_TURMA, $id);
        return TbturmaPeer::doSelectOne($c);
    }

    public function executeListFrequencia(sfWebRequest $request) {

        $this->setLayout(false);

        $this->tbturma = $this->getTbturma($request->getParameter('id_turma'));
    }
    
    public function executeListContato(sfWebRequest $request) {

        $this->setLayout(false);

        $this->tbturma = $this->getTbturma($request->getParameter('id_turma'));
    }

    function executeBatchTransferirHistorico(sfWebRequest $request) {
        $request->setAttribute('ids', $request->getParameter('ids'));
        $this->forward('turma', 'ListTransferirNotasHist');
    }

    public function executeListTransferirNotasHist(sfWebRequest $request) {
        if (!$request->hasParameter('ids')) {
            $turma = TbturmaPeer::retrieveByPK($request->getParameter('id_turma'));
        }
        $con = Propel::getConnection();

        try {
            $con->beginTransaction();
            if (!$request->hasParameter('ids')) {
                $turma->transferirNotasHist();
            } else {
                foreach (TbturmaPeer::retrieveByPKs($request->getParameter('ids')) as $turma) {
                    $turma->transferirNotasHist();
                }
            }

            $con->commit();
            $this->getUser()->setFlash('notice', "Notas Transferidas para o Historico");
        } catch (Exception $ex) {
//            $con->rollBack();
            $this->getUser()->setFlash('error', "Exception: " . $ex->getMessage());
        }

        $this->redirect('turma/index');
    }

    public function executeListNotas(sfWebRequest $request) {

        $this->tbturma = $this->getTbturma($request->getParameter('id_turma'));

        $notaAlunos = array();

        foreach ($this->tbturma->getTbturmaAlunos() as $ta) {
            $notas = $ta->getTbturmaNotas();
            foreach ($notas as $n) {
                $notaAlunos[$n->getIdAluno()][$n->getNNota()] = $n->getValor();
            }
        }

        $this->notas = $notaAlunos;
    }

    public function executeListRemove(sfWebRequest $request) {
        $turma = TbturmaPeer::retrieveByPK($request->getParameter('id_turma'));
        $turma->removeTurmaAlunos();
        $this->getUser()->setFlash('notice', "Alunos removidos da turma");
        $this->redirect('turma/index');
    }

    public function executeListCancelar(sfWebRequest $request) {
        $turma = TbturmaPeer::retrieveByPK($request->getParameter('id_turma'));
        $this->discplina = $turma->getTbdisciplina()->getDescricao();
        $turma->removerTurma();
        $this->getUser()->setFlash('notice', "Turma Cancelada");
        $this->redirect('turma/index');
    }

    public function executeIncluirAluno(sfWebRequest $request) {
        $this->forward('turmaaluno', 'new');
    }

    public function executeTransferirNotasHistorico(sfWebRequest $request) {

        $this->form = new TransferirNotasHistoricoForm();

        if ($request->isMethod(sfRequest::POST)) {

            $this->form->bind($request->getParameter($this->form->getName()));

            if ($this->form->isValid()) {
                $values = $this->form->getValues();
                try {
                    TbturmaPeer::transferirNotasHistoricoPorPeriodo($values['id_periodo']);
                    $this->getUser()->setFlash('notice', 'Notas transferidas para o histórico');
                } catch (PropelException $exc) {
                    $this->getUser()->setFlash('error', 'Erro ao transferir notas para o histórico: ' . utf8_decode($exc->getMessage()));
                } catch (Exception $exc) {
                    $this->getUser()->setFlash('error', 'Erro ao transferir notas para o histórico: ' . $exc->getMessage());
                }
                $this->redirect('turma/index');
            }
        }
    }

    public function executeListImprimeNotas(sfWebRequest $request) {
        $this->setTemplate('notasImprimir');
        $this->setLayout(false);

        $this->tbturma = $this->getTbturma($request->getParameter('id_turma'));

        $this->tbturmaAlunos = $this->tbturma->getListTbturmaAlunos();

        $notaAlunos = array();

        foreach ($this->tbturmaAlunos as $ta) {
            $notas = $ta->getTbturmaNotas();
            foreach ($notas as $n) {
                $notaAlunos[$n->getIdAluno()][$n->getNNota()] = $n->getValor();
            }
        }

        $this->notas = $notaAlunos;
    }

    public function executeListNotasEdit(sfWebRequest $request) {

//        if (!sfContext::getInstance()->getUser()->hasAttribute('professor_turma')) {
//            $this->forward('login', 'signin');
//        }
//        if (!TbturmaPeer::professorDaTurma(sfContext::getInstance()->getUser()->getAttribute('professor_turma')->getMatriculaProf(), $request->getParameter('id_turma'))) {
//            $this->forward('login', 'signin');
//        }

        if ($request->getParameter('layout') == 'impressao') {
            $this->setTemplate('notasImprimir');
            $this->setLayout(false);
        }

        $this->tbturma = $this->getTbturma($request->getParameter('id_turma'));

        $this->forward404If($this->tbturma->getNotasNoHistorico());

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

    public function executeSalvaNNotas(sfWebRequest $request) {


//        $this->forward404Unless(TbturmaPeer::professorDaTurma($this->getUser()->getAttribute('professor')->getMatriculaProf(),$request->getParameter('id')),'Professor não tem vínculo com a turma requisitada');

        $id = $request->getParameter('id_turma');

        $nNotas = $request->getParameter('n_notas');

        $this->forward404Unless(!is_int($id) && !is_int($nNotas));

        $turma = TbturmaPeer::retrieveByPK($id);

//        $this->forward404If($turma->getNotasNoHistorico());

        $turma->setNNotas($nNotas);
        $turma->save();

        $this->redirect('turma/ListNotasEdit?id_turma=' . $id);
    }

    /* Form Notas AJAX */

    public function executeSalvaNota(sfWebRequest $request) {

        sfConfig::set('sf_escaping_strategy', false);

        $this->logMessage('Salvando nota do IP ' . $_SERVER['REMOTE_ADDR'] . ', POST: ' . json_encode($_POST) . ' GET: ' . json_encode($_GET), 'notice');

        $form_post = $request->getPostParameter('form');

        $this->forward404Unless(is_array($form_post), 'Parâmetros do formulário inválidos: POST: ' . json_encode($_POST) . '; GET: ' . json_encode($_GET));

        $idAluno = key($form_post);
        $valores = current($form_post);

        $this->forward404Unless($aluno = TbturmaAlunoPeer::retrieveByPK($idAluno), 'Aluno não cadastrado');

        $json = array();

        try {

            switch (key($valores)) {

                case 'faltas':

                    if ($valores['faltas'] == '' || preg_match("/^[0-9]+$/", $valores['faltas'])) {

                        $aluno->setFaltas($valores['faltas']);
                        $aluno->save();

                        $json['valor'] = $aluno->getFaltas();
                    } else {

                        $json['error']['code'] = 4; // Número de faltas inválido
                    }

                    break;

                case 'nota':

                    $nNota = key($valores['nota']);
                    $valorNota = str_replace(',', '.', current($valores['nota']));

                    if ($valorNota == '' || preg_match("/^[0-9.]+$/", $valorNota) && $valorNota >= 0 && $valorNota <= 10) {

                        $nota = TbturmaNotaPeer::retrieveByIdAlunoNNota($aluno->getIdAluno(), $nNota);

                        if ($nota == null && $nNota <= $aluno->getTbturma()->getNNotas()) {
                            $nota = new Tbturmanota();
                            $nota->setTbturmaAluno($aluno);
                            $nota->setNNota($nNota);
                        } else if ($valorNota == null) {
                            $nota->delete();
                            unset($nota);
                            $json['valor'] = null;
                            break;
                        }

                        $nota->setValor($valorNota);
                        $nota->save();
                        $json['valor'] = $nota->getValor();
                    } else {

                        $json['error']['code'] = 5; // Nota inválida
                    }

                    break;

                case 'notaer':

                    $valores['notaer'] = str_replace(',', '.', $valores['notaer']);

                    if (preg_match("/^[0-9.]+$/", $valores['notaer']) && $valores['notaer'] >= 0 && $valores['notaer'] <= 10 || $valores['notaer'] == '') {

                        if ($aluno->getMediaParcial() >= 6 && $aluno->getMediaParcial() < 7 || $valores['notaer'] == '') {

                            $aluno->setExameRecuperacao($valores['notaer']);
                            $aluno->save();

                            $json['valor'] = $aluno->getExameRecuperacao();
                        } else {

                            $json['error']['code'] = 6; // A nota de exame de recuperação só vale para média parcial maior ou igual a 6 e menor que 7
                        }
                    } else {

                        $json['error']['code'] = 5; // Nota inválida
                    }

                    break;

                default:
                    $this->forward404('Requisicao invalida em notas/salvaNota: ' . $_SERVER['QUERY_STRING']);
            }

            $aluno->reload(); // para pegar as informações do banco

            if (!isset($json['error']['code'])) {

                $json['id'] = $aluno->getIdAluno();
                $json['media_parcial'] = $aluno->getMediaParcial();
                $json['media_final'] = $aluno->getMediaFinal();
                $json['conceito'] = $aluno->getIdConceito();
                $json['valor'] = (!isset($json['valor']) || $json['valor'] === null) ? '' : $json['valor'];
            }

            if ($request->hasParameter('obj_id'))
                $json['obj_id'] = $request->getParameter('obj_id');
        } catch (PropelException $exc) {
            $json['error']['code'] = 7;
            if (sfApplicationConfiguration::getActive()->getEnvironment() == 'test')
                $json['error']['message'] = 'Erro no acesso ao banco de dados: ' . utf8_decode($exc->getMessage());
        } catch (Exception $exc) {
            $json['error']['code'] = 8;
            if (sfApplicationConfiguration::getActive()->getEnvironment() == 'test')
                $json['error']['message'] = 'Erro ao processar a requisição: ' . $exc->getMessage();
        }

        $this->resposta = $json;
    }

    public function executeNotas(sfWebRequest $request) {

        if ($request->getParameter('layout') == 'impressao') {
            $this->setTemplate('notasImprimir');
            $this->setLayout(false);
        }

//        $this->forward404Unless(TbturmaPeer::professorDaTurma($this->getUser()->getAttribute('professor')->getMatriculaProf(),$request->getParameter('id')),'Professor com matricula '.$this->getUser()->getAttribute('professor')->getMatriculaProf().' não tem vínculo com a turma '.$request->getParameter('id'));

        $this->tbturma = $this->getTbturma($request->getParameter('id_turma'));

        $this->forward404If($this->tbturma->getNotasNoHistorico());

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

    public function executeListSumulas(sfWebRequest $request) {
        if (!sfContext::getInstance()->getUser()->hasAttribute('professor_turma')) {
            $this->forward('login', 'signin');
        }
        if (!TbturmaPeer::professorDaTurma(sfContext::getInstance()->getUser()->getAttribute('professor_turma')->getMatriculaProf(), $request->getParameter('id_turma'))) {
            $this->forward('login', 'signin');
        }


        $this->forward('turmasumula', 'SumulaTurma');
    }

    public function executeListSumulasImpressao(sfWebRequest $request) {
//        if(!sfContext::getInstance()->getUser()->hasAttribute('professor_turma')){
//            $this->forward('login','signin');
//        }
//        if(!TbturmaPeer::professorDaTurma(sfContext::getInstance()->getUser()->getAttribute('professor_turma')->getMatriculaProf(), $request->getParameter('id_turma'))){
//            $this->forward('login','signin');
//        }

        $this->forward('turmasumula', 'Imprimir');
//        $this->forward('turmasumula','SumulaTurma');
    }

    function executeExportar(sfWebRequest $request) {
        $sf_user = sfContext::getInstance()->getUser();
        $sf_user->getAttribute('turma.filters', array(), 'admin_module');
        $this->filters = $this->configuration->getFilterForm($this->getFilters());
        $criteria = $this->filters->buildCriteria($this->getFilters());
        $profs = TbturmaPeer::doSelect($criteria);
        $request->setAttribute('list', $profs);

        $request->setAttribute('show_fields', array('Tbperiodo', 'codDisciplina', 'turma', 'Tbdisciplina', 'Professores', 'observacao', 'QtdeAlunos', 'notasNoHistorico'));
        $this->forward('exportar', 'Exportar');
    }

    function executeInsereMuitos(sfWebRequest $request) {
        $this->forward('turma', 'InsereMuitosForm');
    }

    function executeInsereMuitosForm(sfWebRequest $request) {

        $this->ids = $request->getAttribute('ids');
        $form = new InsereMuitosForm();

        if ($request->isMethod(sfRequest::POST) && $request->hasParameter($form->getName())) {

            $form->bind($request->getParameter($form->getName()));

            if ($form->isValid()) {
                try {
                    $form->save();
                    $this->getUser()->setFlash('notice', 'Alunos adicionados!');
                } catch (Exception $exc) {
                    $this->getUser()->setFlash('error', 'Erro ao executar:' . $exc->getMessage());
                }
            } else {
                $this->getUser()->setFlash('error', 'Erro ao validar! '. $form->getErrorSchema()->getMessage());
            }
            $this->redirect('turma/index');
        }

        $this->form = $form;
    }
}
