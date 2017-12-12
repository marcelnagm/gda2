<?php

/**
 * TbalunoImport form base class.
 *
 * @method TbalunoImport getObject() Returns the current form's model object
 *
 * @package    derca
 * @subpackage form
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbalunoImportForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_pessoa'             => new sfWidgetFormInputText(),
      'nome'                  => new sfWidgetFormInputText(),
      'celular'               => new sfWidgetFormInputText(),
      'email'                 => new sfWidgetFormInputText(),
      'fone_residencial'      => new sfWidgetFormInputText(),
      'foto'                  => new sfWidgetFormInputText(),
      'id_neces_especial'     => new sfWidgetFormInputText(),
      'matricula'             => new sfWidgetFormInputText(),
      'dt_nascimento'         => new sfWidgetFormDate(),
      'naturalidade'          => new sfWidgetFormInputText(),
      'uf_nascimento'         => new sfWidgetFormInputText(),
      'nacionalidade'         => new sfWidgetFormInputText(),
      'sexo'                  => new sfWidgetFormInputText(),
      'estado_civil'          => new sfWidgetFormInputText(),
      'titulo'                => new sfWidgetFormInputText(),
      'titulo_zona'           => new sfWidgetFormInputText(),
      'titulo_secao'          => new sfWidgetFormInputText(),
      'rg'                    => new sfWidgetFormInputText(),
      'rg_dt_exped'           => new sfWidgetFormDate(),
      'rg_org_exped'          => new sfWidgetFormInputText(),
      'cpf'                   => new sfWidgetFormInputText(),
      'reservista'            => new sfWidgetFormInputText(),
      'pai'                   => new sfWidgetFormInputText(),
      'mae'                   => new sfWidgetFormInputText(),
      'cep'                   => new sfWidgetFormInputText(),
      'numero'                => new sfWidgetFormInputText(),
      'complemento'           => new sfWidgetFormInputText(),
      'id_versao_curso'       => new sfWidgetFormInputText(),
      'id_tipo_ingresso'      => new sfWidgetFormInputText(),
      'dt_ingresso'           => new sfWidgetFormDate(),
      'id_situacao'           => new sfWidgetFormInputText(),
      'dt_situacao'           => new sfWidgetFormDate(),
      'id_destino'            => new sfWidgetFormInputText(),
      'id_2grau'              => new sfWidgetFormInputText(),
      'ano_concl_2grau'       => new sfWidgetFormInputText(),
      'id_3grau'              => new sfWidgetFormInputText(),
      'ano_concl_3grau'       => new sfWidgetFormInputText(),
      'id_trabalho'           => new sfWidgetFormInputText(),
      'cep_trabalho'          => new sfWidgetFormInputText(),
      'fone_trabalho'         => new sfWidgetFormInputText(),
      'ramal_trabalho'        => new sfWidgetFormInputText(),
      'media_geral'           => new sfWidgetFormInputText(),
      'ch_eletiva_cursada'    => new sfWidgetFormInputText(),
      'ch_eletiva_solicitada' => new sfWidgetFormInputText(),
      'ch_obrig_cursada'      => new sfWidgetFormInputText(),
      'ch_obrig_solicitada'   => new sfWidgetFormInputText(),
      'ch_total'              => new sfWidgetFormInputText(),
      'id_antigo'             => new sfWidgetFormInputText(),
      'inst2grau'             => new sfWidgetFormInputText(),
      'inst3grau'             => new sfWidgetFormInputText(),
      'insttrabalho'          => new sfWidgetFormInputText(),
      'id_naturalidade'       => new sfWidgetFormInputText(),
      'id_nacionalidade'      => new sfWidgetFormInputText(),
      'id'                    => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'id_pessoa'             => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'nome'                  => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'celular'               => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'email'                 => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'fone_residencial'      => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'foto'                  => new sfValidatorPass(array('required' => false)),
      'id_neces_especial'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'matricula'             => new sfValidatorInteger(array('min' => -9.2233720368548E+18, 'max' => 9.2233720368548E+18, 'required' => false)),
      'dt_nascimento'         => new sfValidatorDate(array('required' => false)),
      'naturalidade'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'uf_nascimento'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'nacionalidade'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'sexo'                  => new sfValidatorString(array('max_length' => 1, 'required' => false)),
      'estado_civil'          => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'titulo'                => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'titulo_zona'           => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'titulo_secao'          => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'rg'                    => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'rg_dt_exped'           => new sfValidatorDate(array('required' => false)),
      'rg_org_exped'          => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'cpf'                   => new sfValidatorString(array('max_length' => 11, 'required' => false)),
      'reservista'            => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'pai'                   => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'mae'                   => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'cep'                   => new sfValidatorString(array('max_length' => 9, 'required' => false)),
      'numero'                => new sfValidatorString(array('max_length' => 8, 'required' => false)),
      'complemento'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'id_versao_curso'       => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'id_tipo_ingresso'      => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'dt_ingresso'           => new sfValidatorDate(),
      'id_situacao'           => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'dt_situacao'           => new sfValidatorDate(),
      'id_destino'            => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'id_2grau'              => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'ano_concl_2grau'       => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'id_3grau'              => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'ano_concl_3grau'       => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'id_trabalho'           => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'cep_trabalho'          => new sfValidatorString(array('max_length' => 8, 'required' => false)),
      'fone_trabalho'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'ramal_trabalho'        => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'media_geral'           => new sfValidatorNumber(array('required' => false)),
      'ch_eletiva_cursada'    => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'ch_eletiva_solicitada' => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'ch_obrig_cursada'      => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'ch_obrig_solicitada'   => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'ch_total'              => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'id_antigo'             => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'inst2grau'             => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'inst3grau'             => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'insttrabalho'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'id_naturalidade'       => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'id_nacionalidade'      => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'id'                    => new sfValidatorPropelChoice(array('model' => 'TbalunoImport', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tbaluno_import[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TbalunoImport';
  }


}
