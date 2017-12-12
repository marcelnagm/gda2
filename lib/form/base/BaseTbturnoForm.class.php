<?php

/**
 * Tbturno form base class.
 *
 * @method Tbturno getObject() Returns the current form's model object
 *
 * @package    derca
 * @subpackage form
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbturnoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_turno'     => new sfWidgetFormInputHidden(),
      'descricao'    => new sfWidgetFormInputText(),
      'hora_inicial' => new sfWidgetFormTime(),
      'hora_final'   => new sfWidgetFormTime(),
      'created_at'   => new sfWidgetFormDate(),
      'updated_at'   => new sfWidgetFormDate(),
      'created_by'   => new sfWidgetFormInputText(),
      'updated_by'   => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_turno'     => new sfValidatorPropelChoice(array('model' => 'Tbturno', 'column' => 'id_turno', 'required' => false)),
      'descricao'    => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'hora_inicial' => new sfValidatorTime(array('required' => false)),
      'hora_final'   => new sfValidatorTime(array('required' => false)),
      'created_at'   => new sfValidatorDate(array('required' => false)),
      'updated_at'   => new sfValidatorDate(array('required' => false)),
      'created_by'   => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'updated_by'   => new sfValidatorString(array('max_length' => 20, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tbturno[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tbturno';
  }


}
