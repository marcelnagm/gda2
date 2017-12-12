<?php

/**
 * Tboferta filter form base class.
 *
 * @package    derca
 * @subpackage filter
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbofertaFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_periodo'         => new sfWidgetFormPropelChoice(array('model' => 'Tbperiodo', 'add_empty' => true)),
      'id_turno'           => new sfWidgetFormPropelChoice(array('model' => 'Tbturno', 'add_empty' => true)),
      'cod_curso'          => new sfWidgetFormPropelChoice(array('model' => 'Tbcurso', 'add_empty' => true)),
      'cod_curso_destino'  => new sfWidgetFormPropelChoice(array('model' => 'Tbcurso', 'add_empty' => true)),
      'cod_disciplina'     => new sfWidgetFormPropelChoice(array('model' => 'Tbdisciplina', 'add_empty' => true)),
      'turma'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'id_sala'            => new sfWidgetFormPropelChoice(array('model' => 'Tbsala', 'add_empty' => true)),
      'vagas'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'matriculados'       => new sfWidgetFormFilterInput(),
      'excesso'            => new sfWidgetFormFilterInput(),
      'cancelados'         => new sfWidgetFormFilterInput(),
      'trancados'          => new sfWidgetFormFilterInput(),
      'id_matricula_prof'  => new sfWidgetFormPropelChoice(array('model' => 'Tbprofessor', 'add_empty' => true)),
      'id_matricula_prof2' => new sfWidgetFormPropelChoice(array('model' => 'Tbprofessor', 'add_empty' => true)),
      'id_setor'           => new sfWidgetFormPropelChoice(array('model' => 'Tbsetor', 'add_empty' => true)),
      'dt_inicio'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'dt_fim'             => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'id_situacao'        => new sfWidgetFormPropelChoice(array('model' => 'Tbofertasituacao', 'add_empty' => true)),
      'id_polo'            => new sfWidgetFormPropelChoice(array('model' => 'Tbpolos', 'add_empty' => true)),
      'created_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'created_by'         => new sfWidgetFormFilterInput(),
      'updated_by'         => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'id_periodo'         => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tbperiodo', 'column' => 'id_periodo')),
      'id_turno'           => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tbturno', 'column' => 'id_turno')),
      'cod_curso'          => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tbcurso', 'column' => 'cod_curso')),
      'cod_curso_destino'  => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tbcurso', 'column' => 'cod_curso')),
      'cod_disciplina'     => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tbdisciplina', 'column' => 'cod_disciplina')),
      'turma'              => new sfValidatorPass(array('required' => false)),
      'id_sala'            => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tbsala', 'column' => 'id_sala')),
      'vagas'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'matriculados'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'excesso'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'cancelados'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'trancados'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_matricula_prof'  => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tbprofessor', 'column' => 'matricula_prof')),
      'id_matricula_prof2' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tbprofessor', 'column' => 'matricula_prof')),
      'id_setor'           => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tbsetor', 'column' => 'id_setor')),
      'dt_inicio'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'dt_fim'             => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'id_situacao'        => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tbofertasituacao', 'column' => 'id_situacao')),
      'id_polo'            => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tbpolos', 'column' => 'id_polo')),
      'created_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'created_by'         => new sfValidatorPass(array('required' => false)),
      'updated_by'         => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tboferta_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tboferta';
  }

  public function getFields()
  {
    return array(
      'id_oferta'          => 'Number',
      'id_periodo'         => 'ForeignKey',
      'id_turno'           => 'ForeignKey',
      'cod_curso'          => 'ForeignKey',
      'cod_curso_destino'  => 'ForeignKey',
      'cod_disciplina'     => 'ForeignKey',
      'turma'              => 'Text',
      'id_sala'            => 'ForeignKey',
      'vagas'              => 'Number',
      'matriculados'       => 'Number',
      'excesso'            => 'Number',
      'cancelados'         => 'Number',
      'trancados'          => 'Number',
      'id_matricula_prof'  => 'ForeignKey',
      'id_matricula_prof2' => 'ForeignKey',
      'id_setor'           => 'ForeignKey',
      'dt_inicio'          => 'Date',
      'dt_fim'             => 'Date',
      'id_situacao'        => 'ForeignKey',
      'id_polo'            => 'ForeignKey',
      'created_at'         => 'Date',
      'updated_at'         => 'Date',
      'created_by'         => 'Text',
      'updated_by'         => 'Text',
    );
  }
}
