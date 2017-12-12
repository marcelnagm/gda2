<?php

/**
 * Tbinstexterna form base class.
 *
 * @method Tbinstexterna getObject() Returns the current form's model object
 *
 * @package    derca
 * @subpackage form
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbinstexternaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_inst_externa' => new sfWidgetFormInputHidden(),
      'descricao'       => new sfWidgetFormInputText(),
      'sucinto'         => new sfWidgetFormInputText(),
      'uf'              => new sfWidgetFormInputText(),
      'created_at'      => new sfWidgetFormDate(),
      'updated_at'      => new sfWidgetFormDate(),
      'created_by'      => new sfWidgetFormInputText(),
      'updated_by'      => new sfWidgetFormInputText(),
      'id_tipo'         => new sfWidgetFormPropelChoice(array('model' => 'Tbinstexternatipo', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id_inst_externa' => new sfValidatorPropelChoice(array('model' => 'Tbinstexterna', 'column' => 'id_inst_externa', 'required' => false)),
      'descricao'       => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'sucinto'         => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'uf'              => new sfValidatorString(array('max_length' => 2, 'required' => false)),
      'created_at'      => new sfValidatorDate(array('required' => false)),
      'updated_at'      => new sfValidatorDate(array('required' => false)),
      'created_by'      => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'updated_by'      => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'id_tipo'         => new sfValidatorPropelChoice(array('model' => 'Tbinstexternatipo', 'column' => 'id_tipo')),
    ));

    $this->widgetSchema->setNameFormat('tbinstexterna[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tbinstexterna';
  }


}
