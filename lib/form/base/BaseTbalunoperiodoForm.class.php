<?php

/**
 * Tbalunoperiodo form base class.
 *
 * @method Tbalunoperiodo getObject() Returns the current form's model object
 *
 * @package    derca
 * @subpackage form
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbalunoperiodoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_aluno_periodo' => new sfWidgetFormInputHidden(),
      'matricula'        => new sfWidgetFormInputText(),
      'created_at'       => new sfWidgetFormDate(),
      'updated_at'       => new sfWidgetFormDate(),
      'created_by'       => new sfWidgetFormInputText(),
      'updated_by'       => new sfWidgetFormInputText(),
      'id_periodo'       => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_aluno_periodo' => new sfValidatorPropelChoice(array('model' => 'Tbalunoperiodo', 'column' => 'id_aluno_periodo', 'required' => false)),
      'matricula'        => new sfValidatorInteger(array('min' => -9.2233720368548E+18, 'max' => 9.2233720368548E+18, 'required' => false)),
      'created_at'       => new sfValidatorDate(array('required' => false)),
      'updated_at'       => new sfValidatorDate(array('required' => false)),
      'created_by'       => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'updated_by'       => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'id_periodo'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tbalunoperiodo[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tbalunoperiodo';
  }


}
