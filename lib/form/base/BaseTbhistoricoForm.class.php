<?php

/**
 * Tbhistorico form base class.
 *
 * @method Tbhistorico getObject() Returns the current form's model object
 *
 * @package    derca
 * @subpackage form
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbhistoricoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_historico'   => new sfWidgetFormInputHidden(),
      'id_periodo'     => new sfWidgetFormPropelChoice(array('model' => 'Tbperiodo', 'add_empty' => false)),
      'matricula'      => new sfWidgetFormPropelChoice(array('model' => 'Tbaluno', 'add_empty' => false)),
      'cod_disciplina' => new sfWidgetFormPropelChoice(array('model' => 'Tbdisciplina', 'add_empty' => false)),
      'media'          => new sfWidgetFormInputText(),
      'faltas'         => new sfWidgetFormInputText(),
      'id_conceito'    => new sfWidgetFormPropelChoice(array('model' => 'Tbconceito', 'add_empty' => false)),
      'duplicado'      => new sfWidgetFormInputCheckbox(),
      'created_at'     => new sfWidgetFormDate(),
      'updated_at'     => new sfWidgetFormDate(),
      'created_by'     => new sfWidgetFormInputText(),
      'updated_by'     => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_historico'   => new sfValidatorPropelChoice(array('model' => 'Tbhistorico', 'column' => 'id_historico', 'required' => false)),
      'id_periodo'     => new sfValidatorPropelChoice(array('model' => 'Tbperiodo', 'column' => 'id_periodo')),
      'matricula'      => new sfValidatorPropelChoice(array('model' => 'Tbaluno', 'column' => 'matricula')),
      'cod_disciplina' => new sfValidatorPropelChoice(array('model' => 'Tbdisciplina', 'column' => 'cod_disciplina')),
      'media'          => new sfValidatorNumber(),
      'faltas'         => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'id_conceito'    => new sfValidatorPropelChoice(array('model' => 'Tbconceito', 'column' => 'id_conceito')),
      'duplicado'      => new sfValidatorBoolean(array('required' => false)),
      'created_at'     => new sfValidatorDate(array('required' => false)),
      'updated_at'     => new sfValidatorDate(array('required' => false)),
      'created_by'     => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'updated_by'     => new sfValidatorString(array('max_length' => 20, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'Tbhistorico', 'column' => array('id_periodo', 'matricula', 'cod_disciplina')))
    );

    $this->widgetSchema->setNameFormat('tbhistorico[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tbhistorico';
  }


}
