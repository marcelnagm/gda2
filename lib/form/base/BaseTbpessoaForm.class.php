<?php

/**
 * Tbpessoa form base class.
 *
 * @method Tbpessoa getObject() Returns the current form's model object
 *
 * @package    derca
 * @subpackage form
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbpessoaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_pessoa'         => new sfWidgetFormInputHidden(),
      'nome'              => new sfWidgetFormInputText(),
      'celular'           => new sfWidgetFormInputText(),
      'email'             => new sfWidgetFormInputText(),
      'fone_residencial'  => new sfWidgetFormInputText(),
      'foto'              => new sfWidgetFormInputText(),
      'id_neces_especial' => new sfWidgetFormPropelChoice(array('model' => 'Tbnecesespecial', 'add_empty' => true)),
      'created_at'        => new sfWidgetFormDate(),
      'updated_at'        => new sfWidgetFormDate(),
      'created_by'        => new sfWidgetFormInputText(),
      'updated_by'        => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_pessoa'         => new sfValidatorPropelChoice(array('model' => 'Tbpessoa', 'column' => 'id_pessoa', 'required' => false)),
      'nome'              => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'celular'           => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'email'             => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'fone_residencial'  => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'foto'              => new sfValidatorPass(array('required' => false)),
      'id_neces_especial' => new sfValidatorPropelChoice(array('model' => 'Tbnecesespecial', 'column' => 'id_neces_especial', 'required' => false)),
      'created_at'        => new sfValidatorDate(array('required' => false)),
      'updated_at'        => new sfValidatorDate(array('required' => false)),
      'created_by'        => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'updated_by'        => new sfValidatorString(array('max_length' => 20, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tbpessoa[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tbpessoa';
  }


}
