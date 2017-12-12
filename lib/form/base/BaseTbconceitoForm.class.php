<?php

/**
 * Tbconceito form base class.
 *
 * @method Tbconceito getObject() Returns the current form's model object
 *
 * @package    derca
 * @subpackage form
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbconceitoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_conceito'    => new sfWidgetFormInputHidden(),
      'descricao'      => new sfWidgetFormInputText(),
      'sucinto'        => new sfWidgetFormInputText(),
      'sigla_pingifes' => new sfWidgetFormInputText(),
      'created_at'     => new sfWidgetFormDate(),
      'updated_at'     => new sfWidgetFormDate(),
      'created_by'     => new sfWidgetFormInputText(),
      'updated_by'     => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_conceito'    => new sfValidatorPropelChoice(array('model' => 'Tbconceito', 'column' => 'id_conceito', 'required' => false)),
      'descricao'      => new sfValidatorString(array('max_length' => 25, 'required' => false)),
      'sucinto'        => new sfValidatorString(array('max_length' => 3, 'required' => false)),
      'sigla_pingifes' => new sfValidatorString(array('max_length' => 4, 'required' => false)),
      'created_at'     => new sfValidatorDate(array('required' => false)),
      'updated_at'     => new sfValidatorDate(array('required' => false)),
      'created_by'     => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'updated_by'     => new sfValidatorString(array('max_length' => 20, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tbconceito[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tbconceito';
  }


}
