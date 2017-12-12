<?php

require_once dirname(__FILE__) . '/../lib/matriculacomprovanteGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/matriculacomprovanteGeneratorHelper.class.php';

/**
 * matriculacomprovante actions.
 *
 * @package    derca
 * @subpackage matriculacomprovante
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class matriculacomprovanteActions extends autoMatriculacomprovanteActions {

    protected function addSortCriteria($c) {
        $c->addJoin(TbalunomatriculaPeer::MATRICULA, TbmatriculaComprovantePeer::MATRICULA);
        $c->addAscendingOrderByColumn(TbalunomatriculaPeer::NOME);
        parent::addSortCriteria($c);
    }

    public function executeListTransfer(sfWebRequest $request) {
        $id_comp = $request->getParameter('id_comprovante');
        $aluno = TbalunomatriculaPeer::retrieveByPK(TbmatriculaComprovantePeer::retrieveByPK($id_comp)->getMatricula());
        $novo_aluno = new Tbaluno();
        $novo_aluno->setAlunoMatricula($aluno);

        $criteria = new Criteria();
        $criteria->addAnd(TbalunoPeer::CPF, $request->getParameter('CPF'), Criteria::EQUAL);
//        $criteria->addAnd(TbalunoPeer::CPF, array(NULL, ''), Criteria::NOT_IN);
        $criteria->addAnd(TbalunoPeer::ID_SITUACAO, array(0, 13), Criteria::IN);
//        $criteria->addJoin(TbalunoPeer::ID_VERSAO_CURSO, TbcursoversaoPeer::ID_VERSAO_CURSO);
//        $criteria->addJoin(TbcursoversaoPeer::COD_CURSO, TbcursoPeer::COD_CURSO);
//        $criteria->addAnd(TbcursoPeer::ID_NIVEL, 1);
        if (TbalunoPeer::doCount($criteria) > 0) {
            sfContext::getInstance()->getUser()->setFlash('error', 'O aluno possui outra matrícula! ' . TbalunoPeer::doSelectOne($criteria)->getMatricula());
        } else {
            $criteria2 = new Criteria();
            $criteria2->add(TbalunoPeer::MATRICULA, $novo_aluno->getMatricula());

            if (TbalunoPeer::doCount($criteria2) > 0) {
                sfContext::getInstance()->getUser()->setFlash('error', 'A matrícula já existe! ' . TbalunoPeer::doSelectOne($criteria2)->getMatricula());
            } else {
                $novo_aluno->save();
                $comp = TbmatriculaComprovantePeer::retrieveByPK($id_comp);
                $comp->setSituacao('FINALIZADO');
                $comp->save();
                sfContext::getInstance()->getUser()->setFlash('error', ($novo_aluno->getSexo() == 'M' ? 'He' : 'She') . ' is now in the Matrix.');
            }
        }

        $this->redirect('matriculacomprovante/index');
    }

    /**
     * Faz consulta da pre-matricula com os dados do banco
     * 
     * Ref.:
     * Vestibular: /matricula/index.php/vestibular2013/Status 
     * ENEM/SISU:  /matricula/index.php/enemsisu2013/Status
     * 
     * matricula inicio=[1,5] : vestibular
     * matricula inicio=[2] : enem/sisu
     * 
     * @param sfWebRequest $request
     * @return type
     * @throws Exception
     */
    public function executeListConsultaComprovante(sfWebRequest $request) {
        $id_comp = $request->getParameter('id_comprovante');
        $this->matricula_comprovante = TbmatriculaComprovantePeer::retrieveByPK($id_comp);

	$num_prematricula = $this->matricula_comprovante->getMatricula();

	$tipo_ingresso = $num_prematricula{0};

	switch ($tipo_ingresso) {
		case 1:
		case 5:
			$this->post_modulo='vestibular2013'; break;
		case 2:
			$this->post_modulo='enemsisu2013'; break;
	}

	if(empty($this->post_modulo)) {
		throw new Exception('Form destino nao definido para tipo_ingresso='.$tipo_ingresso);
	}

        $this->setLayout(false);
	return sfView::SUCCESS;
    }

}
