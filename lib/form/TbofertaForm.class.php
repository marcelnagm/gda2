<?php

/**
 * Tboferta form.
 *
 * @package    derca
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class TbofertaForm extends BaseTbofertaForm {

    public function configure() {

        unset($this['matriculados']);
        unset($this['excesso']);
        unset($this['cancelados']);
        unset($this['trancados']);
        if ($this->isNew)
            unset($this['id_situacao']);


        $this->widgetSchema['id_periodo']->setOption('order_by', array('Ano', 'DESC'));
        $this->widgetSchema['id_turno']->setOption('order_by', array('Descricao', 'ASC'));
        $this->widgetSchema['cod_curso']->setOption('order_by', array('Sucinto', 'ASC'));
        $this->widgetSchema['cod_curso_destino']->setOption('order_by', array('Sucinto', 'ASC'));
        $this->widgetSchema['cod_curso_destino']->addOption('add_empty', true);
        $this->widgetSchema['cod_curso_destino']->addOption('default', '');
        $this->widgetSchema['cod_disciplina']->setOption('order_by', array('Sucinto', 'ASC'));
        $this->widgetSchema['turma']->setAttribute('size', 5);
        $this->widgetSchema['vagas']->setAttribute('size', 3);
        $this->widgetSchema['id_sala']->setOption('order_by', array('Descricao', 'ASC'));
        $this->widgetSchema['id_setor']->setOption('order_by', array('Sucinto', 'ASC'));

        $criteria_professor_ativo = new Criteria();
        $criteria_professor_ativo->add(TbprofessorPeer::ID_PROF_SIT, 1); # ATIVO
        $this->widgetSchema['id_matricula_prof']->setOption('order_by', array('Nome', 'ASC'));
        $this->widgetSchema['id_matricula_prof']->setOption('criteria', $criteria_professor_ativo);
        $this->validatorSchema['id_matricula_prof']->setOption('criteria', $criteria_professor_ativo);

        if (sfContext::getInstance()->getUser()->hasAttribute('professor')) {
            $professor = sfContext::getInstance()->getUser()->getAttribute('professor');
            $criteria = new Criteria();
            $criteria->add(TbcursoPeer::COD_CURSO, $professor->getCodCurso());
            $this->getWidget('cod_curso')->setOption('criteria', $criteria);

            $criteria = new Criteria();
            $criteria->addJoin(TbsetorPeer::ID_SETOR, TbcursoversaoPeer::ID_SETOR);
            $criteria->add(TbcursoversaoPeer::COD_CURSO, 55, Criteria::NOT_EQUAL);
            $criteria->add(TbcursoversaoPeer::DESCRICAO, '%MESTRADO%', Criteria::NOT_LIKE);
            $this->getWidget('id_setor')->setOption('choices', TbsetorPeer::doSelect($criteria));

            $criteria->clear();
            $criteria->add(TbperiodoPeer::DT_INICIO_OFERTA_CADASTRO, date('Y-m-d'), Criteria::LESS_EQUAL);
            $criteria->add(TbperiodoPeer::DT_FIM_OFERTA_CADASTRO, date('Y-m-d'), Criteria::GREATER_EQUAL);
            $criteria->add(TbperiodoPeer::ID_NIVEL, $professor->getTbcurso()->getIdNivel());
            if (TbperiodoPeer::doCount($criteria) == 0) {
                $criteria->clear();
                $criteria->add(TbperiodoPeer::DT_INICIO_AJUSTE, date('Y-m-d'), Criteria::LESS_EQUAL);
                $criteria->add(TbperiodoPeer::DT_FIM_AJUSTE, date('Y-m-d'), Criteria::GREATER_EQUAL);
                $criteria->add(TbperiodoPeer::ID_NIVEL, $professor->getTbcurso()->getIdNivel());
                if (TbperiodoPeer::doCount($criteria) == 0) {
                    $criteria->clear();
                    $criteria->add(TbperiodoPeer::ID_PERIODO, TbperiodoPeer::getSemestreAtual($professor)->getIdPeriodo());
                }
            }
            $this->getWidget('id_periodo')->setOption('criteria', $criteria);

            $periodo = TbperiodoPeer::doSelectOne($criteria);
            $this->getWidget('dt_inicio')->setDefault($periodo->getDtInicio());
            $this->getWidget('dt_fim')->setDefault($periodo->getDtFim());

            $this->getWidget('id_sala')->setOption('default', 0);
            $this->getWidget('id_matricula_prof')->setOption('default', 1000);

            $this->getValidatorSchema()->setPostValidator(new sfOfertaValidator());
            $this->validatorSchema['turma'] = new sfValidatorString();

            if (sfContext::getInstance()->getUser()->hasAttribute('professor')) {
                $array = array();
                foreach ($professor->getTbcoordenadorcursos() as $coord) {
                    $array[] = $coord->getTbcursoversao()->getIdSetor();
                }
                $criteria = new Criteria();
                $criteria->addJoin(TbcurriculodisciplinasPeer::COD_DISCIPLINA, TbdisciplinaPeer::COD_DISCIPLINA);
                $criteria->addJoin(TbcursoversaoPeer::ID_VERSAO_CURSO, TbcurriculodisciplinasPeer::ID_VERSAO_CURSO);
                $criteria->add(TbcurriculodisciplinasPeer::ID_SETOR, $array, Criteria::IN);
//                $criteria->add(TbcursoversaoPeer::COD_CURSO, $professor->getCodCurso());
//                $criteria->add(TbcursoversaoPeer::SITUACAO, 'ATIV%', Criteria::LIKE);
                $criteria->addAscendingOrderByColumn(TbcurriculodisciplinasPeer::COD_DISCIPLINA);

                $this->getWidget('cod_disciplina')->setOption('criteria', $criteria);
            }
        }

//        $form = new TbofertahorarioForm();
//        $this->embedForm('tbofertahorario', $form);
    }

}