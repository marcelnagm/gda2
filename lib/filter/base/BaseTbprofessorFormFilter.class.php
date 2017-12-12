<?php

/**
 * Tbprofessor filter form base class.
 *
 * @package    derca
 * @subpackage filter
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbprofessorFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_pessoa'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'cpf'                     => new sfWidgetFormFilterInput(),
      'siape'                   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'nome'                    => new sfWidgetFormFilterInput(),
      'celular'                 => new sfWidgetFormFilterInput(),
      'fone_residencial'        => new sfWidgetFormFilterInput(),
      'email'                   => new sfWidgetFormFilterInput(),
      'foto'                    => new sfWidgetFormFilterInput(),
      'id_neces_especial'       => new sfWidgetFormPropelChoice(array('model' => 'Tbnecesespecial', 'add_empty' => true)),
      'cod_curso'               => new sfWidgetFormPropelChoice(array('model' => 'Tbcurso', 'add_empty' => true)),
      'id_tipo_vinculo'         => new sfWidgetFormPropelChoice(array('model' => 'Tbproftipovinculo', 'add_empty' => true)),
      'id_formacao'             => new sfWidgetFormPropelChoice(array('model' => 'Tbformacao', 'add_empty' => true)),
      'id_prof_sit'             => new sfWidgetFormPropelChoice(array('model' => 'Tbprofessorsituacao', 'add_empty' => true)),
      'id_setor'                => new sfWidgetFormPropelChoice(array('model' => 'Tbsetor', 'add_empty' => true)),
      'coordenador'             => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'created_at'              => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'              => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'created_by'              => new sfWidgetFormFilterInput(),
      'updated_by'              => new sfWidgetFormFilterInput(),
      'tbturma_professor_list'  => new sfWidgetFormPropelChoice(array('model' => 'Tbturma', 'add_empty' => true)),
      'tbcoordenadorcurso_list' => new sfWidgetFormPropelChoice(array('model' => 'Tbcursoversao', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id_pessoa'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'cpf'                     => new sfValidatorPass(array('required' => false)),
      'siape'                   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'nome'                    => new sfValidatorPass(array('required' => false)),
      'celular'                 => new sfValidatorPass(array('required' => false)),
      'fone_residencial'        => new sfValidatorPass(array('required' => false)),
      'email'                   => new sfValidatorPass(array('required' => false)),
      'foto'                    => new sfValidatorPass(array('required' => false)),
      'id_neces_especial'       => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tbnecesespecial', 'column' => 'id_neces_especial')),
      'cod_curso'               => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tbcurso', 'column' => 'cod_curso')),
      'id_tipo_vinculo'         => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tbproftipovinculo', 'column' => 'id_tipo_vinculo')),
      'id_formacao'             => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tbformacao', 'column' => 'id_formacao')),
      'id_prof_sit'             => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tbprofessorsituacao', 'column' => 'id_situacao')),
      'id_setor'                => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tbsetor', 'column' => 'id_setor')),
      'coordenador'             => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'created_at'              => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'              => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'created_by'              => new sfValidatorPass(array('required' => false)),
      'updated_by'              => new sfValidatorPass(array('required' => false)),
      'tbturma_professor_list'  => new sfValidatorPropelChoice(array('model' => 'Tbturma', 'required' => false)),
      'tbcoordenadorcurso_list' => new sfValidatorPropelChoice(array('model' => 'Tbcursoversao', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tbprofessor_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function addTbturmaProfessorListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(TbturmaProfessorPeer::MATRICULA_PROF, TbprofessorPeer::MATRICULA_PROF);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(TbturmaProfessorPeer::ID_TURMA, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(TbturmaProfessorPeer::ID_TURMA, $value));
    }

    $criteria->add($criterion);
  }

  public function addTbcoordenadorcursoListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(TbcoordenadorcursoPeer::MATRICULA_PROF, TbprofessorPeer::MATRICULA_PROF);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(TbcoordenadorcursoPeer::ID_VERSAO_CURSO, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(TbcoordenadorcursoPeer::ID_VERSAO_CURSO, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'Tbprofessor';
  }

  public function getFields()
  {
    return array(
      'id_pessoa'               => 'Number',
      'matricula_prof'          => 'Number',
      'cpf'                     => 'Text',
      'siape'                   => 'Number',
      'nome'                    => 'Text',
      'celular'                 => 'Text',
      'fone_residencial'        => 'Text',
      'email'                   => 'Text',
      'foto'                    => 'Text',
      'id_neces_especial'       => 'ForeignKey',
      'cod_curso'               => 'ForeignKey',
      'id_tipo_vinculo'         => 'ForeignKey',
      'id_formacao'             => 'ForeignKey',
      'id_prof_sit'             => 'ForeignKey',
      'id_setor'                => 'ForeignKey',
      'coordenador'             => 'Boolean',
      'created_at'              => 'Date',
      'updated_at'              => 'Date',
      'created_by'              => 'Text',
      'updated_by'              => 'Text',
      'tbturma_professor_list'  => 'ManyKey',
      'tbcoordenadorcurso_list' => 'ManyKey',
    );
  }
}
