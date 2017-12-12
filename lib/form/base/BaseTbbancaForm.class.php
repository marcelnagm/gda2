<?php

/**
 * Tbbanca form base class.
 *
 * @method Tbbanca getObject() Returns the current form's model object
 *
 * @package    derca
 * @subpackage form
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbbancaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'banca_id'         => new sfWidgetFormInputHidden(),
      'matricula'        => new sfWidgetFormPropelChoice(array('model' => 'Tbaluno', 'add_empty' => false)),
      'nomeorientador'   => new sfWidgetFormInputText(),
      'primeiromembro'   => new sfWidgetFormInputText(),
      'segundomembro'    => new sfWidgetFormInputText(),
      'terceiromembro'   => new sfWidgetFormInputText(),
      'quartomembro'     => new sfWidgetFormInputText(),
      'datadefesa'       => new sfWidgetFormDate(),
      'resultado'        => new sfWidgetFormInputText(),
      'mediabanca'       => new sfWidgetFormInputText(),
      'titulomonografia' => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'banca_id'         => new sfValidatorPropelChoice(array('model' => 'Tbbanca', 'column' => 'banca_id', 'required' => false)),
      'matricula'        => new sfValidatorPropelChoice(array('model' => 'Tbaluno', 'column' => 'matricula')),
      'nomeorientador'   => new sfValidatorString(array('max_length' => 100)),
      'primeiromembro'   => new sfValidatorString(array('max_length' => 100)),
      'segundomembro'    => new sfValidatorString(array('max_length' => 100)),
      'terceiromembro'   => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'quartomembro'     => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'datadefesa'       => new sfValidatorDate(),
      'resultado'        => new sfValidatorString(array('max_length' => 20)),
      'mediabanca'       => new sfValidatorNumber(array('required' => false)),
      'titulomonografia' => new sfValidatorString(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'Tbbanca', 'column' => array('matricula')))
    );

    $this->widgetSchema->setNameFormat('tbbanca[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tbbanca';
  }


}
