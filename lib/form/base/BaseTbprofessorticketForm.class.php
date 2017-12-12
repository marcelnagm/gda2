<?php

/**
 * Tbprofessorticket form base class.
 *
 * @method Tbprofessorticket getObject() Returns the current form's model object
 *
 * @package    derca
 * @subpackage form
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbprofessorticketForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_professorticket' => new sfWidgetFormInputHidden(),
      'id_periodo'         => new sfWidgetFormPropelChoice(array('model' => 'Tbperiodo', 'add_empty' => false)),
      'matricula_prof'     => new sfWidgetFormPropelChoice(array('model' => 'Tbprofessor', 'add_empty' => true)),
      'dt_inicio'          => new sfWidgetFormDate(),
      'dt_fim'             => new sfWidgetFormDate(),
      'created_at'         => new sfWidgetFormDate(),
      'updated_at'         => new sfWidgetFormDate(),
      'created_by'         => new sfWidgetFormInputText(),
      'updated_by'         => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_professorticket' => new sfValidatorPropelChoice(array('model' => 'Tbprofessorticket', 'column' => 'id_professorticket', 'required' => false)),
      'id_periodo'         => new sfValidatorPropelChoice(array('model' => 'Tbperiodo', 'column' => 'id_periodo')),
      'matricula_prof'     => new sfValidatorPropelChoice(array('model' => 'Tbprofessor', 'column' => 'matricula_prof', 'required' => false)),
      'dt_inicio'          => new sfValidatorDate(array('required' => false)),
      'dt_fim'             => new sfValidatorDate(array('required' => false)),
      'created_at'         => new sfValidatorDate(array('required' => false)),
      'updated_at'         => new sfValidatorDate(array('required' => false)),
      'created_by'         => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'updated_by'         => new sfValidatorString(array('max_length' => 20, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'Tbprofessorticket', 'column' => array('matricula_prof')))
    );

    $this->widgetSchema->setNameFormat('tbprofessorticket[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tbprofessorticket';
  }


}
