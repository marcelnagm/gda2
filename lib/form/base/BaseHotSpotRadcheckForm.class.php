<?php

/**
 * HotSpotRadcheck form base class.
 *
 * @method HotSpotRadcheck getObject() Returns the current form's model object
 *
 * @package    derca
 * @subpackage form
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseHotSpotRadcheckForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'        => new sfWidgetFormInputHidden(),
      'username'  => new sfWidgetFormInputText(),
      'attribute' => new sfWidgetFormInputText(),
      'op'        => new sfWidgetFormInputText(),
      'value'     => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'        => new sfValidatorPropelChoice(array('model' => 'HotSpotRadcheck', 'column' => 'id', 'required' => false)),
      'username'  => new sfValidatorString(array('max_length' => 64)),
      'attribute' => new sfValidatorString(array('max_length' => 64)),
      'op'        => new sfValidatorString(array('max_length' => 2)),
      'value'     => new sfValidatorString(array('max_length' => 253)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'HotSpotRadcheck', 'column' => array('username')))
    );

    $this->widgetSchema->setNameFormat('hot_spot_radcheck[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'HotSpotRadcheck';
  }


}
