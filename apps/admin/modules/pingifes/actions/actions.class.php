<?php

/**
 * pingifes actions.
 *
 * @package    derca
 * @subpackage pingifes
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class pingifesActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {
        
    }

    public function executeChecaAlunos(sfWebRequest $request) {

        $form = new ChecaAlunosForm();

        if ($request->isMethod(sfRequest::POST) && $request->hasParameter($form->getName())) {

            $form->bind($request->getParameter($form->getName()));

            if ($form->isValid()) {

                try {

                    $matriculas = $form->getValue('matriculas');
                    $matriculas = explode("\n", $matriculas);
                    $matriculas = array_map('trim', $matriculas);

                    $alunos = array();

                    foreach ($matriculas as $matricula) {

                        if (empty($matricula))
                            continue;

                        $criteria = new Criteria();
                        $criteria->add('matricula', $matricula);
                        $aluno = TbalunoPeer::doSelectOne($criteria);

                        if ($aluno instanceof Tbaluno) {

                            // testas situacoes para o PINGIFES
                            try {
                                $PINGIFEStestes = array();

                                if (teste_vazio($aluno->getCpf()))
                                    $PINGIFEStestes[] = 'CPF vazio';

                                if (teste_vazio($aluno->getDtSituacao()))
                                    $PINGIFEStestes[] = 'Data de situação vazia';

                                if (teste_vazio($aluno->getDtIngresso()))
                                    $PINGIFEStestes[] = 'Data de ingresso vazia';

                                if ($aluno->getDtSituacao() == '2099-04-02')
                                    $PINGIFEStestes[] = 'Data de situação inválida: ' . $aluno->getDtSituacao();

                                if ($aluno->getDtIngresso() == '2099-04-02')
                                    $PINGIFEStestes[] = 'Data de situação inválida: ' . $aluno->getDtSituacao();

                                if (teste_vazio($aluno->getTbcursoversao()->getCodIntegracao()))
                                    $PINGIFEStestes[] = 'Curso sem código de integração: ' . $aluno->getTbcursoversao();

                                if ($aluno->getIdSituacao() != 0 && teste_vazio($aluno->getTbalunosituacao()->getSiglaPingifes()))
                                    $PINGIFEStestes[] = 'Sigla Pingifes em situação do aluno vazia: ' . $aluno->getTbalunosituacao();

                                if (teste_vazio($aluno->getTbtipoingresso()->getSiglaPingifes()))
                                    $PINGIFEStestes[] = 'Sigla Pingifes em tipo de ingresso do aluno vazia: ' . $aluno->getTbtipoingresso();

                                if (teste_vazio($aluno->getTbalunoracacor()->getSiglaPingifes()))
                                    $PINGIFEStestes[] = 'Sigla Pingifes em Raça/Cor do aluno vazia: ' . $aluno->getTbalunoracacor();



                                if (count($PINGIFEStestes) == 0) {
                                    $PINGIFEStestes[] = 'OK';
                                    $pendente = false;
                                } else {
                                    $pendente = true;
                                }
                            } catch (Exception $exc) {
                                $PINGIFEStestes[] = 'Erro: ' . $exc->getMessage();
                                $pendente = true;
                            }

                            if ($form->getValue('mostrarSomentePendentes') && !$pendente)
                                continue;

                            $alunos[$matricula] = array(
                                'matricula' => $matricula,
                                'nome' => $aluno->getNome(),
                                'curso' => $aluno->getTbcursoversao(),
                                'situacao' => $aluno->getTbalunosituacao(),
                                'testes' => $PINGIFEStestes,
                            );
                        } else {
                            $alunos[$matricula] = array(
                                'matricula' => $matricula,
                                'nome' => '***Inexistente***',
                            );
                        }
                    }

                    $this->alunos = $alunos;
                } catch (Exception $exc) {
                    $this->getUser()->setFlash('error', 'Erro ao executar:' . $exc->getMessage());
                }
            } else {
                $this->getUser()->setFlash('error', 'Erro ao validar! ' . $form->getErrorSchema()->getMessage());
            }
        }

        $this->form = $form;
    }

    public function executeChecaAlunosPorCurso(sfWebRequest $request) {

        $form = new ChecaAlunosPorCursoForm();

        if ($request->isMethod(sfRequest::POST) && $request->hasParameter($form->getName())) {

            $form->bind($request->getParameter($form->getName()));

            if ($form->isValid()) {

                try {

                    $form_values = $form->getValues();


                    $criteria = new Criteria();
                    $criteria->add(TbalunoPeer::ID_VERSAO_CURSO, $form_values['id_versao_curso'], Criteria::IN);
                    $criteria->addAscendingOrderByColumn(TbalunoPeer::NOME);
                    $result['alunos'] = TbalunoPeer::doSelect($criteria);

                    foreach ($result['alunos'] as $aluno) {
                        
                        $matricula = $aluno->getMatricula();

                        if ($aluno instanceof Tbaluno) {

                            // testas situacoes para o PINGIFES
                            try {
                                $PINGIFEStestes = array();

                                if (teste_vazio($aluno->getCpf()))
                                    $PINGIFEStestes[] = 'CPF vazio';

                                if (teste_vazio($aluno->getDtSituacao()))
                                    $PINGIFEStestes[] = 'Data de situação vazia';

                                if (teste_vazio($aluno->getDtIngresso()))
                                    $PINGIFEStestes[] = 'Data de ingresso vazia';

                                if ($aluno->getDtSituacao() == '2099-04-02')
                                    $PINGIFEStestes[] = 'Data de situação inválida: ' . $aluno->getDtSituacao();

                                if ($aluno->getDtIngresso() == '2099-04-02')
                                    $PINGIFEStestes[] = 'Data de situação inválida: ' . $aluno->getDtSituacao();

                                if (teste_vazio($aluno->getTbcursoversao()->getCodIntegracao()))
                                    $PINGIFEStestes[] = 'Curso sem código de integração: ' . $aluno->getTbcursoversao();

                                if ($aluno->getIdSituacao() != 0 && teste_vazio($aluno->getTbalunosituacao()->getSiglaPingifes()))
                                    $PINGIFEStestes[] = 'Sigla Pingifes em situação do aluno vazia: ' . $aluno->getTbalunosituacao();

                                if (teste_vazio($aluno->getTbtipoingresso()->getSiglaPingifes()))
                                    $PINGIFEStestes[] = 'Sigla Pingifes em tipo de ingresso do aluno vazia: ' . $aluno->getTbtipoingresso();

                                if (teste_vazio($aluno->getTbalunoracacor()->getSiglaPingifes()))
                                    $PINGIFEStestes[] = 'Sigla Pingifes em Raça/Cor do aluno vazia: ' . $aluno->getTbalunoracacor();



                                if (count($PINGIFEStestes) == 0) {
                                    $PINGIFEStestes[] = 'OK';
                                    $pendente = false;
                                } else {
                                    $pendente = true;
                                }
                            } catch (Exception $exc) {
                                $PINGIFEStestes[] = 'Erro: ' . $exc->getMessage();
                                $pendente = true;
                            }

                            if ($form->getValue('mostrarSomentePendentes') && !$pendente)
                                continue;

                            $alunos[$matricula] = array(
                                'matricula' => $matricula,
                                'nome' => $aluno->getNome(),
                                'curso' => $aluno->getTbcursoversao(),
                                'situacao' => $aluno->getTbalunosituacao(),
                                'testes' => $PINGIFEStestes,
                            );
                        } else {
                            $alunos[$matricula] = array(
                                'matricula' => $matricula,
                                'nome' => '***Inexistente***',
                            );
                        }
                    }

                    $this->alunos = $alunos;
                } catch (Exception $exc) {
                    $this->getUser()->setFlash('error', 'Erro ao executar:' . $exc->getMessage());
                }
            } else {
                $this->getUser()->setFlash('error', 'Erro ao validar! ' . $form->getErrorSchema()->getMessage());
            }
        }

        $this->form = $form;
    }

}

/**
 * funcao auxiliar para testar se a variavel esta vazia
 *
 * @param String variavel a ser testada
 * @return bool TRUE se estiver vazia
 */
function teste_vazio($var) {
    $var = trim($var);
    if ($var == null || $var == '')
        return true;
    else
        return false;
}

