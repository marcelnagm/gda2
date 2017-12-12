<?php

/**
 * Tbcampus form base class.
 *
 * @method Tbcampus getObject() Returns the current form's model object
 *
 * @package    derca
 * @subpackage form
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbcampusForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_campus'  => new sfWidgetFormInputHidden(),
      'descricao'  => new sfWidgetFormInputText(),
      'id_cidade'  => new sfWidgetFormPropelChoice(array('model' => 'Tbcidade', 'add_empty' => true)),
      'created_at' => new sfWidgetFormDate(),
      'updated_at' => new sfWidgetFormDate(),
      'created_by' => new sfWidgetFormInputText(),
      'updated_by' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_campus'  => new sfValidatorPropelChoice(array('model' => 'Tbcampus', 'column' => 'id_campus', 'required' => false)),
      'descricao'  => new sfValidatorString(array('max_length' => 25, 'required' => false)),
      'id_cidade'  => new sfValidatorPropelChoice(array('model' => 'Tbcidade', 'column' => 'id_cidade', 'required' => false)),
      'created_at' => new sfValidatorDate(array('required' => false)),
      'updated_at' => new sfValidatorDate(array('required' => false)),
      'created_by' => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'updated_by' => new sfValidatorString(array('max_length' => 20, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tbcampus[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tbcampus';
  }


}
