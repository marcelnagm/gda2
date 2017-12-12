<?php

/**
 * Tbprofessorsenha form base class.
 *
 * @method Tbprofessorsenha getObject() Returns the current form's model object
 *
 * @package    derca
 * @subpackage form
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbprofessorsenhaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'matricula_prof' => new sfWidgetFormPropelChoice(array('model' => 'Tbprofessor', 'add_empty' => false)),
      'senha'          => new sfWidgetFormInputText(),
      'created_at'     => new sfWidgetFormDate(),
      'updated_at'     => new sfWidgetFormDate(),
      'created_by'     => new sfWidgetFormInputText(),
      'updated_by'     => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorPropelChoice(array('model' => 'Tbprofessorsenha', 'column' => 'id', 'required' => false)),
      'matricula_prof' => new sfValidatorPropelChoice(array('model' => 'Tbprofessor', 'column' => 'matricula_prof')),
      'senha'          => new sfValidatorString(array('max_length' => 255)),
      'created_at'     => new sfValidatorDate(array('required' => false)),
      'updated_at'     => new sfValidatorDate(array('required' => false)),
      'created_by'     => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'updated_by'     => new sfValidatorString(array('max_length' => 20, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'Tbprofessorsenha', 'column' => array('matricula_prof')))
    );

    $this->widgetSchema->setNameFormat('tbprofessorsenha[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tbprofessorsenha';
  }


}
