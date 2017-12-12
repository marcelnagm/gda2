<?php

/**
 * Tbsala form base class.
 *
 * @method Tbsala getObject() Returns the current form's model object
 *
 * @package    derca
 * @subpackage form
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbsalaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_sala'    => new sfWidgetFormInputHidden(),
      'bloco'      => new sfWidgetFormInputText(),
      'capacidade' => new sfWidgetFormInputText(),
      'descricao'  => new sfWidgetFormInputText(),
      'id_campus'  => new sfWidgetFormPropelChoice(array('model' => 'Tbcampus', 'add_empty' => true)),
      'numero'     => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormDate(),
      'updated_at' => new sfWidgetFormDate(),
      'created_by' => new sfWidgetFormInputText(),
      'updated_by' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_sala'    => new sfValidatorPropelChoice(array('model' => 'Tbsala', 'column' => 'id_sala', 'required' => false)),
      'bloco'      => new sfValidatorString(array('max_length' => 5, 'required' => false)),
      'capacidade' => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'descricao'  => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'id_campus'  => new sfValidatorPropelChoice(array('model' => 'Tbcampus', 'column' => 'id_campus', 'required' => false)),
      'numero'     => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'created_at' => new sfValidatorDate(array('required' => false)),
      'updated_at' => new sfValidatorDate(array('required' => false)),
      'created_by' => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'updated_by' => new sfValidatorString(array('max_length' => 20, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tbsala[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tbsala';
  }


}
