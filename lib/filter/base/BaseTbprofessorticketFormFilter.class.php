<?php

/**
 * Tbprofessorticket filter form base class.
 *
 * @package    derca
 * @subpackage filter
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbprofessorticketFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_periodo'         => new sfWidgetFormPropelChoice(array('model' => 'Tbperiodo', 'add_empty' => true)),
      'matricula_prof'     => new sfWidgetFormPropelChoice(array('model' => 'Tbprofessor', 'add_empty' => true)),
      'dt_inicio'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'dt_fim'             => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'created_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'created_by'         => new sfWidgetFormFilterInput(),
      'updated_by'         => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'id_periodo'         => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tbperiodo', 'column' => 'id_periodo')),
      'matricula_prof'     => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tbprofessor', 'column' => 'matricula_prof')),
      'dt_inicio'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'dt_fim'             => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'created_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'created_by'         => new sfValidatorPass(array('required' => false)),
      'updated_by'         => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tbprofessorticket_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tbprofessorticket';
  }

  public function getFields()
  {
    return array(
      'id_professorticket' => 'Number',
      'id_periodo'         => 'ForeignKey',
      'matricula_prof'     => 'ForeignKey',
      'dt_inicio'          => 'Date',
      'dt_fim'             => 'Date',
      'created_at'         => 'Date',
      'updated_at'         => 'Date',
      'created_by'         => 'Text',
      'updated_by'         => 'Text',
    );
  }
}
