<?php

/**
 * TbalunoAtual filter form base class.
 *
 * @package    derca
 * @subpackage filter
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbalunoAtualFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'nome'               => new sfWidgetFormFilterInput(),
      'dt_nascimento'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'naturalidade'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'uf_nascimento'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'nacionalidade'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'sexo'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'estado_civil'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'pai'                => new sfWidgetFormFilterInput(),
      'mae'                => new sfWidgetFormFilterInput(),
      'celular'            => new sfWidgetFormFilterInput(),
      'fone_residencial'   => new sfWidgetFormFilterInput(),
      'email1'             => new sfWidgetFormFilterInput(),
      'email2'             => new sfWidgetFormFilterInput(),
      'end_residencial'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'bairro_residencial' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'cep_residencial'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'numero'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'complemento'        => new sfWidgetFormFilterInput(),
      'grau_2'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'uf_conc_2'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'ano_concl_2grau'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'local_trabalho'     => new sfWidgetFormFilterInput(),
      'end_trabalho'       => new sfWidgetFormFilterInput(),
      'bairro_trabalho'    => new sfWidgetFormFilterInput(),
      'cep_trabalho'       => new sfWidgetFormFilterInput(),
      'fone_trabalho'      => new sfWidgetFormFilterInput(),
      'ramal_trabalho'     => new sfWidgetFormFilterInput(),
      'created_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'created_by'         => new sfWidgetFormFilterInput(),
      'updated_by'         => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'nome'               => new sfValidatorPass(array('required' => false)),
      'dt_nascimento'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'naturalidade'       => new sfValidatorPass(array('required' => false)),
      'uf_nascimento'      => new sfValidatorPass(array('required' => false)),
      'nacionalidade'      => new sfValidatorPass(array('required' => false)),
      'sexo'               => new sfValidatorPass(array('required' => false)),
      'estado_civil'       => new sfValidatorPass(array('required' => false)),
      'pai'                => new sfValidatorPass(array('required' => false)),
      'mae'                => new sfValidatorPass(array('required' => false)),
      'celular'            => new sfValidatorPass(array('required' => false)),
      'fone_residencial'   => new sfValidatorPass(array('required' => false)),
      'email1'             => new sfValidatorPass(array('required' => false)),
      'email2'             => new sfValidatorPass(array('required' => false)),
      'end_residencial'    => new sfValidatorPass(array('required' => false)),
      'bairro_residencial' => new sfValidatorPass(array('required' => false)),
      'cep_residencial'    => new sfValidatorPass(array('required' => false)),
      'numero'             => new sfValidatorPass(array('required' => false)),
      'complemento'        => new sfValidatorPass(array('required' => false)),
      'grau_2'             => new sfValidatorPass(array('required' => false)),
      'uf_conc_2'          => new sfValidatorPass(array('required' => false)),
      'ano_concl_2grau'    => new sfValidatorPass(array('required' => false)),
      'local_trabalho'     => new sfValidatorPass(array('required' => false)),
      'end_trabalho'       => new sfValidatorPass(array('required' => false)),
      'bairro_trabalho'    => new sfValidatorPass(array('required' => false)),
      'cep_trabalho'       => new sfValidatorPass(array('required' => false)),
      'fone_trabalho'      => new sfValidatorPass(array('required' => false)),
      'ramal_trabalho'     => new sfValidatorPass(array('required' => false)),
      'created_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'created_by'         => new sfValidatorPass(array('required' => false)),
      'updated_by'         => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tbaluno_atual_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TbalunoAtual';
  }

  public function getFields()
  {
    return array(
      'nome'               => 'Text',
      'matricula'          => 'Number',
      'dt_nascimento'      => 'Date',
      'naturalidade'       => 'Text',
      'uf_nascimento'      => 'Text',
      'nacionalidade'      => 'Text',
      'sexo'               => 'Text',
      'estado_civil'       => 'Text',
      'pai'                => 'Text',
      'mae'                => 'Text',
      'celular'            => 'Text',
      'fone_residencial'   => 'Text',
      'email1'             => 'Text',
      'email2'             => 'Text',
      'end_residencial'    => 'Text',
      'bairro_residencial' => 'Text',
      'cep_residencial'    => 'Text',
      'numero'             => 'Text',
      'complemento'        => 'Text',
      'grau_2'             => 'Text',
      'uf_conc_2'          => 'Text',
      'ano_concl_2grau'    => 'Text',
      'local_trabalho'     => 'Text',
      'end_trabalho'       => 'Text',
      'bairro_trabalho'    => 'Text',
      'cep_trabalho'       => 'Text',
      'fone_trabalho'      => 'Text',
      'ramal_trabalho'     => 'Text',
      'created_at'         => 'Date',
      'updated_at'         => 'Date',
      'created_by'         => 'Text',
      'updated_by'         => 'Text',
    );
  }
}
