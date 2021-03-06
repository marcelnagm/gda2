<?php

/**
 * TbalunoImport filter form base class.
 *
 * @package    derca
 * @subpackage filter
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbalunoImportFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_pessoa'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'nome'                  => new sfWidgetFormFilterInput(),
      'celular'               => new sfWidgetFormFilterInput(),
      'email'                 => new sfWidgetFormFilterInput(),
      'fone_residencial'      => new sfWidgetFormFilterInput(),
      'foto'                  => new sfWidgetFormFilterInput(),
      'id_neces_especial'     => new sfWidgetFormFilterInput(),
      'matricula'             => new sfWidgetFormFilterInput(),
      'dt_nascimento'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'naturalidade'          => new sfWidgetFormFilterInput(),
      'uf_nascimento'         => new sfWidgetFormFilterInput(),
      'nacionalidade'         => new sfWidgetFormFilterInput(),
      'sexo'                  => new sfWidgetFormFilterInput(),
      'estado_civil'          => new sfWidgetFormFilterInput(),
      'titulo'                => new sfWidgetFormFilterInput(),
      'titulo_zona'           => new sfWidgetFormFilterInput(),
      'titulo_secao'          => new sfWidgetFormFilterInput(),
      'rg'                    => new sfWidgetFormFilterInput(),
      'rg_dt_exped'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'rg_org_exped'          => new sfWidgetFormFilterInput(),
      'cpf'                   => new sfWidgetFormFilterInput(),
      'reservista'            => new sfWidgetFormFilterInput(),
      'pai'                   => new sfWidgetFormFilterInput(),
      'mae'                   => new sfWidgetFormFilterInput(),
      'cep'                   => new sfWidgetFormFilterInput(),
      'numero'                => new sfWidgetFormFilterInput(),
      'complemento'           => new sfWidgetFormFilterInput(),
      'id_versao_curso'       => new sfWidgetFormFilterInput(),
      'id_tipo_ingresso'      => new sfWidgetFormFilterInput(),
      'dt_ingresso'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'id_situacao'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'dt_situacao'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'id_destino'            => new sfWidgetFormFilterInput(),
      'id_2grau'              => new sfWidgetFormFilterInput(),
      'ano_concl_2grau'       => new sfWidgetFormFilterInput(),
      'id_3grau'              => new sfWidgetFormFilterInput(),
      'ano_concl_3grau'       => new sfWidgetFormFilterInput(),
      'id_trabalho'           => new sfWidgetFormFilterInput(),
      'cep_trabalho'          => new sfWidgetFormFilterInput(),
      'fone_trabalho'         => new sfWidgetFormFilterInput(),
      'ramal_trabalho'        => new sfWidgetFormFilterInput(),
      'media_geral'           => new sfWidgetFormFilterInput(),
      'ch_eletiva_cursada'    => new sfWidgetFormFilterInput(),
      'ch_eletiva_solicitada' => new sfWidgetFormFilterInput(),
      'ch_obrig_cursada'      => new sfWidgetFormFilterInput(),
      'ch_obrig_solicitada'   => new sfWidgetFormFilterInput(),
      'ch_total'              => new sfWidgetFormFilterInput(),
      'id_antigo'             => new sfWidgetFormFilterInput(),
      'inst2grau'             => new sfWidgetFormFilterInput(),
      'inst3grau'             => new sfWidgetFormFilterInput(),
      'insttrabalho'          => new sfWidgetFormFilterInput(),
      'id_naturalidade'       => new sfWidgetFormFilterInput(),
      'id_nacionalidade'      => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'id_pessoa'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'nome'                  => new sfValidatorPass(array('required' => false)),
      'celular'               => new sfValidatorPass(array('required' => false)),
      'email'                 => new sfValidatorPass(array('required' => false)),
      'fone_residencial'      => new sfValidatorPass(array('required' => false)),
      'foto'                  => new sfValidatorPass(array('required' => false)),
      'id_neces_especial'     => new sfValidatorPass(array('required' => false)),
      'matricula'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'dt_nascimento'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'naturalidade'          => new sfValidatorPass(array('required' => false)),
      'uf_nascimento'         => new sfValidatorPass(array('required' => false)),
      'nacionalidade'         => new sfValidatorPass(array('required' => false)),
      'sexo'                  => new sfValidatorPass(array('required' => false)),
      'estado_civil'          => new sfValidatorPass(array('required' => false)),
      'titulo'                => new sfValidatorPass(array('required' => false)),
      'titulo_zona'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'titulo_secao'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'rg'                    => new sfValidatorPass(array('required' => false)),
      'rg_dt_exped'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'rg_org_exped'          => new sfValidatorPass(array('required' => false)),
      'cpf'                   => new sfValidatorPass(array('required' => false)),
      'reservista'            => new sfValidatorPass(array('required' => false)),
      'pai'                   => new sfValidatorPass(array('required' => false)),
      'mae'                   => new sfValidatorPass(array('required' => false)),
      'cep'                   => new sfValidatorPass(array('required' => false)),
      'numero'                => new sfValidatorPass(array('required' => false)),
      'complemento'           => new sfValidatorPass(array('required' => false)),
      'id_versao_curso'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_tipo_ingresso'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'dt_ingresso'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'id_situacao'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'dt_situacao'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'id_destino'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_2grau'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'ano_concl_2grau'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_3grau'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'ano_concl_3grau'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_trabalho'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'cep_trabalho'          => new sfValidatorPass(array('required' => false)),
      'fone_trabalho'         => new sfValidatorPass(array('required' => false)),
      'ramal_trabalho'        => new sfValidatorPass(array('required' => false)),
      'media_geral'           => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'ch_eletiva_cursada'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'ch_eletiva_solicitada' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'ch_obrig_cursada'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'ch_obrig_solicitada'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'ch_total'              => new sfValidatorPass(array('required' => false)),
      'id_antigo'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'inst2grau'             => new sfValidatorPass(array('required' => false)),
      'inst3grau'             => new sfValidatorPass(array('required' => false)),
      'insttrabalho'          => new sfValidatorPass(array('required' => false)),
      'id_naturalidade'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_nacionalidade'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('tbaluno_import_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TbalunoImport';
  }

  public function getFields()
  {
    return array(
      'id_pessoa'             => 'Number',
      'nome'                  => 'Text',
      'celular'               => 'Text',
      'email'                 => 'Text',
      'fone_residencial'      => 'Text',
      'foto'                  => 'Text',
      'id_neces_especial'     => 'Text',
      'matricula'             => 'Number',
      'dt_nascimento'         => 'Date',
      'naturalidade'          => 'Text',
      'uf_nascimento'         => 'Text',
      'nacionalidade'         => 'Text',
      'sexo'                  => 'Text',
      'estado_civil'          => 'Text',
      'titulo'                => 'Text',
      'titulo_zona'           => 'Number',
      'titulo_secao'          => 'Number',
      'rg'                    => 'Text',
      'rg_dt_exped'           => 'Date',
      'rg_org_exped'          => 'Text',
      'cpf'                   => 'Text',
      'reservista'            => 'Text',
      'pai'                   => 'Text',
      'mae'                   => 'Text',
      'cep'                   => 'Text',
      'numero'                => 'Text',
      'complemento'           => 'Text',
      'id_versao_curso'       => 'Number',
      'id_tipo_ingresso'      => 'Number',
      'dt_ingresso'           => 'Date',
      'id_situacao'           => 'Number',
      'dt_situacao'           => 'Date',
      'id_destino'            => 'Number',
      'id_2grau'              => 'Number',
      'ano_concl_2grau'       => 'Number',
      'id_3grau'              => 'Number',
      'ano_concl_3grau'       => 'Number',
      'id_trabalho'           => 'Number',
      'cep_trabalho'          => 'Text',
      'fone_trabalho'         => 'Text',
      'ramal_trabalho'        => 'Text',
      'media_geral'           => 'Number',
      'ch_eletiva_cursada'    => 'Number',
      'ch_eletiva_solicitada' => 'Number',
      'ch_obrig_cursada'      => 'Number',
      'ch_obrig_solicitada'   => 'Number',
      'ch_total'              => 'Text',
      'id_antigo'             => 'Number',
      'inst2grau'             => 'Text',
      'inst3grau'             => 'Text',
      'insttrabalho'          => 'Text',
      'id_naturalidade'       => 'Number',
      'id_nacionalidade'      => 'Number',
      'id'                    => 'Number',
    );
  }
}
