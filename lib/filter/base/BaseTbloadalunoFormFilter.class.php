<?php

/**
 * Tbloadaluno filter form base class.
 *
 * @package    derca
 * @subpackage filter
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbloadalunoFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'nome'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'sexo'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'rg'               => new sfWidgetFormFilterInput(),
      'rg_org_exped'     => new sfWidgetFormFilterInput(),
      'cpf'              => new sfWidgetFormFilterInput(),
      'id_versao_curso'  => new sfWidgetFormPropelChoice(array('model' => 'Tbcursoversao', 'add_empty' => true)),
      'id_tipo_ingresso' => new sfWidgetFormPropelChoice(array('model' => 'Tbtipoingresso', 'add_empty' => true)),
      'id_situacao'      => new sfWidgetFormPropelChoice(array('model' => 'Tbalunosituacao', 'add_empty' => true)),
      'classificacao'    => new sfWidgetFormFilterInput(),
      'opcao'            => new sfWidgetFormFilterInput(),
      'processo'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'op_ingresso'      => new sfWidgetFormFilterInput(),
      'created_at'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'created_by'       => new sfWidgetFormFilterInput(),
      'updated_by'       => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'nome'             => new sfValidatorPass(array('required' => false)),
      'sexo'             => new sfValidatorPass(array('required' => false)),
      'rg'               => new sfValidatorPass(array('required' => false)),
      'rg_org_exped'     => new sfValidatorPass(array('required' => false)),
      'cpf'              => new sfValidatorPass(array('required' => false)),
      'id_versao_curso'  => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tbcursoversao', 'column' => 'id_versao_curso')),
      'id_tipo_ingresso' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tbtipoingresso', 'column' => 'id_tipo_ingresso')),
      'id_situacao'      => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tbalunosituacao', 'column' => 'id_situacao')),
      'classificacao'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'opcao'            => new sfValidatorPass(array('required' => false)),
      'processo'         => new sfValidatorPass(array('required' => false)),
      'op_ingresso'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'created_by'       => new sfValidatorPass(array('required' => false)),
      'updated_by'       => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tbloadaluno_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tbloadaluno';
  }

  public function getFields()
  {
    return array(
      'matricula'        => 'Number',
      'nome'             => 'Text',
      'sexo'             => 'Text',
      'rg'               => 'Text',
      'rg_org_exped'     => 'Text',
      'cpf'              => 'Text',
      'id_versao_curso'  => 'ForeignKey',
      'id_tipo_ingresso' => 'ForeignKey',
      'id_situacao'      => 'ForeignKey',
      'classificacao'    => 'Number',
      'opcao'            => 'Text',
      'processo'         => 'Text',
      'op_ingresso'      => 'Number',
      'created_at'       => 'Date',
      'updated_at'       => 'Date',
      'created_by'       => 'Text',
      'updated_by'       => 'Text',
    );
  }
}
