<?php

/**
 * Tbfila filter form.
 *
 * @package    derca
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class TbfilaFormFilter extends BaseTbfilaFormFilter {
    public function configure() {

        unset($this['id_oferta']);

        unset($this['matricula']);

       $this->widgetSchema['matricula'] = new sfWidgetFormFilterInput(array('with_empty'=>false),array());
       $this->validatorSchema['matricula'] = new sfValidatorSchemaFilter('text', new sfValidatorString(array('required' => false)));
//-2.2337203685E+28

        $this->widgetSchema['nome'] = new sfWidgetFormFilterInput(array('with_empty' => false),array('size'=>50));
        $this->validatorSchema['nome'] = new sfValidatorPass(array('required' => false));

        $this->widgetSchema['formando'] = new sfWidgetFormInputCheckbox(array(),array('value' => 1));
        $this->validatorSchema['formando'] = new sfValidatorPass(array('required' => false));

        $this->widgetSchema['id_situacao']->setOption('add_empty',false);
        $this->widgetSchema['id_situacao']->setOption('multiple',true);
        $this->validatorSchema['id_situacao']->setOption('multiple',true);

        $this->widgetSchema['id_periodo'] = new sfWidgetFormPropelChoice(array('model' => 'Tbperiodo', 'add_empty' => true));
        $this->validatorSchema['id_periodo'] = new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tbperiodo', 'column' => 'id_periodo'));

        $this->widgetSchema['cod_disciplina'] = new sfWidgetFormPropelChoice(array('model' => 'Tbdisciplina', 'add_empty' => true));
        $this->validatorSchema['cod_disciplina'] = new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tbdisciplina', 'column' => 'cod_disciplina'));

        $this->widgetSchema['turma'] = new sfWidgetFormFilterInput(array('with_empty' => false),array('size'=>10));
        $this->validatorSchema['turma'] = new sfValidatorPass(array('required' => false));

        $this->widgetSchema['cod_curso'] = new sfWidgetFormPropelChoice(array('model' => 'Tbcurso', 'add_empty' => true));
        $this->validatorSchema['cod_curso'] = new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tbcurso', 'column' => 'cod_curso'));


    }

    public function getFields() {
        $fields = parent::getFields();
        $fields['nome'] = 'Text';
        $fields['turma'] = 'Text';
        $fields['id_periodo'] = 'ForeignKey';
        $fields['cod_disciplina'] = 'ForeignKey';
        $fields['cod_curso'] = 'ForeignKey';
        return $fields;
    }

    protected function addIdPeriodoColumnCriteria(Criteria $criteria, $field, $value) {
        if (!empty($value)) {
            $criteria->addJoin(TbfilaPeer::ID_OFERTA,TbofertaPeer::ID_OFERTA);
            $criteria->add(TbofertaPeer::ID_PERIODO, $value);
            return $criteria;
        }
    }

    protected function addCodCursoColumnCriteria(Criteria $criteria, $field, $value) {
        if (!empty($value)) {
            $criteria->addJoin(TbfilaPeer::MATRICULA,TbalunoPeer::MATRICULA);
            $criteria->addJoin(TbalunoPeer::ID_VERSAO_CURSO,TbcursoversaoPeer::ID_VERSAO_CURSO);
            $criteria->add(TbcursoversaoPeer::COD_CURSO, $value);
            return $criteria;
        }
    }

    protected function addCodDisciplinaColumnCriteria(Criteria $criteria, $field, $value) {
        if (!empty($value)) {
            $criteria->addJoin(TbfilaPeer::ID_OFERTA,TbofertaPeer::ID_OFERTA);
            $criteria->add(TbofertaPeer::COD_DISCIPLINA, $value);
            return $criteria;
        }
    }

    protected function addNomeColumnCriteria(Criteria $criteria, $field, $value) {
        if (isset($value['text']) && !empty($value['text'])) {
            $criteria->addJoin(TbfilaPeer::MATRICULA,TbalunoPeer::MATRICULA);
            $criteria->add(TbalunoPeer::NOME, "%".$value['text']."%", Criteria::LIKE);
            return $criteria;
        }
    }

    protected function addFormandoColumnCriteria(Criteria $criteria, $field, $value) {
        if (!empty($value)) {
            $criteria->add(TbfilaPeer::FORMANDO, 1);
            return $criteria;
        }
    }

    protected function addMatriculaColumnCriteria(Criteria $criteria, $field, $value) {
        if (isset($value['text']) && !empty($value['text'])) {
            $criteria->add(TbfilaPeer::MATRICULA, TbfilaPeer::MATRICULA."::varchar LIKE '".$value['text']."'", Criteria::CUSTOM);
            return $criteria;
        }
    }

    protected function addTurmaColumnCriteria(Criteria $criteria, $field, $value) {
        if (isset($value['text']) && !empty($value['text'])) {
            $criteria->addJoin(TbfilaPeer::ID_OFERTA,TbofertaPeer::ID_OFERTA);
            $criteria->add(TbofertaPeer::TURMA, $value['text']);
            return $criteria;
        }
    }

}
