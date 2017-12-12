<?php

/**
 * Tbnivelinstrucao form base class.
 *
 * @method Tbnivelinstrucao getObject() Returns the current form's model object
 *
 * @package    derca
 * @subpackage form
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbnivelinstrucaoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_nivel_instrucao' => new sfWidgetFormInputHidden(),
      'descricao'          => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_nivel_instrucao' => new sfValidatorPropelChoice(array('model' => 'Tbnivelinstrucao', 'column' => 'id_nivel_instrucao', 'required' => false)),
      'descricao'          => new sfValidatorString(array('max_length' => 255)),
    ));

    $this->widgetSchema->setNameFormat('tbnivelinstrucao[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tbnivelinstrucao';
  }


}
