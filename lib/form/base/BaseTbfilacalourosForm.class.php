<?php

/**
 * Tbfilacalouros form base class.
 *
 * @method Tbfilacalouros getObject() Returns the current form's model object
 *
 * @package    derca
 * @subpackage form
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbfilacalourosForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_fila_calouros' => new sfWidgetFormInputHidden(),
      'id_oferta'        => new sfWidgetFormPropelChoice(array('model' => 'Tboferta', 'add_empty' => false)),
      'id_versao_curso'  => new sfWidgetFormPropelChoice(array('model' => 'Tbcursoversao', 'add_empty' => false)),
      'id_periodo'       => new sfWidgetFormPropelChoice(array('model' => 'Tbperiodo', 'add_empty' => false)),
      'created_at'       => new sfWidgetFormDate(),
      'updated_at'       => new sfWidgetFormDate(),
      'created_by'       => new sfWidgetFormInputText(),
      'updated_by'       => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_fila_calouros' => new sfValidatorPropelChoice(array('model' => 'Tbfilacalouros', 'column' => 'id_fila_calouros', 'required' => false)),
      'id_oferta'        => new sfValidatorPropelChoice(array('model' => 'Tboferta', 'column' => 'id_oferta')),
      'id_versao_curso'  => new sfValidatorPropelChoice(array('model' => 'Tbcursoversao', 'column' => 'id_versao_curso')),
      'id_periodo'       => new sfValidatorPropelChoice(array('model' => 'Tbperiodo', 'column' => 'id_periodo')),
      'created_at'       => new sfValidatorDate(array('required' => false)),
      'updated_at'       => new sfValidatorDate(array('required' => false)),
      'created_by'       => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'updated_by'       => new sfValidatorString(array('max_length' => 20, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tbfilacalouros[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tbfilacalouros';
  }


}
