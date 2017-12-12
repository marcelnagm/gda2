<?php

/**
 * listaespera actions.
 *
 * @package    derca
 * @subpackage listaespera
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class listaesperaActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {
        $this->forward('default', 'module');
    }

    function executeChamaLista(sfWebRequest $request) {
        $criteria = new Criteria();
        $criteria = $this->getUser()->getAttribute('loadaluno.criteria');
        if ($this->getUser()->getAttribute('listaespera.chamado') != 'yes') {
            foreach (TbloadalunoPeer::doSelect($criteria) as $loadaluno) {
                if ($loadaluno->getOpcao() == '1') {
                    $crit = new Criteria();
                    $crit->add(TbloadalunoPeer::CPF, $loadaluno->getCpf());
                    $crit->addAnd(TbloadalunoPeer::OPCAO, '1', Criteria::ALT_NOT_EQUAL);
                    foreach (TbloadalunoPeer::doSelect($crit) as $noob) {
                        $noob->setOpcao('ELIMINADO-' . $noob->getOpcao());
                        $noob->save();
                    }
                }
                $loadaluno->setOpcao('CHAMADO-' . $loadaluno->getOpcao());
                $loadaluno->save();
            }
        }
        $this->getUser()->setAttribute('listaespera.chamado', 'no');
        $this->list = TbloadalunoPeer::doSelect($criteria);
        $this->show_fields = array('Nome', 'Matricula', 'Cpf', 'tbcursoversao', 'Classificacao', 'Opcao');
        $this->setLayout("relatorio");

        $this->getUser()->setAttribute('loadaluno.criteria', null);
//        $this->redirect('@tbloadaluno');
    }

    function executeListaEspera(sfWebRequest $request) {

//        if ($request->getMethod() == 'POST') {
        //$sec_opt: false = 1a opcao, true, 2a opcao
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
            //verifica qual o tipo de requisicao e filtra
            if ($request->getParameter('tipo') == '0') {
                if ($results[$i]->getOpcao() != '1' && $results[$i]->getOpcao() != '2') {
                    continue;
                }
            } else if ($request->getParameter('tipo') == '1') {
                if ($results[$i]->getOpcao() != 'CHAMADO-1' && $results[$i]->getOpcao() != 'CHAMADO-2') {
                    continue;
                }
            } else if ($request->getParameter('tipo') == '2') {
                if ($results[$i]->getOpcao() != 'SISU') {
                    continue;
                }
            } else if ($request->getParameter('tipo') == '3') {
                if ($results[$i]->getOpcao() != 'CHAMADO-SISU') {
                    continue;
                }
            }
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

        $criteria->addAnd(TbloadalunoPeer::MATRICULA, $retorno, Criteria::IN);

        $this->getUser()->setAttribute('loadaluno.criteria', $criteria);

        $this->list = TbloadalunoPeer::doSelect($criteria);
        $this->show_fields = array('Nome', 'Matricula', 'Cpf', 'tbcursoversao', 'Classificacao', 'Opcao', 'Tbalunosituacao');
        if ($request->getParameter('tipo') == '1' || $request->getParameter('tipo') == '3') {
            $this->getUser()->setAttribute('listaespera.chamado', 'yes');
            $this->redirect("aluno/ChamaLista");
        }
//        }
    }

}
