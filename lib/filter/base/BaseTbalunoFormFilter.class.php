<?php

/**
 * Tbaluno filter form base class.
 *
 * @package    derca
 * @subpackage filter
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbalunoFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_pessoa'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'nome'                  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'celular'               => new sfWidgetFormFilterInput(),
      'email'                 => new sfWidgetFormFilterInput(),
      'fone_residencial'      => new sfWidgetFormFilterInput(),
      'foto'                  => new sfWidgetFormFilterInput(),
      'id_neces_especial'     => new sfWidgetFormPropelChoice(array('model' => 'Tbnecesespecial', 'add_empty' => true)),
      'dt_nascimento'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'naturalidade'          => new sfWidgetFormPropelChoice(array('model' => 'Tbcidade', 'add_empty' => true)),
      'uf_nascimento'         => new sfWidgetFormFilterInput(),
      'nacionalidade'         => new sfWidgetFormPropelChoice(array('model' => 'Tbpais', 'add_empty' => true)),
      'sexo'                  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'estado_civil'          => new sfWidgetFormFilterInput(),
      'titulo'                => new sfWidgetFormFilterInput(),
      'titulo_zona'           => new sfWidgetFormFilterInput(),
      'titulo_secao'          => new sfWidgetFormFilterInput(),
      'rg'                    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'rg_dt_exped'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'rg_org_exped'          => new sfWidgetFormFilterInput(),
      'cpf'                   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'reservista'            => new sfWidgetFormFilterInput(),
      'pai'                   => new sfWidgetFormFilterInput(),
      'mae'                   => new sfWidgetFormFilterInput(),
      'cep'                   => new sfWidgetFormPropelChoice(array('model' => 'Tblogradouro', 'add_empty' => true, 'key_method' => 'getCep')),
      'numero'                => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'complemento'           => new sfWidgetFormFilterInput(),
      'id_versao_curso'       => new sfWidgetFormPropelChoice(array('model' => 'Tbcursoversao', 'add_empty' => true)),
      'id_tipo_ingresso'      => new sfWidgetFormPropelChoice(array('model' => 'Tbtipoingresso', 'add_empty' => true)),
      'dt_ingresso'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'id_situacao'           => new sfWidgetFormPropelChoice(array('model' => 'Tbalunosituacao', 'add_empty' => true)),
      'dt_situacao'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'id_destino'            => new sfWidgetFormPropelChoice(array('model' => 'Tbinstexterna', 'add_empty' => true)),
      'id_2grau'              => new sfWidgetFormPropelChoice(array('model' => 'Tbinstexterna', 'add_empty' => true)),
      'ano_concl_2grau'       => new sfWidgetFormFilterInput(),
      'id_3grau'              => new sfWidgetFormPropelChoice(array('model' => 'Tbinstexterna', 'add_empty' => true)),
      'ano_concl_3grau'       => new sfWidgetFormFilterInput(),
      'id_trabalho'           => new sfWidgetFormPropelChoice(array('model' => 'Tbinstexterna', 'add_empty' => true)),
      'cep_trabalho'          => new sfWidgetFormPropelChoice(array('model' => 'Tblogradouro', 'add_empty' => true, 'key_method' => 'getCep')),
      'fone_trabalho'         => new sfWidgetFormFilterInput(),
      'ramal_trabalho'        => new sfWidgetFormFilterInput(),
      'media_geral'           => new sfWidgetFormFilterInput(),
      'ch_eletiva_cursada'    => new sfWidgetFormFilterInput(),
      'ch_eletiva_solicitada' => new sfWidgetFormFilterInput(),
      'ch_obrig_cursada'      => new sfWidgetFormFilterInput(),
      'ch_obrig_solicitada'   => new sfWidgetFormFilterInput(),
      'ch_total'              => new sfWidgetFormFilterInput(),
      'op_ingresso'           => new sfWidgetFormFilterInput(),
      'id_polo'               => new sfWidgetFormPropelChoice(array('model' => 'Tbpolos', 'add_empty' => true)),
      'created_at'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'created_by'            => new sfWidgetFormFilterInput(),
      'updated_by'            => new sfWidgetFormFilterInput(),
      'id_antigo'             => new sfWidgetFormFilterInput(),
      'id_raca'               => new sfWidgetFormPropelChoice(array('model' => 'Tbalunoracacor', 'add_empty' => true)),
      'enade'                 => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'id_pessoa'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'nome'                  => new sfValidatorPass(array('required' => false)),
      'celular'               => new sfValidatorPass(array('required' => false)),
      'email'                 => new sfValidatorPass(array('required' => false)),
      'fone_residencial'      => new sfValidatorPass(array('required' => false)),
      'foto'                  => new sfValidatorPass(array('required' => false)),
      'id_neces_especial'     => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tbnecesespecial', 'column' => 'id_neces_especial')),
      'dt_nascimento'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'naturalidade'          => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tbcidade', 'column' => 'id_cidade')),
      'uf_nascimento'         => new sfValidatorPass(array('required' => false)),
      'nacionalidade'         => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tbpais', 'column' => 'id_pais')),
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
      'cep'                   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tblogradouro', 'column' => 'cep')),
      'numero'                => new sfValidatorPass(array('required' => false)),
      'complemento'           => new sfValidatorPass(array('required' => false)),
      'id_versao_curso'       => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tbcursoversao', 'column' => 'id_versao_curso')),
      'id_tipo_ingresso'      => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tbtipoingresso', 'column' => 'id_tipo_ingresso')),
      'dt_ingresso'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'id_situacao'           => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tbalunosituacao', 'column' => 'id_situacao')),
      'dt_situacao'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'id_destino'            => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tbinstexterna', 'column' => 'id_inst_externa')),
      'id_2grau'              => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tbinstexterna', 'column' => 'id_inst_externa')),
      'ano_concl_2grau'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_3grau'              => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tbinstexterna', 'column' => 'id_inst_externa')),
      'ano_concl_3grau'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_trabalho'           => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tbinstexterna', 'column' => 'id_inst_externa')),
      'cep_trabalho'          => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tblogradouro', 'column' => 'cep')),
      'fone_trabalho'         => new sfValidatorPass(array('required' => false)),
      'ramal_trabalho'        => new sfValidatorPass(array('required' => false)),
      'media_geral'           => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'ch_eletiva_cursada'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'ch_eletiva_solicitada' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'ch_obrig_cursada'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'ch_obrig_solicitada'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'ch_total'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'op_ingresso'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_polo'               => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tbpolos', 'column' => 'id_polo')),
      'created_at'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'created_by'            => new sfValidatorPass(array('required' => false)),
      'updated_by'            => new sfValidatorPass(array('required' => false)),
      'id_antigo'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_raca'               => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tbalunoracacor', 'column' => 'id_raca')),
      'enade'                 => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('tbaluno_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tbaluno';
  }

  public function getFields()
  {
    return array(
      'id_pessoa'             => 'Number',
      'matricula'             => 'Number',
      'nome'                  => 'Text',
      'celular'               => 'Text',
      'email'                 => 'Text',
      'fone_residencial'      => 'Text',
      'foto'                  => 'Text',
      'id_neces_especial'     => 'ForeignKey',
      'dt_nascimento'         => 'Date',
      'naturalidade'          => 'ForeignKey',
      'uf_nascimento'         => 'Text',
      'nacionalidade'         => 'ForeignKey',
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
      'cep'                   => 'ForeignKey',
      'numero'                => 'Text',
      'complemento'           => 'Text',
      'id_versao_curso'       => 'ForeignKey',
      'id_tipo_ingresso'      => 'ForeignKey',
      'dt_ingresso'           => 'Date',
      'id_situacao'           => 'ForeignKey',
      'dt_situacao'           => 'Date',
      'id_destino'            => 'ForeignKey',
      'id_2grau'              => 'ForeignKey',
      'ano_concl_2grau'       => 'Number',
      'id_3grau'              => 'ForeignKey',
      'ano_concl_3grau'       => 'Number',
      'id_trabalho'           => 'ForeignKey',
      'cep_trabalho'          => 'ForeignKey',
      'fone_trabalho'         => 'Text',
      'ramal_trabalho'        => 'Text',
      'media_geral'           => 'Number',
      'ch_eletiva_cursada'    => 'Number',
      'ch_eletiva_solicitada' => 'Number',
      'ch_obrig_cursada'      => 'Number',
      'ch_obrig_solicitada'   => 'Number',
      'ch_total'              => 'Number',
      'op_ingresso'           => 'Number',
      'id_polo'               => 'ForeignKey',
      'created_at'            => 'Date',
      'updated_at'            => 'Date',
      'created_by'            => 'Text',
      'updated_by'            => 'Text',
      'id_antigo'             => 'Number',
      'id_raca'               => 'ForeignKey',
      'enade'                 => 'Boolean',
    );
  }
}
