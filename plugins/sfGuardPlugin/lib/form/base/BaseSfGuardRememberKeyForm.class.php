<?php

/**
 * SfGuardRememberKey form base class.
 *
 * @method SfGuardRememberKey getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseSfGuardRememberKeyForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'user_id'      => new sfWidgetFormInputHidden(),
      'remember_key' => new sfWidgetFormInputText(),
      'ip_address'   => new sfWidgetFormInputHidden(),
      'created_at'   => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'user_id'      => new sfValidatorPropelChoice(array('model' => 'SfGuardUser', 'column' => 'id', 'required' => false)),
      'remember_key' => new sfValidatorString(array('max_length' => 32, 'required' => false)),
      'ip_address'   => new sfValidatorPropelChoice(array('model' => 'SfGuardRememberKey', 'column' => 'ip_address', 'required' => false)),
      'created_at'   => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sf_guard_remember_key[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SfGuardRememberKey';
  }


}
