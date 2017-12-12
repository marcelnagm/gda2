<?php

/**
 * Tbalunosolicitacao filter form base class.
 *
 * @package    derca
 * @subpackage filter
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbalunosolicitacaoFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'matricula'        => new sfWidgetFormPropelChoice(array('model' => 'Tbaluno', 'add_empty' => true)),
      'situacao'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'tipo'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'descricao'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'observacao'       => new sfWidgetFormFilterInput(),
      'data_solicitacao' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'data_encerrado'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'created_at'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'created_by'       => new sfWidgetFormFilterInput(),
      'updated_by'       => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'matricula'        => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tbaluno', 'column' => 'matricula')),
      'situacao'         => new sfValidatorPass(array('required' => false)),
      'tipo'             => new sfValidatorPass(array('required' => false)),
      'descricao'        => new sfValidatorPass(array('required' => false)),
      'observacao'       => new sfValidatorPass(array('required' => false)),
      'data_solicitacao' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'data_encerrado'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'created_at'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'created_by'       => new sfValidatorPass(array('required' => false)),
      'updated_by'       => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tbalunosolicitacao_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tbalunosolicitacao';
  }

  public function getFields()
  {
    return array(
      'id_solicitacao'   => 'Number',
      'matricula'        => 'ForeignKey',
      'situacao'         => 'Text',
      'tipo'             => 'Text',
      'descricao'        => 'Text',
      'observacao'       => 'Text',
      'data_solicitacao' => 'Date',
      'data_encerrado'   => 'Date',
      'created_at'       => 'Date',
      'updated_at'       => 'Date',
      'created_by'       => 'Text',
      'updated_by'       => 'Text',
    );
  }
}
