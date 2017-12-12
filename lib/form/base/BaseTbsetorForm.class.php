<?php

/**
 * Tbsetor form base class.
 *
 * @method Tbsetor getObject() Returns the current form's model object
 *
 * @package    derca
 * @subpackage form
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbsetorForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_setor'   => new sfWidgetFormInputHidden(),
      'descricao'  => new sfWidgetFormInputText(),
      'sucinto'    => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormDate(),
      'updated_at' => new sfWidgetFormDate(),
      'created_by' => new sfWidgetFormInputText(),
      'updated_by' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_setor'   => new sfValidatorPropelChoice(array('model' => 'Tbsetor', 'column' => 'id_setor', 'required' => false)),
      'descricao'  => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'sucinto'    => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'created_at' => new sfValidatorDate(array('required' => false)),
      'updated_at' => new sfValidatorDate(array('required' => false)),
      'created_by' => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'updated_by' => new sfValidatorString(array('max_length' => 20, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tbsetor[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tbsetor';
  }


}
