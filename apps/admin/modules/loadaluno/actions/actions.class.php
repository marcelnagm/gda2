<?php

require_once dirname(__FILE__) . '/../lib/loadalunoGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/loadalunoGeneratorHelper.class.php';

/**
 * loadaluno actions.
 *
 * @package    derca
 * @subpackage loadaluno
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class loadalunoActions extends autoLoadalunoActions {

    /**
     * Redireciona o aluno para o formulario de cadastro de novo aluno
     * @param sfWebRequest $request 
     */
    public function executeListMatricular(sfWebRequest $request) {
        $aluno = TbloadalunoPeer::retrieveByPK($request['matricula']);
        sfContext::getInstance()->getUser()->setAttribute('novo_calouro', $aluno);
//        $request->setMethod('GET');
        $this->redirect('matricula/NovoAluno');
    }

    /**
     * Define o atributo opcao dos itens selecionados para 'FALTOU-'.[opcao]
     * @param sfWebRequest $request 
     */
    public function executeBatchFaltou(sfWebRequest $request) {
        $values = TbloadalunoPeer::retrieveByPKs($request->getParameter('ids'));
        foreach ($values as $aluno) {
            $aluno->setOpcao('FALTOU');
            $aluno->save();
        }
        $this->redirect('@tbloadaluno');
    }

    /**
     * Define o atributo opcao do item Tbloadaluno para 'FALTOU-'.[opcao]
     * @param sfWebRequest $request
     */
    function executeListFaltou(sfWebRequest $request) {
        $aluno = new Tbloadaluno();
        $aluno = TbloadalunoPeer::retrieveByPK($request->getParameter('matricula'));
        $aluno->setOpcao('FALTOU-' . ($aluno->getOpcao() == 'CHAMADO-1' ? '1' : '2'));
        $aluno->save();
        $this->redirect('@tbloadaluno');
    }

    /**
     * Define o atributo opcao do item Tbloadaluno para 'MATRICULADO-'.[opcao]
     * @param sfWebRequest $request
     */
    function executeListMatricula(sfWebRequest $request) {
        $aluno = new Tbloadaluno();
        $aluno = TbloadalunoPeer::retrieveByPK($request->getParameter('matricula'));
        $aluno->setOpcao('MATRICULADO-' . ($aluno->getOpcao() == 'CHAMADO-1' ? '1' : '2'));
        $aluno->save();
        $this->redirect('@tbloadaluno');
    }

    function executeExportar(sfWebRequest $request) {
        $sf_user = sfContext::getInstance()->getUser();
        $sf_user->getAttribute('loadaluno.filters', array(), 'admin_module');
        $this->filters = $this->configuration->getFilterForm($this->getFilters());
        $criteria = $this->filters->buildCriteria($this->getFilters());
        $loadalunos = TbloadalunoPeer::doSelect($criteria);
        $request->setAttribute('list', $loadalunos);

        $request->setAttribute('show_fields', array('matricula','nome','cpf','Tbcursoversao','Tbtipoingresso','classificacao','opcao','processo'));
        $this->forward('exportar', 'Exportar');
    }

}
