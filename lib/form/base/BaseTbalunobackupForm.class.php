<?php

/**
 * Tbalunobackup form base class.
 *
 * @method Tbalunobackup getObject() Returns the current form's model object
 *
 * @package    derca
 * @subpackage form
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbalunobackupForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_pessoa'              => new sfWidgetFormInputText(),
      'matricula'              => new sfWidgetFormInputHidden(),
      'nome'                   => new sfWidgetFormInputText(),
      'celular'                => new sfWidgetFormInputText(),
      'email'                  => new sfWidgetFormInputText(),
      'fone_residencial'       => new sfWidgetFormInputText(),
      'foto'                   => new sfWidgetFormInputText(),
      'id_neces_especial'      => new sfWidgetFormPropelChoice(array('model' => 'Tbnecesespecial', 'add_empty' => false)),
      'dt_nascimento'          => new sfWidgetFormDate(),
      'naturalidade'           => new sfWidgetFormPropelChoice(array('model' => 'Tbcidade', 'add_empty' => false)),
      'uf_nascimento'          => new sfWidgetFormInputText(),
      'nacionalidade'          => new sfWidgetFormPropelChoice(array('model' => 'Tbpais', 'add_empty' => false)),
      'sexo'                   => new sfWidgetFormInputText(),
      'estado_civil'           => new sfWidgetFormInputText(),
      'titulo'                 => new sfWidgetFormInputText(),
      'titulo_zona'            => new sfWidgetFormInputText(),
      'titulo_secao'           => new sfWidgetFormInputText(),
      'rg'                     => new sfWidgetFormInputText(),
      'rg_dt_exped'            => new sfWidgetFormDate(),
      'rg_org_exped'           => new sfWidgetFormInputText(),
      'cpf'                    => new sfWidgetFormInputText(),
      'reservista'             => new sfWidgetFormInputText(),
      'pai'                    => new sfWidgetFormInputText(),
      'mae'                    => new sfWidgetFormInputText(),
      'cep'                    => new sfWidgetFormPropelChoice(array('model' => 'Tblogradouro', 'add_empty' => false, 'key_method' => 'getCep')),
      'numero'                 => new sfWidgetFormInputText(),
      'complemento'            => new sfWidgetFormInputText(),
      'id_versao_curso'        => new sfWidgetFormPropelChoice(array('model' => 'Tbcursoversao', 'add_empty' => false)),
      'id_tipo_ingresso'       => new sfWidgetFormPropelChoice(array('model' => 'Tbtipoingresso', 'add_empty' => false)),
      'dt_ingresso'            => new sfWidgetFormDate(),
      'id_situacao'            => new sfWidgetFormPropelChoice(array('model' => 'Tbalunosituacao', 'add_empty' => false)),
      'dt_situacao'            => new sfWidgetFormDate(),
      'id_destino'             => new sfWidgetFormPropelChoice(array('model' => 'Tbinstexterna', 'add_empty' => true)),
      'id_2grau'               => new sfWidgetFormPropelChoice(array('model' => 'Tbinstexterna', 'add_empty' => true)),
      'ano_concl_2grau'        => new sfWidgetFormInputText(),
      'id_3grau'               => new sfWidgetFormPropelChoice(array('model' => 'Tbinstexterna', 'add_empty' => true)),
      'ano_concl_3grau'        => new sfWidgetFormInputText(),
      'id_trabalho'            => new sfWidgetFormPropelChoice(array('model' => 'Tbinstexterna', 'add_empty' => true)),
      'cep_trabalho'           => new sfWidgetFormPropelChoice(array('model' => 'Tblogradouro', 'add_empty' => true, 'key_method' => 'getCep')),
      'fone_trabalho'          => new sfWidgetFormInputText(),
      'ramal_trabalho'         => new sfWidgetFormInputText(),
      'media_geral'            => new sfWidgetFormInputText(),
      'ch_eletiva_cursada'     => new sfWidgetFormInputText(),
      'ch_eletiva_solicitada'  => new sfWidgetFormInputText(),
      'ch_obrig_cursada'       => new sfWidgetFormInputText(),
      'ch_obrig_solicitada'    => new sfWidgetFormInputText(),
      'ch_total'               => new sfWidgetFormInputText(),
      'op_ingresso'            => new sfWidgetFormInputText(),
      'id_polo'                => new sfWidgetFormPropelChoice(array('model' => 'Tbpolos', 'add_empty' => false)),
      'created_at'             => new sfWidgetFormDate(),
      'updated_at'             => new sfWidgetFormDate(),
      'created_by'             => new sfWidgetFormInputText(),
      'updated_by'             => new sfWidgetFormInputText(),
      'id_antigo'              => new sfWidgetFormInputText(),
      'id_raca'                => new sfWidgetFormPropelChoice(array('model' => 'Tbalunoracacor', 'add_empty' => false)),
      'qtd_irmaos'             => new sfWidgetFormInputText(),
      'renda_familiar'         => new sfWidgetFormInputText(),
      'id_religiao'            => new sfWidgetFormPropelChoice(array('model' => 'Tbreligiao', 'add_empty' => false)),
      'pai_profissao'          => new sfWidgetFormInputText(),
      'pai_local_trabalho'     => new sfWidgetFormInputText(),
      'pai_fone'               => new sfWidgetFormInputText(),
      'pai_id_nivel_instrucao' => new sfWidgetFormPropelChoice(array('model' => 'Tbnivelinstrucao', 'add_empty' => false)),
      'mae_profissao'          => new sfWidgetFormInputText(),
      'mae_local_trabalho'     => new sfWidgetFormInputText(),
      'mae_fone'               => new sfWidgetFormInputText(),
      'mae_id_nivel_instrucao' => new sfWidgetFormPropelChoice(array('model' => 'Tbnivelinstrucao', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id_pessoa'              => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'matricula'              => new sfValidatorPropelChoice(array('model' => 'Tbalunobackup', 'column' => 'matricula', 'required' => false)),
      'nome'                   => new sfValidatorString(array('max_length' => 100)),
      'celular'                => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'email'                  => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'fone_residencial'       => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'foto'                   => new sfValidatorPass(array('required' => false)),
      'id_neces_especial'      => new sfValidatorPropelChoice(array('model' => 'Tbnecesespecial', 'column' => 'id_neces_especial')),
      'dt_nascimento'          => new sfValidatorDate(),
      'naturalidade'           => new sfValidatorPropelChoice(array('model' => 'Tbcidade', 'column' => 'id_cidade')),
      'uf_nascimento'          => new sfValidatorString(array('max_length' => 2, 'required' => false)),
      'nacionalidade'          => new sfValidatorPropelChoice(array('model' => 'Tbpais', 'column' => 'id_pais')),
      'sexo'                   => new sfValidatorString(array('max_length' => 1)),
      'estado_civil'           => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'titulo'                 => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'titulo_zona'            => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'titulo_secao'           => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'rg'                     => new sfValidatorString(array('max_length' => 20)),
      'rg_dt_exped'            => new sfValidatorDate(array('required' => false)),
      'rg_org_exped'           => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'cpf'                    => new sfValidatorString(array('max_length' => 11)),
      'reservista'             => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'pai'                    => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'mae'                    => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'cep'                    => new sfValidatorPropelChoice(array('model' => 'Tblogradouro', 'column' => 'cep')),
      'numero'                 => new sfValidatorString(array('max_length' => 8)),
      'complemento'            => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'id_versao_curso'        => new sfValidatorPropelChoice(array('model' => 'Tbcursoversao', 'column' => 'id_versao_curso')),
      'id_tipo_ingresso'       => new sfValidatorPropelChoice(array('model' => 'Tbtipoingresso', 'column' => 'id_tipo_ingresso')),
      'dt_ingresso'            => new sfValidatorDate(),
      'id_situacao'            => new sfValidatorPropelChoice(array('model' => 'Tbalunosituacao', 'column' => 'id_situacao')),
      'dt_situacao'            => new sfValidatorDate(array('required' => false)),
      'id_destino'             => new sfValidatorPropelChoice(array('model' => 'Tbinstexterna', 'column' => 'id_inst_externa', 'required' => false)),
      'id_2grau'               => new sfValidatorPropelChoice(array('model' => 'Tbinstexterna', 'column' => 'id_inst_externa', 'required' => false)),
      'ano_concl_2grau'        => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'id_3grau'               => new sfValidatorPropelChoice(array('model' => 'Tbinstexterna', 'column' => 'id_inst_externa', 'required' => false)),
      'ano_concl_3grau'        => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'id_trabalho'            => new sfValidatorPropelChoice(array('model' => 'Tbinstexterna', 'column' => 'id_inst_externa', 'required' => false)),
      'cep_trabalho'           => new sfValidatorPropelChoice(array('model' => 'Tblogradouro', 'column' => 'cep', 'required' => false)),
      'fone_trabalho'          => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'ramal_trabalho'         => new sfValidatorString(array('max_length' => 5, 'required' => false)),
      'media_geral'            => new sfValidatorNumber(array('required' => false)),
      'ch_eletiva_cursada'     => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'ch_eletiva_solicitada'  => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'ch_obrig_cursada'       => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'ch_obrig_solicitada'    => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'ch_total'               => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'op_ingresso'            => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'id_polo'                => new sfValidatorPropelChoice(array('model' => 'Tbpolos', 'column' => 'id_polo')),
      'created_at'             => new sfValidatorDate(array('required' => false)),
      'updated_at'             => new sfValidatorDate(array('required' => false)),
      'created_by'             => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'updated_by'             => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'id_antigo'              => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'id_raca'                => new sfValidatorPropelChoice(array('model' => 'Tbalunoracacor', 'column' => 'id_raca')),
      'qtd_irmaos'             => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'renda_familiar'         => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'id_religiao'            => new sfValidatorPropelChoice(array('model' => 'Tbreligiao', 'column' => 'id_religiao')),
      'pai_profissao'          => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'pai_local_trabalho'     => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'pai_fone'               => new sfValidatorString(array('max_length' => 25, 'required' => false)),
      'pai_id_nivel_instrucao' => new sfValidatorPropelChoice(array('model' => 'Tbnivelinstrucao', 'column' => 'id_nivel_instrucao')),
      'mae_profissao'          => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'mae_local_trabalho'     => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'mae_fone'               => new sfValidatorString(array('max_length' => 25, 'required' => false)),
      'mae_id_nivel_instrucao' => new sfValidatorPropelChoice(array('model' => 'Tbnivelinstrucao', 'column' => 'id_nivel_instrucao')),
    ));

    $this->widgetSchema->setNameFormat('tbalunobackup[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tbalunobackup';
  }


}
