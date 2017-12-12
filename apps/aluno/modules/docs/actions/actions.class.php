<?php

/**
 * aviso actions.
 *
 * @package    derca
 * @subpackage aviso
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class docsActions extends sfActions {

    public function preExecute() {
        $this->aluno = $this->getUser()->getAttribute('aluno');
        $this->forward404Unless($this->aluno);
    }

    public function executeIndex(sfWebRequest $request) {
        
    }

    public function executeAproveitamento(sfWebRequest $request) {
        $aluno = new Tbaluno();
        $aluno = sfContext::getInstance()->getUser()->getAttribute('aluno');
        $this->curso = $aluno->getTbcursoversao()->getCodCurso();
        $this->aluno = $aluno->getNome()->getTbcursoversao()->getCodCurso();
    }

    public function executeDeclaracaoMatricula(sfWebRequest $request) {
        $aluno = new Tbaluno();
        $aluno = sfContext::getInstance()->getUser()->getAttribute('aluno');
        $sem = TbperiodoPeer::getSemestreAtual($aluno);
        $semestre = $sem->getIdPeriodo();

        //invalidar declaracoes antigas
        $criteria = new Criteria();
        $criteria->add(TbvalidacaoPeer::MATRICULA, $aluno->getMatricula());
        foreach (TbvalidacaoPeer::doSelect($criteria) as $val) {
            $val->setAtivo(0);
            $val->save();
        }

        //autenticacao
        $auth = new Tbvalidacao();
        $auth->setMatricula($aluno->getMatricula());
        $auth->setNumAuth("temp");
        $auth->setIdTipo(1);
        $auth->setAtivo(1);
        $auth->setData(strftime("%m/%d/%Y"));
        $auth->setHora(strftime("%H:%M:%S"));
        $auth->save();
        $auth->setNumAuth($auth->getId());
        $auth->save();
        $values['num_auth'] = $auth->getNumAuth();
        $values['data_emissao'] = $auth->getData('d/m/Y') . " " . $auth->getHora('H:i:s');

        //define o tipo de declaracao, com ou sem fila
        if (count($aluno->getDisciplinasPorSemestre($semestre)) > 0) {
            $template = "aluno_regular_com";
            $this->disciplinas = $aluno->getDisciplinasPorSemestre($semestre);
            $values['semestre'] = $sem->getAno() . "." . $sem->getSemestre();
        } else {
            $template = "aluno_regular_sem";
        }

        //informacoes do aluno e do semestre
        $values['semestre2'] = $sem->getAno() . "." . $sem->getSemestre();
        $values['matricula'] = $aluno->getMatricula();
        $values['curso'] = $aluno->getTbcurso()->getDescricao();
        $values['nome'] = $aluno->getNome();
        $values['cpf'] = $aluno->getCpf();
        $values['nivel'] = $aluno->getTbcursoversao()->getTbformacao()->getDescricao();
        $values['turno'] = $aluno->getTbcursoversao()->getTbturno()->getDescricao();
        $values['dt_ingresso'] = $aluno->getDtIngresso('d/m/Y');
        $values['tipo_ingresso'] = $aluno->getTbtipoingresso()->getDescricao();
        $values['situacao'] = $aluno->getTbalunosituacao()->getDescricao();
        $values['ano_min'] = $aluno->getTbcursoversao()->getPrazoMin();
        $values['ano_max'] = $aluno->getTbcursoversao()->getPrazoMax();

        //caso seja aluno de especializacao
        if ($aluno->getTbcurso()->getDescricao() == "ESPECIALIZAÇÃO") {
            $values['curso'] = $aluno->getTbcursoversao()->getDescricao();
            $template = "aluno_regular_esp";
        } else {
            //informacoes do curso
            $values['ch_curso'] = $aluno->getTbcursoversao()->getChTotal();
            $values['ch_curso_obrig'] = $aluno->getTbcursoversao()->getChObr();
            $values['ch_curso_ele'] = $aluno->getTbcursoversao()->getChEletiva();
            $values['ch_obr_cursada'] = $aluno->getChObrigCursada();
            $values['ch_ele_cursada'] = $aluno->getChCursada(true);
            $values['ch_total'] = $values['ch_obr_cursada'] + $values['ch_ele_cursada'];
            $values['ch_restante_obr'] = $values['ch_obr_cursada'] - $values['ch_curso_obrig'];
            $values['ch_restante_ele'] = $values['ch_ele_cursada'] - $values['ch_curso_ele'];
            $values['ch_restante_total'] = $values['ch_restante_obr'] + $values['ch_restante_ele'];
        }
        $this->template = $template;
        $this->values = $values;
        $this->setLayout('none');
    }

    public function executeDeclaracaoHistorico(sfWebRequest $request) {
        $aluno = new Tbaluno();
        $aluno = sfContext::getInstance()->getUser()->getAttribute('aluno');
        $template = 'historico';
        $matricula = $aluno->getMatricula();
        $versao = $aluno->getTbcursoversao();
        $values = array();

        $values['curso'] = $aluno->getTbcurso()->getDescricao();
        $values['nome'] = $aluno->getNome();
        $values['matricula'] = $matricula;
        $values['dt_nascimento'] = $aluno->getDtNascimento('d/m/Y');
        $values['pai'] = $aluno->getPai();
        $values['mae'] = $aluno->getMae();
        $values['seg_grau'] = $aluno->getTbinstexternaRelatedById2grau() ? $aluno->getTbinstexternaRelatedById2grau()->getDescricao() : "Sem informação";
        $values['seg_ano'] = $aluno->getAnoConcl2grau();
        $values['rg'] = $aluno->getRg();
        $values['rg_exp'] = $aluno->getRgOrgExped();
        $values['cpf'] = $aluno->getCpf();

        $values['curso'] = $versao->getDescricao();
        $values['formacao'] = $versao->getTbformacao()->getDescricao();
        $values['cod_curso'] = $aluno->getTbcurso()->getCodCurso();
        $values['prazo'] = $versao->getPrazoMin() . 'Anos / ' . $versao->getPrazoMax() . " Anos";
        $values['titulo'] = $aluno->getTitulo() != '' ? $aluno->getTitulo() . '/' . $aluno->getTituloZona() . '/' . $aluno->getTituloSecao() : '';

        $this->historico = $aluno->getHistoricoAtual();

        $values['tipo_ingresso'] = $aluno->getTbtipoingresso()->getDescricao();
        $values['data_ingresso'] = $aluno->getDtIngresso('d/m/Y');
        $values['situacao'] = $aluno->getTbalunosituacao()->getDescricao();
        $values['ch_obrig'] = $versao->getChObr();
        $values['ch_ele'] = $versao->getChEletiva();
        $values['ch_total'] = $versao->getChTotal();
        $this->template = $template;
        $this->values = $values;
        if (count($this->historico) == 0) {
            $this->message = "Nenhum registro no historico";
        }
    }

}
