<?php

require_once dirname(__FILE__) . '/../lib/listaesperaGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/listaesperaGeneratorHelper.class.php';

/**
 * listaespera actions.
 *
 * @package    derca
 * @subpackage listaespera
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class listaesperaActions extends autoListaesperaActions {

    function executeChamaLista(sfWebRequest $request) {
        $criteria = new Criteria();
        $criteria = $this->getUser()->getAttribute('loadaluno.criteria');
        if ($this->getUser()->getAttribute('listaespera.chamado') != 'yes') {
            foreach (TbloadalunoPeer::doSelect($criteria) as $loadaluno) {
                $loadaluno->setOpcao('CHAMADO');
                $loadaluno->save();
            }
        }
        $this->list = TbloadalunoPeer::doSelect($criteria);
        $this->show_fields = array('Nome', 'Matricula', 'Cpf', 'tbcursoversao', 'Classificacao', 'Opcao', 'Processo');
        $this->setLayout("relatorio");

        $this->getUser()->setAttribute('loadaluno.criteria', null);
//        $this->redirect('@tbloadaluno');
    }


    function executeProcessaEspera(sfWebRequest $request) {
        $sec_opt = $request->getParameter('flag') == null ? 999 : $request->getParameter('flag');
        $vagas = $request->getParameter('vagas') == null ? 999 : $request->getParameter('vagas');
        $curso = $request->getParameter('curso');

        $criteria = new Criteria();
//        if ($curso == null) {
        $criteria->add(TbloadalunoPeer::ID_VERSAO_CURSO, $curso);
//        }
//        $criteria->addAnd(TbloadalunoPeer::OPCAO, array('2', '1'), Criteria::IN);
        $criteria->addAscendingOrderByColumn(TbloadalunoPeer::CLASSIFICACAO);
        $results = TbloadalunoPeer::doSelect($criteria);

        $retorno = array();
        $count = 0;

        for ($i = 0; $i < count($results); $i++) {
            //enquanto tiver vagas, continua, senao da break
            if ($vagas > 0) {
                $crit = new Criteria();
                if ($results[$i]->getOpcao() == '2') {
                    $crit->add(TbalunoPeer::CPF, $results[$i]->getCpf());
                    $crit->add(TbalunoPeer::DT_INGRESSO, '1/3/2011', Criteria::GREATER_EQUAL);
                    $crit->add(TbalunoPeer::DT_INGRESSO, '11/3/2011', Criteria::LESS_EQUAL);
                    $crit->addAnd(TbalunoPeer::ID_SITUACAO, array('0', '13'), Criteria::IN);
                    if (TbalunoPeer::doCount($crit) > 0) {
                        continue;
                    }
                }
                //verifica se e de primeira ou segunda opcao
                if ($sec_opt > 0) {
                    if ($results[$i]->getOpcao() == '2') {
                        $sec_opt--;
                    }
                    $retorno[$count] = $results[$i]->getMatricula();
                    $count++;
                    $vagas--;
                } else {
                    if ($results[$i]->getOpcao() == '1') {
                        $retorno[$count] = $results[$i]->getMatricula();
                        $count++;
                        $vagas--;
                    }
                }
            } else {
                break;
            }
        }

        if ($request->getMethod() == 'POST') {

            $curso = $request->getParameter('curso');
            $processo = $request->getParameter('processo');
            $opcao = $request->getParameter('opcao');

            $criteria = new Criteria();

            $retorno = array();
            $count = 0;

            $criteria->clear();
            $vagas = new Tbvagas();

            $criteria->add(TbvagasPeer::PROCESSO, $processo);
            $criteria->add(TbvagasPeer::VAGAS, 0, Criteria::GREATER_THAN);
            foreach (TbvagasPeer::doSelect($criteria) as $vagas) {
                $sec_opt = $vagas->getVagasSegundaOpcao();
                $num_vagas = $vagas->getVagas();

                $crit = new Criteria();
                $crit->add(TbloadalunoPeer::ID_VERSAO_CURSO, $vagas->getIdVersaoCurso());
                $crit->add(TbloadalunoPeer::PROCESSO, $vagas->getProcesso());
                $crit->add(TbloadalunoPeer::OPCAO, $opcao);
                $crit->addAscendingOrderByColumn(TbloadalunoPeer::CLASSIFICACAO);
//                $crit->setLimit($vagas->getVagas());

                $results = TbloadalunoPeer::doSelect($crit);
                $aluno = new Tbloadaluno();
                foreach ($results as $aluno) {
                    if ($num_vagas > 0) {
                        $crt = new Criteria();
                        if ($aluno->getOpIngresso() == 2) {
                            $crt->add(TbalunoPeer::CPF, $aluno->getCpf());
                            $crt->add(TbalunoPeer::DT_INGRESSO, '1/3/2012', Criteria::GREATER_EQUAL);
                            $crt->add(TbalunoPeer::DT_INGRESSO, '11/3/2012', Criteria::LESS_EQUAL);
                            $crt->addAnd(TbalunoPeer::ID_SITUACAO, array('0', '13'), Criteria::IN);
                            if (TbalunoPeer::doCount($crt) > 0) {
                                continue;
                            }
                        }
                        //verifica se e de primeira ou segunda opcao
                        if ($sec_opt > 0) {
                            if ($aluno->getOpIngresso() == 2) {
                                $sec_opt--;
                            }
                            $retorno[$count] = $aluno->getMatricula();
                            $count++;
                            $num_vagas--;
                        } else {
                            if ($aluno->getOpIngresso() == 1) {
                                $retorno[$count] = $aluno->getMatricula();
                                $count++;
                                $num_vagas--;
                            } else if ($aluno->getOpIngresso() == 0) {
                                $retorno[$count] = $aluno->getMatricula();
                                $count++;
                                $num_vagas--;
                            }
                        }
                    } else {
                        break;
                    }
                }
            }

            $criteria->clear();
            $criteria->addAnd(TbloadalunoPeer::MATRICULA, $retorno, Criteria::IN);
            $criteria->addAscendingOrderByColumn(TbloadalunoPeer::MATRICULA);

            $this->getUser()->setAttribute('loadaluno.criteria', $criteria);

            $this->list = TbloadalunoPeer::doSelect($criteria);
            $this->show_fields = array('Nome', 'Matricula', 'Cpf', 'tbcursoversao', 'Classificacao', 'Opcao', 'Tbalunosituacao', 'Processo', 'OpIngresso');
        }
    }


    function executeListaEspera(sfWebRequest $request) {
        if ($request->getMethod() == 'POST') {

            $curso = $request->getParameter('curso');
            $processo = $request->getParameter('processo');
            $opcao = $request->getParameter('opcao');

            $criteria = new Criteria();
            if ($curso != -1) {
                $criteria->add(TbvagasPeer::ID_VERSAO_CURSO, $curso);
            }
            $criteria->add(TbvagasPeer::PROCESSO, $processo);

            $vagas = TbvagasPeer::doSelectOne($criteria);

            $criteria->clear();
            if ($curso != -1) {
                $criteria->add(TbloadalunoPeer::ID_VERSAO_CURSO, $curso);
                $criteria->setLimit($vagas->getVagas());
            }
            $criteria->add(TbloadalunoPeer::PROCESSO, $processo);
            $criteria->add(TbloadalunoPeer::OPCAO, $opcao);
            $criteria->addAscendingOrderByColumn(TbloadalunoPeer::CLASSIFICACAO);
            $results = TbloadalunoPeer::doSelect($criteria);

            $retorno = array();
            $count = 0;

            foreach ($results as $aluno) {
                $retorno[$count] = $aluno->getMatricula();
                $count++;
            }

            $criteria->clear();
            $criteria->addAnd(TbloadalunoPeer::MATRICULA, $retorno, Criteria::IN);
            $criteria->addAscendingOrderByColumn(TbloadalunoPeer::MATRICULA);

            $this->getUser()->setAttribute('loadaluno.criteria', $criteria);

            $this->list = TbloadalunoPeer::doSelect($criteria);
            $this->show_fields = array('Nome', 'Matricula', 'Cpf', 'tbcursoversao', 'Classificacao', 'Opcao', 'Tbalunosituacao', 'Processo');
        }
    }

}
