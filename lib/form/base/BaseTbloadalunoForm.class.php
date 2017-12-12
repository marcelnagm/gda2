<?php

/**
 * Tbloadaluno form base class.
 *
 * @method Tbloadaluno getObject() Returns the current form's model object
 *
 * @package    derca
 * @subpackage form
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbloadalunoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'matricula'        => new sfWidgetFormInputHidden(),
      'nome'             => new sfWidgetFormInputText(),
      'sexo'             => new sfWidgetFormInputText(),
      'rg'               => new sfWidgetFormInputText(),
      'rg_org_exped'     => new sfWidgetFormInputText(),
      'cpf'              => new sfWidgetFormInputText(),
      'id_versao_curso'  => new sfWidgetFormPropelChoice(array('model' => 'Tbcursoversao', 'add_empty' => false)),
      'id_tipo_ingresso' => new sfWidgetFormPropelChoice(array('model' => 'Tbtipoingresso', 'add_empty' => false)),
      'id_situacao'      => new sfWidgetFormPropelChoice(array('model' => 'Tbalunosituacao', 'add_empty' => false)),
      'classificacao'    => new sfWidgetFormInputText(),
      'opcao'            => new sfWidgetFormInputText(),
      'processo'         => new sfWidgetFormInputText(),
      'op_ingresso'      => new sfWidgetFormInputText(),
      'created_at'       => new sfWidgetFormDate(),
      'updated_at'       => new sfWidgetFormDate(),
      'created_by'       => new sfWidgetFormInputText(),
      'updated_by'       => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'matricula'        => new sfValidatorPropelChoice(array('model' => 'Tbloadaluno', 'column' => 'matricula', 'required' => false)),
      'nome'             => new sfValidatorString(array('max_length' => 100)),
      'sexo'             => new sfValidatorString(array('max_length' => 1)),
      'rg'               => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'rg_org_exped'     => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'cpf'              => new sfValidatorString(array('max_length' => 11, 'required' => false)),
      'id_versao_curso'  => new sfValidatorPropelChoice(array('model' => 'Tbcursoversao', 'column' => 'id_versao_curso')),
      'id_tipo_ingresso' => new sfValidatorPropelChoice(array('model' => 'Tbtipoingresso', 'column' => 'id_tipo_ingresso')),
      'id_situacao'      => new sfValidatorPropelChoice(array('model' => 'Tbalunosituacao', 'column' => 'id_situacao')),
      'classificacao'    => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'opcao'            => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'processo'         => new sfValidatorString(array('max_length' => 20)),
      'op_ingresso'      => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'created_at'       => new sfValidatorDate(array('required' => false)),
      'updated_at'       => new sfValidatorDate(array('required' => false)),
      'created_by'       => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'updated_by'       => new sfValidatorString(array('max_length' => 20, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tbloadaluno[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tbloadaluno';
  }


}
