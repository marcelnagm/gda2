<?php

/**
 * enemsisu actions.
 *
 * @package    derca
 * @subpackage enemsisu
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class enemsisuActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {
//        $this->forward('default', 'module');
    }

    public function executeInfo(sfWebRequest $request) {
    }

    public function executeAskStatus(sfWebRequest $request) {

    }

    public function executeStatus(sfWebRequest $request) {
        if ($request->isMethod('POST')) {
            $criteria = new Criteria();
            $criteria->add(TbloadalunoPeer::CPF, $request->getParameter('CPF'));
            $criteria->add(TbloadalunoPeer::PROCESSO, 'SISU-2012');
            $aluno = TbloadalunoPeer::doSelectOne($criteria);

            $this->aluno = $aluno;
        } else {
            $this->forward('enemsisu', 'AskStatus');
        }
    }

    public function executeConfirma(sfWebRequest $request) {
        $criteria = new Criteria();
        $criteria->add(TbloadalunoPeer::CPF, $request->getParameter('CPF'));
        $criteria->add(TbloadalunoPeer::PROCESSO, 'SISU-2012');
        $criteria->add(TbloadalunoPeer::OPCAO, 'CHAMADO');
        $aluno = TbloadalunoPeer::doSelectOne($criteria);

        $criteria->clear();
        $criteria->add(TbvagasPeer::PROCESSO, 'SISU-2012');
        $criteria->add(TbvagasPeer::ID_VERSAO_CURSO, $aluno->getIdVersaoCurso());
        $vagas = TbvagasPeer::doSelectOne($criteria);

        if ($request->getParameter('status') == 'ok') {
            $aluno->setOpcao('PRÉ-MATRICULADO');
            $aluno->setUpdatedAt(date('d M Y H:i:s'));
            $aluno->setUpdatedBy($aluno->getMatricula());
            $aluno->save();

            $vagas->setVagas($vagas->getVagas() - 1);
            $vagas->save();

            $this->forward('enemsisu', 'Status');
        }
        $this->aluno = $aluno;
    }

    function executePreMatricula(sfWebRequest $request) {
        if ($request->isMethod('POST')) {
            $criteria = new Criteria();
            $criteria->add(TbloadalunoPeer::CPF, $request->getParameter('CPF'));
            $criteria->add(TbloadalunoPeer::PROCESSO, 'SISU-2012');
            $criteria->add(TbloadalunoPeer::OPCAO, 'CHAMADO');
            if (TbloadalunoPeer::doCount($criteria) == 1) {
                $this->forward('enemsisu', 'Confirma');
            } else {
                $this->message = 'Erro ao Selecionar: ' . $request->getParameter('CPF') . ' não está cadastrado';
            }
        }
    }

}
