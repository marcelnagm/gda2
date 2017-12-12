<?php

/**
 * Tbdocs filter form base class.
 *
 * @package    derca
 * @subpackage filter
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbdocsFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'data_entrada'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'data_finalizado' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'data_saida'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'nome_entrada'    => new sfWidgetFormFilterInput(),
      'nome_finalizado' => new sfWidgetFormFilterInput(),
      'nome_saida'      => new sfWidgetFormFilterInput(),
      'descricao'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'data_entrada'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'data_finalizado' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'data_saida'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'nome_entrada'    => new sfValidatorPass(array('required' => false)),
      'nome_finalizado' => new sfValidatorPass(array('required' => false)),
      'nome_saida'      => new sfValidatorPass(array('required' => false)),
      'descricao'       => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tbdocs_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tbdocs';
  }

  public function getFields()
  {
    return array(
      'id_docs'         => 'Number',
      'data_entrada'    => 'Date',
      'data_finalizado' => 'Date',
      'data_saida'      => 'Date',
      'nome_entrada'    => 'Text',
      'nome_finalizado' => 'Text',
      'nome_saida'      => 'Text',
      'descricao'       => 'Text',
    );
  }
}
