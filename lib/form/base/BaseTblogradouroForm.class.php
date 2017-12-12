<?php

/**
 * Tblogradouro form base class.
 *
 * @method Tblogradouro getObject() Returns the current form's model object
 *
 * @package    derca
 * @subpackage form
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTblogradouroForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_logradouro' => new sfWidgetFormInputHidden(),
      'descricao'     => new sfWidgetFormInputText(),
      'cep'           => new sfWidgetFormInputText(),
      'id_bairro'     => new sfWidgetFormPropelChoice(array('model' => 'Tbbairro', 'add_empty' => false)),
      'id_cidade'     => new sfWidgetFormPropelChoice(array('model' => 'Tbcidade', 'add_empty' => false)),
      'created_at'    => new sfWidgetFormDate(),
      'updated_at'    => new sfWidgetFormDate(),
      'created_by'    => new sfWidgetFormInputText(),
      'updated_by'    => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_logradouro' => new sfValidatorPropelChoice(array('model' => 'Tblogradouro', 'column' => 'id_logradouro', 'required' => false)),
      'descricao'     => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'cep'           => new sfValidatorString(array('max_length' => 8)),
      'id_bairro'     => new sfValidatorPropelChoice(array('model' => 'Tbbairro', 'column' => 'id_bairro')),
      'id_cidade'     => new sfValidatorPropelChoice(array('model' => 'Tbcidade', 'column' => 'id_cidade')),
      'created_at'    => new sfValidatorDate(array('required' => false)),
      'updated_at'    => new sfValidatorDate(array('required' => false)),
      'created_by'    => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'updated_by'    => new sfValidatorString(array('max_length' => 20, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'Tblogradouro', 'column' => array('cep')))
    );

    $this->widgetSchema->setNameFormat('tblogradouro[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tblogradouro';
  }


}
