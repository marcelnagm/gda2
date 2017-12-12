<?php

/**
 * Tbalunomatricula form base class.
 *
 * @method Tbalunomatricula getObject() Returns the current form's model object
 *
 * @package    derca
 * @subpackage form
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbalunomatriculaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_pessoa'         => new sfWidgetFormInputText(),
      'matricula'         => new sfWidgetFormInputHidden(),
      'nome'              => new sfWidgetFormInputText(),
      'celular'           => new sfWidgetFormInputText(),
      'email'             => new sfWidgetFormInputText(),
      'fone_residencial'  => new sfWidgetFormInputText(),
      'id_neces_especial' => new sfWidgetFormPropelChoice(array('model' => 'Tbnecesespecial', 'add_empty' => false)),
      'dt_nascimento'     => new sfWidgetFormDate(),
      'naturalidade'      => new sfWidgetFormPropelChoice(array('model' => 'Tbcidade', 'add_empty' => false)),
      'uf_nascimento'     => new sfWidgetFormInputText(),
      'nacionalidade'     => new sfWidgetFormPropelChoice(array('model' => 'Tbpais', 'add_empty' => false)),
      'sexo'              => new sfWidgetFormInputText(),
      'estado_civil'      => new sfWidgetFormInputText(),
      'titulo'            => new sfWidgetFormInputText(),
      'titulo_zona'       => new sfWidgetFormInputText(),
      'titulo_secao'      => new sfWidgetFormInputText(),
      'rg'                => new sfWidgetFormInputText(),
      'rg_dt_exped'       => new sfWidgetFormDate(),
      'rg_org_exped'      => new sfWidgetFormInputText(),
      'cpf'               => new sfWidgetFormInputText(),
      'reservista'        => new sfWidgetFormInputText(),
      'pai'               => new sfWidgetFormInputText(),
      'mae'               => new sfWidgetFormInputText(),
      'cep'               => new sfWidgetFormPropelChoice(array('model' => 'Tblogradouro', 'add_empty' => false, 'key_method' => 'getCep')),
      'numero'            => new sfWidgetFormInputText(),
      'complemento'       => new sfWidgetFormInputText(),
      'id_versao_curso'   => new sfWidgetFormPropelChoice(array('model' => 'Tbcursoversao', 'add_empty' => false)),
      'id_tipo_ingresso'  => new sfWidgetFormPropelChoice(array('model' => 'Tbtipoingresso', 'add_empty' => false)),
      'dt_ingresso'       => new sfWidgetFormDate(),
      'id_situacao'       => new sfWidgetFormPropelChoice(array('model' => 'Tbalunosituacao', 'add_empty' => false)),
      'dt_situacao'       => new sfWidgetFormDate(),
      'id_2grau'          => new sfWidgetFormPropelChoice(array('model' => 'Tbinstexterna', 'add_empty' => true)),
      'ano_concl_2grau'   => new sfWidgetFormInputText(),
      'op_ingresso'       => new sfWidgetFormInputText(),
      'id_polo'           => new sfWidgetFormPropelChoice(array('model' => 'Tbpolos', 'add_empty' => false)),
      'created_at'        => new sfWidgetFormDate(),
      'updated_at'        => new sfWidgetFormDate(),
      'created_by'        => new sfWidgetFormInputText(),
      'updated_by'        => new sfWidgetFormInputText(),
      'id_raca'           => new sfWidgetFormPropelChoice(array('model' => 'Tbalunoracacor', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id_pessoa'         => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'matricula'         => new sfValidatorPropelChoice(array('model' => 'Tbalunomatricula', 'column' => 'matricula', 'required' => false)),
      'nome'              => new sfValidatorString(array('max_length' => 100)),
      'celular'           => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'email'             => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'fone_residencial'  => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'id_neces_especial' => new sfValidatorPropelChoice(array('model' => 'Tbnecesespecial', 'column' => 'id_neces_especial')),
      'dt_nascimento'     => new sfValidatorDate(),
      'naturalidade'      => new sfValidatorPropelChoice(array('model' => 'Tbcidade', 'column' => 'id_cidade')),
      'uf_nascimento'     => new sfValidatorString(array('max_length' => 2, 'required' => false)),
      'nacionalidade'     => new sfValidatorPropelChoice(array('model' => 'Tbpais', 'column' => 'id_pais')),
      'sexo'              => new sfValidatorString(array('max_length' => 1)),
      'estado_civil'      => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'titulo'            => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'titulo_zona'       => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'titulo_secao'      => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'rg'                => new sfValidatorString(array('max_length' => 20)),
      'rg_dt_exped'       => new sfValidatorDate(array('required' => false)),
      'rg_org_exped'      => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'cpf'               => new sfValidatorString(array('max_length' => 11)),
      'reservista'        => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'pai'               => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'mae'               => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'cep'               => new sfValidatorPropelChoice(array('model' => 'Tblogradouro', 'column' => 'cep')),
      'numero'            => new sfValidatorString(array('max_length' => 8)),
      'complemento'       => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'id_versao_curso'   => new sfValidatorPropelChoice(array('model' => 'Tbcursoversao', 'column' => 'id_versao_curso')),
      'id_tipo_ingresso'  => new sfValidatorPropelChoice(array('model' => 'Tbtipoingresso', 'column' => 'id_tipo_ingresso')),
      'dt_ingresso'       => new sfValidatorDate(),
      'id_situacao'       => new sfValidatorPropelChoice(array('model' => 'Tbalunosituacao', 'column' => 'id_situacao')),
      'dt_situacao'       => new sfValidatorDate(array('required' => false)),
      'id_2grau'          => new sfValidatorPropelChoice(array('model' => 'Tbinstexterna', 'column' => 'id_inst_externa', 'required' => false)),
      'ano_concl_2grau'   => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'op_ingresso'       => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'id_polo'           => new sfValidatorPropelChoice(array('model' => 'Tbpolos', 'column' => 'id_polo')),
      'created_at'        => new sfValidatorDate(array('required' => false)),
      'updated_at'        => new sfValidatorDate(array('required' => false)),
      'created_by'        => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'updated_by'        => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'id_raca'           => new sfValidatorPropelChoice(array('model' => 'Tbalunoracacor', 'column' => 'id_raca')),
    ));

    $this->widgetSchema->setNameFormat('tbalunomatricula[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tbalunomatricula';
  }


}
