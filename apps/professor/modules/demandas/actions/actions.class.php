<?php

/**
 * demandas actions.
 *
 * @package    derca
 * @subpackage demandas
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class demandasActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {
        $criteria = new Criteria();
        $criteria->addDescendingOrderByColumn(TbcoordenadorcursoPeer::ID_VERSAO_CURSO);
        $demandas_temp = array();
        $id_versoes = array();
        $prof = sfContext::getInstance()->getUser()->getAttribute('professor');
        foreach ($prof->getTbcoordenadorcursos($criteria) as $versao_curso) {
            $demandas_temp[$versao_curso->getIdVersaoCurso()] = TbcurriculodisciplinasPeer::getDemandas($versao_curso->getIdVersaoCurso());
            $id_versoes[] = array('id' => $versao_curso->getIdVersaoCurso(),
                                'descricao' => $versao_curso->getTbcursoversao()->getDescricao());
        }
        $this->demandas = $demandas_temp;
        $this->versoes = $id_versoes;
    }

    public function executeAlunos(sfWebRequest $request) {
        $versao = $request->getParameter('id');
        $disciplina = $request->getParameter('cod');
        
        $this->alunos = TbcurriculodisciplinasPeer::getDemandasAlunos($versao, $disciplina);
    }

}
