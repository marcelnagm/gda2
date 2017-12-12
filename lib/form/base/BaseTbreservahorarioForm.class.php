<?php

/**
 * Tbreservahorario form base class.
 *
 * @method Tbreservahorario getObject() Returns the current form's model object
 *
 * @package    derca
 * @subpackage form
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbreservahorarioForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'idhorario'   => new sfWidgetFormInputHidden(),
      'hora_inicio' => new sfWidgetFormTime(),
      'hora_fim'    => new sfWidgetFormTime(),
      'dia'         => new sfWidgetFormInputText(),
      'idreserva'   => new sfWidgetFormPropelChoice(array('model' => 'Tbreserva', 'add_empty' => false)),
      'created_at'  => new sfWidgetFormDate(),
      'updated_at'  => new sfWidgetFormDate(),
      'created_by'  => new sfWidgetFormInputText(),
      'updated_by'  => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'idhorario'   => new sfValidatorPropelChoice(array('model' => 'Tbreservahorario', 'column' => 'idhorario', 'required' => false)),
      'hora_inicio' => new sfValidatorTime(),
      'hora_fim'    => new sfValidatorTime(),
      'dia'         => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'idreserva'   => new sfValidatorPropelChoice(array('model' => 'Tbreserva', 'column' => 'idreserva')),
      'created_at'  => new sfValidatorDate(array('required' => false)),
      'updated_at'  => new sfValidatorDate(array('required' => false)),
      'created_by'  => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'updated_by'  => new sfValidatorString(array('max_length' => 20, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'Tbreservahorario', 'column' => array('idreserva', 'dia', 'hora_inicio')))
    );

    $this->widgetSchema->setNameFormat('tbreservahorario[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tbreservahorario';
  }


}
