<?php

/**
 * Tbvagas form base class.
 *
 * @method Tbvagas getObject() Returns the current form's model object
 *
 * @package    derca
 * @subpackage form
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbvagasForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_vagas'            => new sfWidgetFormInputHidden(),
      'id_versao_curso'     => new sfWidgetFormPropelChoice(array('model' => 'Tbcursoversao', 'add_empty' => false)),
      'vagas'               => new sfWidgetFormInputText(),
      'vagas_segunda_opcao' => new sfWidgetFormInputText(),
      'processo'            => new sfWidgetFormInputText(),
      'created_at'          => new sfWidgetFormDate(),
      'updated_at'          => new sfWidgetFormDate(),
      'created_by'          => new sfWidgetFormInputText(),
      'updated_by'          => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_vagas'            => new sfValidatorPropelChoice(array('model' => 'Tbvagas', 'column' => 'id_vagas', 'required' => false)),
      'id_versao_curso'     => new sfValidatorPropelChoice(array('model' => 'Tbcursoversao', 'column' => 'id_versao_curso')),
      'vagas'               => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'vagas_segunda_opcao' => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'processo'            => new sfValidatorString(array('max_length' => 20)),
      'created_at'          => new sfValidatorDate(array('required' => false)),
      'updated_at'          => new sfValidatorDate(array('required' => false)),
      'created_by'          => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'updated_by'          => new sfValidatorString(array('max_length' => 20, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tbvagas[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tbvagas';
  }


}
