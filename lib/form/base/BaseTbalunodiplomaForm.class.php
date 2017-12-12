<?php

/**
 * Tbalunodiploma form base class.
 *
 * @method Tbalunodiploma getObject() Returns the current form's model object
 *
 * @package    derca
 * @subpackage form
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbalunodiplomaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_aluno_diploma'     => new sfWidgetFormInputHidden(),
      'matricula'            => new sfWidgetFormPropelChoice(array('model' => 'Tbaluno', 'add_empty' => true)),
      'dt_entrega'           => new sfWidgetFormDate(),
      'dt_entrega_historico' => new sfWidgetFormDate(),
      'dt_enade'             => new sfWidgetFormDate(),
      'n_registro'           => new sfWidgetFormInputText(),
      'dt_registro'          => new sfWidgetFormDate(),
      'livro'                => new sfWidgetFormInputText(),
      'folha'                => new sfWidgetFormInputText(),
      'n_processo'           => new sfWidgetFormInputText(),
      'obs'                  => new sfWidgetFormTextarea(),
      'created_at'           => new sfWidgetFormDate(),
      'updated_at'           => new sfWidgetFormDate(),
      'created_by'           => new sfWidgetFormInputText(),
      'updated_by'           => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_aluno_diploma'     => new sfValidatorPropelChoice(array('model' => 'Tbalunodiploma', 'column' => 'id_aluno_diploma', 'required' => false)),
      'matricula'            => new sfValidatorPropelChoice(array('model' => 'Tbaluno', 'column' => 'matricula', 'required' => false)),
      'dt_entrega'           => new sfValidatorDate(array('required' => false)),
      'dt_entrega_historico' => new sfValidatorDate(array('required' => false)),
      'dt_enade'             => new sfValidatorDate(array('required' => false)),
      'n_registro'           => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'dt_registro'          => new sfValidatorDate(array('required' => false)),
      'livro'                => new sfValidatorString(array('max_length' => 8, 'required' => false)),
      'folha'                => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'n_processo'           => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'obs'                  => new sfValidatorString(array('required' => false)),
      'created_at'           => new sfValidatorDate(array('required' => false)),
      'updated_at'           => new sfValidatorDate(array('required' => false)),
      'created_by'           => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'updated_by'           => new sfValidatorString(array('max_length' => 20, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorPropelUnique(array('model' => 'Tbalunodiploma', 'column' => array('matricula'))),
        new sfValidatorPropelUnique(array('model' => 'Tbalunodiploma', 'column' => array('matricula', 'n_registro', 'livro'))),
      ))
    );

    $this->widgetSchema->setNameFormat('tbalunodiploma[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tbalunodiploma';
  }


}
