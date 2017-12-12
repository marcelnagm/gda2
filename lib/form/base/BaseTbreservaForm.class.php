<?php

/**
 * Tbreserva form base class.
 *
 * @method Tbreserva getObject() Returns the current form's model object
 *
 * @package    derca
 * @subpackage form
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbreservaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'idreserva'      => new sfWidgetFormInputHidden(),
      'cod_disciplina' => new sfWidgetFormPropelChoice(array('model' => 'Tbdisciplina', 'add_empty' => false)),
      'id_sala'        => new sfWidgetFormPropelChoice(array('model' => 'Tbsala', 'add_empty' => false)),
      'turma'          => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'idreserva'      => new sfValidatorPropelChoice(array('model' => 'Tbreserva', 'column' => 'idreserva', 'required' => false)),
      'cod_disciplina' => new sfValidatorPropelChoice(array('model' => 'Tbdisciplina', 'column' => 'cod_disciplina')),
      'id_sala'        => new sfValidatorPropelChoice(array('model' => 'Tbsala', 'column' => 'id_sala')),
      'turma'          => new sfValidatorString(array('max_length' => 15)),
    ));

    $this->widgetSchema->setNameFormat('tbreserva[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tbreserva';
  }


}
