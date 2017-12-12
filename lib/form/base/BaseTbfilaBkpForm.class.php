<?php

/**
 * TbfilaBkp form base class.
 *
 * @method TbfilaBkp getObject() Returns the current form's model object
 *
 * @package    derca
 * @subpackage form
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbfilaBkpForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_fila'     => new sfWidgetFormInputText(),
      'matricula'   => new sfWidgetFormInputText(),
      'id_oferta'   => new sfWidgetFormInputText(),
      'hora_insert' => new sfWidgetFormDateTime(),
      'hora_delete' => new sfWidgetFormDateTime(),
      'id_situacao' => new sfWidgetFormInputText(),
      'id'          => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'id_fila'     => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'matricula'   => new sfValidatorInteger(array('min' => -9.2233720368548E+18, 'max' => 9.2233720368548E+18)),
      'id_oferta'   => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'hora_insert' => new sfValidatorDateTime(array('required' => false)),
      'hora_delete' => new sfValidatorDateTime(array('required' => false)),
      'id_situacao' => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'id'          => new sfValidatorPropelChoice(array('model' => 'TbfilaBkp', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tbfila_bkp[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TbfilaBkp';
  }


}
