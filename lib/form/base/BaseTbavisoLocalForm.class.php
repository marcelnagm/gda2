<?php

/**
 * TbavisoLocal form base class.
 *
 * @method TbavisoLocal getObject() Returns the current form's model object
 *
 * @package    derca
 * @subpackage form
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbavisoLocalForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_local'   => new sfWidgetFormInputHidden(),
      'nome'       => new sfWidgetFormInputText(),
      'descricao'  => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormDate(),
      'updated_at' => new sfWidgetFormDate(),
      'created_by' => new sfWidgetFormInputText(),
      'updated_by' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_local'   => new sfValidatorPropelChoice(array('model' => 'TbavisoLocal', 'column' => 'id_local', 'required' => false)),
      'nome'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'descricao'  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at' => new sfValidatorDate(array('required' => false)),
      'updated_at' => new sfValidatorDate(array('required' => false)),
      'created_by' => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'updated_by' => new sfValidatorString(array('max_length' => 20, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'TbavisoLocal', 'column' => array('nome')))
    );

    $this->widgetSchema->setNameFormat('tbaviso_local[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TbavisoLocal';
  }


}
