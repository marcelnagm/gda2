<?php

/**
 * Tbaviso form base class.
 *
 * @method Tbaviso getObject() Returns the current form's model object
 *
 * @package    derca
 * @subpackage form
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbavisoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_aviso'   => new sfWidgetFormInputHidden(),
      'titulo'     => new sfWidgetFormInputText(),
      'texto'      => new sfWidgetFormTextarea(),
      'publicado'  => new sfWidgetFormInputCheckbox(),
      'local'      => new sfWidgetFormPropelChoice(array('model' => 'TbavisoLocal', 'add_empty' => false, 'key_method' => 'getNome')),
      'created_at' => new sfWidgetFormDate(),
      'updated_at' => new sfWidgetFormDate(),
      'created_by' => new sfWidgetFormInputText(),
      'updated_by' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_aviso'   => new sfValidatorPropelChoice(array('model' => 'Tbaviso', 'column' => 'id_aviso', 'required' => false)),
      'titulo'     => new sfValidatorString(array('max_length' => 50)),
      'texto'      => new sfValidatorString(array('required' => false)),
      'publicado'  => new sfValidatorBoolean(array('required' => false)),
      'local'      => new sfValidatorPropelChoice(array('model' => 'TbavisoLocal', 'column' => 'nome')),
      'created_at' => new sfValidatorDate(array('required' => false)),
      'updated_at' => new sfValidatorDate(array('required' => false)),
      'created_by' => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'updated_by' => new sfValidatorString(array('max_length' => 20, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tbaviso[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tbaviso';
  }


}
