<?php

/**
 * Tbcidade form base class.
 *
 * @method Tbcidade getObject() Returns the current form's model object
 *
 * @package    derca
 * @subpackage form
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbcidadeForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_cidade'  => new sfWidgetFormInputHidden(),
      'descricao'  => new sfWidgetFormInputText(),
      'id_estado'  => new sfWidgetFormPropelChoice(array('model' => 'Tbestado', 'add_empty' => false)),
      'id_pais'    => new sfWidgetFormPropelChoice(array('model' => 'Tbpais', 'add_empty' => false)),
      'created_at' => new sfWidgetFormDate(),
      'updated_at' => new sfWidgetFormDate(),
      'created_by' => new sfWidgetFormInputText(),
      'updated_by' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_cidade'  => new sfValidatorPropelChoice(array('model' => 'Tbcidade', 'column' => 'id_cidade', 'required' => false)),
      'descricao'  => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'id_estado'  => new sfValidatorPropelChoice(array('model' => 'Tbestado', 'column' => 'id_estado')),
      'id_pais'    => new sfValidatorPropelChoice(array('model' => 'Tbpais', 'column' => 'id_pais')),
      'created_at' => new sfValidatorDate(array('required' => false)),
      'updated_at' => new sfValidatorDate(array('required' => false)),
      'created_by' => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'updated_by' => new sfValidatorString(array('max_length' => 20, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tbcidade[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tbcidade';
  }


}
