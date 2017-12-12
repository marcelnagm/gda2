<?php

/**
 * Tbreligiao form base class.
 *
 * @method Tbreligiao getObject() Returns the current form's model object
 *
 * @package    derca
 * @subpackage form
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbreligiaoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_religiao' => new sfWidgetFormInputHidden(),
      'descricao'   => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_religiao' => new sfValidatorPropelChoice(array('model' => 'Tbreligiao', 'column' => 'id_religiao', 'required' => false)),
      'descricao'   => new sfValidatorString(array('max_length' => 255)),
    ));

    $this->widgetSchema->setNameFormat('tbreligiao[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tbreligiao';
  }


}
