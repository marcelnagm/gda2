<?php

/**
 * Tbvalidacao form base class.
 *
 * @method Tbvalidacao getObject() Returns the current form's model object
 *
 * @package    derca
 * @subpackage form
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbvalidacaoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'matricula'  => new sfWidgetFormInputText(),
      'num_auth'   => new sfWidgetFormInputText(),
      'data'       => new sfWidgetFormDate(),
      'hora'       => new sfWidgetFormTime(),
      'id_tipo'    => new sfWidgetFormPropelChoice(array('model' => 'Tbvalidacaotipo', 'add_empty' => false)),
      'ativo'      => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormDate(),
      'updated_at' => new sfWidgetFormDate(),
      'created_by' => new sfWidgetFormInputText(),
      'updated_by' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorPropelChoice(array('model' => 'Tbvalidacao', 'column' => 'id', 'required' => false)),
      'matricula'  => new sfValidatorString(array('max_length' => 25)),
      'num_auth'   => new sfValidatorString(array('max_length' => 255)),
      'data'       => new sfValidatorDate(),
      'hora'       => new sfValidatorTime(),
      'id_tipo'    => new sfValidatorPropelChoice(array('model' => 'Tbvalidacaotipo', 'column' => 'id')),
      'ativo'      => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'created_at' => new sfValidatorDate(array('required' => false)),
      'updated_at' => new sfValidatorDate(array('required' => false)),
      'created_by' => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'updated_by' => new sfValidatorString(array('max_length' => 20, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tbvalidacao[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tbvalidacao';
  }


}
