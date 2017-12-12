<?php

/**
 * Tbpendencia form base class.
 *
 * @method Tbpendencia getObject() Returns the current form's model object
 *
 * @package    derca
 * @subpackage form
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbpendenciaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'matricula'  => new sfWidgetFormPropelChoice(array('model' => 'Tbaluno', 'add_empty' => false)),
      'id_tipo'    => new sfWidgetFormPropelChoice(array('model' => 'Tbpendenciatipo', 'add_empty' => false)),
      'resolvido'  => new sfWidgetFormInputCheckbox(),
      'created_at' => new sfWidgetFormDate(),
      'updated_at' => new sfWidgetFormDate(),
      'created_by' => new sfWidgetFormInputText(),
      'updated_by' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorPropelChoice(array('model' => 'Tbpendencia', 'column' => 'id', 'required' => false)),
      'matricula'  => new sfValidatorPropelChoice(array('model' => 'Tbaluno', 'column' => 'matricula')),
      'id_tipo'    => new sfValidatorPropelChoice(array('model' => 'Tbpendenciatipo', 'column' => 'id')),
      'resolvido'  => new sfValidatorBoolean(),
      'created_at' => new sfValidatorDate(array('required' => false)),
      'updated_at' => new sfValidatorDate(array('required' => false)),
      'created_by' => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'updated_by' => new sfValidatorString(array('max_length' => 20, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tbpendencia[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tbpendencia';
  }


}
