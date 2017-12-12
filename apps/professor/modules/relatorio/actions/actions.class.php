<?php

require_once dirname(__FILE__) . '/../lib/relatorioGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/relatorioGeneratorHelper.class.php';

/**
 * relatorio actions.
 *
 * @package    derca
 * @subpackage relatorio
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class relatorioActions extends autoRelatorioActions {

    public function executeExportar(sfWebRequest $request) {
        $sf_user = sfContext::getInstance()->getUser();
        $ofertas = TbalunoPeer::doSelect($this->buildCriteria());
        $request->setAttribute('list', $ofertas);

        $request->setAttribute('show_fields', array('matricula','nome','cpf','Tbcursoversao','Tbalunosituacao'));
        $this->forward('exportar', 'Exportar');
    }

    public function executeListHistorico(sfWebRequest $request) {
        
        $form = new HistoricoForm();
        
        if ($request->isMethod('post')) {
            $form->bind($request->getParameter($form->getName()));
            if ($form->isValid()) {
                $values = $form->executaRelatorio();
                foreach ($values as $k => $v) {
                    $this->$k = $v;
                }
                $this->setLayout('relatorio');
            }
        } else {
            $this->setTemplate('Form');
            sfContext::getInstance()->getUser()->setAttribute('matricula', $request->getParameter('matricula'));
        }
        
        $this->form = $form;
    }

    public function executeListFila(sfWebRequest $request) {

        $form = new FilaForm();
        
        if ($request->isMethod('post')) {
            $form->bind($request->getParameter($form->getName()));
            if ($form->isValid()) {
                $values = $form->executaRelatorio();
                $this->setLayout('relatorio');
                foreach ($values as $k => $v) {
                    $this->$k = $v;
                }
            }
        } else {
            $this->setTemplate('Form');
            sfContext::getInstance()->getUser()->setAttribute('matricula', $request->getParameter('matricula'));
        }
        
        $this->form = $form;
        
    }

    public function executeEdit(sfWebRequest $request) {

        $aluno = new tbaluno();
        $aluno = $this->getRoute()->getObject();
        $special_fields = array('IdNecesEspecial' => $aluno->getTbnecesespecial()->getDescricao(),
            'Nacionalidade ' => TbpaisPeer::retrieveByPK($aluno->getNacionalidade())->getNacionalidade(),
            'IdVersaoCurso' => $aluno->getTbcursoversao()->getDescricao(),
            'IdTipoIngresso' => $aluno->getTbtipoingresso()->getDescricao(),
            'IdSituacao' => $aluno->getTbalunosituacao()->getDescricao(),
            'Id2grau' => $aluno->getTbinstexternaRelatedById2grau() ? $aluno->getTbinstexternaRelatedById2grau()->getDescricao() : '',
            'Id3grau' => $aluno->getTbinstexternaRelatedById3grau() ? $aluno->getTbinstexternaRelatedById3grau()->getDescricao() : ''
        );


        $aluno->getTbnecesespecial()->getDescricao();


        $aluno->setIdAntigo(null);
        $aluno->setIdPessoa(null);
        $aluno->setIdDestino(null);
        $aluno->setIdTrabalho(null);
        $aluno->setCepTrabalho(null);


        $this->tbaluno = $aluno;
        $this->fields = TbalunoPeer::getFieldNamesAlter(BasePeer::TYPE_PHPNAME);
        $this->special_fields = $special_fields;
        $this->title = 'Ficha do Aluno';
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
        $criteria->addAnd(TbalunoPeer::ID_VERSAO_CURSO, TbprofessorPeer::getVersoesByProfessor($professor->getMatriculaProf()),  Criteria::IN);
        sfContext::getInstance()->getUser()->setAttribute('matricula', null);

        /** Parte Inserida  para limitas com apenas os alunos do curso dele * */
        $this->addSortCriteria($criteria);

        $event = $this->dispatcher->filter(new sfEvent($this, 'admin.build_criteria'), $criteria);
        $criteria = $event->getReturnValue();

        return $criteria;
    }

}
