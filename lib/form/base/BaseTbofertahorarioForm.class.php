<?php

/**
 * Tbofertahorario form base class.
 *
 * @method Tbofertahorario getObject() Returns the current form's model object
 *
 * @package    derca
 * @subpackage form
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbofertahorarioForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'dia'         => new sfWidgetFormInputText(),
      'hora_inicio' => new sfWidgetFormTime(),
      'hora_fim'    => new sfWidgetFormTime(),
      'id_oferta'   => new sfWidgetFormPropelChoice(array('model' => 'Tboferta', 'add_empty' => false)),
      'id_horario'  => new sfWidgetFormInputHidden(),
      'created_at'  => new sfWidgetFormDate(),
      'updated_at'  => new sfWidgetFormDate(),
      'created_by'  => new sfWidgetFormInputText(),
      'updated_by'  => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'dia'         => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'hora_inicio' => new sfValidatorTime(),
      'hora_fim'    => new sfValidatorTime(),
      'id_oferta'   => new sfValidatorPropelChoice(array('model' => 'Tboferta', 'column' => 'id_oferta')),
      'id_horario'  => new sfValidatorPropelChoice(array('model' => 'Tbofertahorario', 'column' => 'id_horario', 'required' => false)),
      'created_at'  => new sfValidatorDate(array('required' => false)),
      'updated_at'  => new sfValidatorDate(array('required' => false)),
      'created_by'  => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'updated_by'  => new sfValidatorString(array('max_length' => 20, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'Tbofertahorario', 'column' => array('id_oferta', 'dia', 'hora_inicio')))
    );

    $this->widgetSchema->setNameFormat('tbofertahorario[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tbofertahorario';
  }


}
