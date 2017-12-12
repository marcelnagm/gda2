<?php

/**
 * TbturmaSumula form base class.
 *
 * @method TbturmaSumula getObject() Returns the current form's model object
 *
 * @package    derca
 * @subpackage form
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbturmaSumulaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_sumula'      => new sfWidgetFormInputHidden(),
      'id_turma'       => new sfWidgetFormPropelChoice(array('model' => 'Tbturma', 'add_empty' => false)),
      'data'           => new sfWidgetFormDate(),
      'descricao'      => new sfWidgetFormTextarea(),
      'matricula_prof' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_sumula'      => new sfValidatorPropelChoice(array('model' => 'TbturmaSumula', 'column' => 'id_sumula', 'required' => false)),
      'id_turma'       => new sfValidatorPropelChoice(array('model' => 'Tbturma', 'column' => 'id_turma')),
      'data'           => new sfValidatorDate(),
      'descricao'      => new sfValidatorString(),
      'matricula_prof' => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
    ));

    $this->widgetSchema->setNameFormat('tbturma_sumula[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TbturmaSumula';
  }


}
