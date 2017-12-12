<?php

/**
 * relatorio actions.
 *
 * @package    derca
 * @subpackage relatorio
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class relatorioActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {
        $this->forward('default', 'module');
    }

    public function executeAlunoFicha(sfWebRequest $request) {
        $matricula = $request->getParameter('matricula');
        $aluno = TbalunobackupPeer::retrieveByPK($matricula);

        $values = array();
        $values['ano_letivo'] = strftime("%Y");
        $values['o_a'] = ($aluno->getSexo() == 'M' ? 'o' : 'a');
        $values['a_o'] = ($aluno->getSexo() == 'M' ? 'o' : 'a');
        $values['serie'] = $aluno->getTbcursoversao()->getDescricao();
        $values['nome_aluno'] = $aluno->getNome();
        $values['dt_nascimento'] = $aluno->getDtNascimento('d/m/Y');
        $values['rg'] = $aluno->getRg();
        $values['naturalidade'] = $aluno->getTbcidade();
        $values['nacionalidade'] = $aluno->getTbpais();
        $values['sexo'] = ($aluno->getSexo() == 'M' ? 'Masculino' : 'Feminino');
        $values['religiao'] = $aluno->getTbreligiao()->getDescricao();
        $values['cor_raca'] = $aluno->getTbalunoracacor()->getDescricao();
        $values['has_irmaos'] = ($aluno->getQtdIrmaos() > 0 ? 'Sim, ' . $aluno->getQtdIrmaos() : 'Não' );
        $values['is_pne'] = ($aluno->getIdNecesEspecial() != 0 ? 'Sim' : 'Não');
        $values['pne'] = ($aluno->getIdNecesEspecial() != 0 ? $aluno->getTbnecesespecial()->getDescricao() : '');
        $values['logradouro'] = $aluno->getTblogradouroRelatedByCep()->getDescricao();
        $values['numero'] = $aluno->getNumero();
        $values['bairro'] = $aluno->getTblogradouroRelatedByCep()->getTbbairro()->getDescricao();
        $values['fone'] = $aluno->getFoneResidencial();
        $values['celular'] = $aluno->getCelular();
        $values['cep'] = $aluno->getCep();
        $values['nome_pai'] = $aluno->getPai();
        $values['pai_fone'] = $aluno->getPaiFone();
        $values['pai_profissao'] = $aluno->getPaiProfissao();
        $values['pai_local_trabalho'] = $aluno->getPaiLocalTrabalho();
        $values['pai_nivel_instrucao'] = $aluno->getTbnivelinstrucaoRelatedByPaiIdNivelInstrucao()->getDescricao();
        $values['nome_mae'] = $aluno->getMae();
        $values['mae_fone'] = $aluno->getMaeFone();
        $values['mae_profissao'] = $aluno->getMaeProfissao();
        $values['mae_local_trabalho'] = $aluno->getMaeLocalTrabalho();
        $values['mae_nivel_instrucao'] = $aluno->getTbnivelinstrucaoRelatedByMaeIdNivelInstrucao()->getDescricao();
        $values['renda_familiar'] = $aluno->getRendaFamiliar();
        $values['dt_ingresso'] = $aluno->getDtIngresso('d/m/Y');
        
        $this->values = $values;
    }

}
