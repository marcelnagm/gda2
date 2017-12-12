<?php

/**
 * Tbcursoversao filter form base class.
 *
 * @package    derca
 * @subpackage filter
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbcursoversaoFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_formacao'             => new sfWidgetFormPropelChoice(array('model' => 'Tbformacao', 'add_empty' => true)),
      'cod_curso'               => new sfWidgetFormPropelChoice(array('model' => 'Tbcurso', 'add_empty' => true)),
      'id_turno'                => new sfWidgetFormPropelChoice(array('model' => 'Tbturno', 'add_empty' => true)),
      'descricao'               => new sfWidgetFormFilterInput(),
      'situacao'                => new sfWidgetFormFilterInput(),
      'doc_criacao'             => new sfWidgetFormFilterInput(),
      'dt_criacao'              => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'dt_inicio'               => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'dt_termino'              => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'id_campus'               => new sfWidgetFormPropelChoice(array('model' => 'Tbcampus', 'add_empty' => true)),
      'id_setor'                => new sfWidgetFormPropelChoice(array('model' => 'Tbsetor', 'add_empty' => true)),
      'prazo_min'               => new sfWidgetFormFilterInput(),
      'prazo_max'               => new sfWidgetFormFilterInput(),
      'cred_obr'                => new sfWidgetFormFilterInput(),
      'cred_eletivo'            => new sfWidgetFormFilterInput(),
      'cred_total'              => new sfWidgetFormFilterInput(),
      'ch_obr'                  => new sfWidgetFormFilterInput(),
      'ch_eletiva'              => new sfWidgetFormFilterInput(),
      'ch_total'                => new sfWidgetFormFilterInput(),
      'semestre_inicio'         => new sfWidgetFormFilterInput(),
      'cod_integracao'          => new sfWidgetFormFilterInput(),
      'cod_integracao_tipo'     => new sfWidgetFormFilterInput(),
      'created_at'              => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'              => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'created_by'              => new sfWidgetFormFilterInput(),
      'updated_by'              => new sfWidgetFormFilterInput(),
      'tbcoordenadorcurso_list' => new sfWidgetFormPropelChoice(array('model' => 'Tbprofessor', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id_formacao'             => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tbformacao', 'column' => 'id_formacao')),
      'cod_curso'               => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tbcurso', 'column' => 'cod_curso')),
      'id_turno'                => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tbturno', 'column' => 'id_turno')),
      'descricao'               => new sfValidatorPass(array('required' => false)),
      'situacao'                => new sfValidatorPass(array('required' => false)),
      'doc_criacao'             => new sfValidatorPass(array('required' => false)),
      'dt_criacao'              => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'dt_inicio'               => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'dt_termino'              => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'id_campus'               => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tbcampus', 'column' => 'id_campus')),
      'id_setor'                => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tbsetor', 'column' => 'id_setor')),
      'prazo_min'               => new sfValidatorPass(array('required' => false)),
      'prazo_max'               => new sfValidatorPass(array('required' => false)),
      'cred_obr'                => new sfValidatorPass(array('required' => false)),
      'cred_eletivo'            => new sfValidatorPass(array('required' => false)),
      'cred_total'              => new sfValidatorPass(array('required' => false)),
      'ch_obr'                  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'ch_eletiva'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'ch_total'                => new sfValidatorPass(array('required' => false)),
      'semestre_inicio'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'cod_integracao'          => new sfValidatorPass(array('required' => false)),
      'cod_integracao_tipo'     => new sfValidatorPass(array('required' => false)),
      'created_at'              => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'              => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'created_by'              => new sfValidatorPass(array('required' => false)),
      'updated_by'              => new sfValidatorPass(array('required' => false)),
      'tbcoordenadorcurso_list' => new sfValidatorPropelChoice(array('model' => 'Tbprofessor', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tbcursoversao_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
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

    $criteria->addJoin(TbcoordenadorcursoPeer::ID_VERSAO_CURSO, TbcursoversaoPeer::ID_VERSAO_CURSO);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(TbcoordenadorcursoPeer::MATRICULA_PROF, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(TbcoordenadorcursoPeer::MATRICULA_PROF, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'Tbcursoversao';
  }

  public function getFields()
  {
    return array(
      'id_versao_curso'         => 'Number',
      'id_formacao'             => 'ForeignKey',
      'cod_curso'               => 'ForeignKey',
      'id_turno'                => 'ForeignKey',
      'descricao'               => 'Text',
      'situacao'                => 'Text',
      'doc_criacao'             => 'Text',
      'dt_criacao'              => 'Date',
      'dt_inicio'               => 'Date',
      'dt_termino'              => 'Date',
      'id_campus'               => 'ForeignKey',
      'id_setor'                => 'ForeignKey',
      'prazo_min'               => 'Text',
      'prazo_max'               => 'Text',
      'cred_obr'                => 'Text',
      'cred_eletivo'            => 'Text',
      'cred_total'              => 'Text',
      'ch_obr'                  => 'Number',
      'ch_eletiva'              => 'Number',
      'ch_total'                => 'Text',
      'semestre_inicio'         => 'Number',
      'cod_integracao'          => 'Text',
      'cod_integracao_tipo'     => 'Text',
      'created_at'              => 'Date',
      'updated_at'              => 'Date',
      'created_by'              => 'Text',
      'updated_by'              => 'Text',
      'tbcoordenadorcurso_list' => 'ManyKey',
    );
  }
}
