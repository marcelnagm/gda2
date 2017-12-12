<?php

/**
 * Tbloadfile form base class.
 *
 * @method Tbloadfile getObject() Returns the current form's model object
 *
 * @package    derca
 * @subpackage form
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbloadfileForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'file'        => new sfWidgetFormInputText(),
      'description' => new sfWidgetFormInputText(),
      'id'          => new sfWidgetFormInputHidden(),
      'created_at'  => new sfWidgetFormDate(),
      'updated_at'  => new sfWidgetFormDate(),
      'created_by'  => new sfWidgetFormInputText(),
      'updated_by'  => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'file'        => new sfValidatorString(array('max_length' => 255)),
      'description' => new sfValidatorString(array('max_length' => 255)),
      'id'          => new sfValidatorPropelChoice(array('model' => 'Tbloadfile', 'column' => 'id', 'required' => false)),
      'created_at'  => new sfValidatorDate(array('required' => false)),
      'updated_at'  => new sfValidatorDate(array('required' => false)),
      'created_by'  => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'updated_by'  => new sfValidatorString(array('max_length' => 20, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tbloadfile[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tbloadfile';
  }


}
