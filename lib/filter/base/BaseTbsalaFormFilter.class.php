<?php

/**
 * Tbsala filter form base class.
 *
 * @package    derca
 * @subpackage filter
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbsalaFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'bloco'      => new sfWidgetFormFilterInput(),
      'capacidade' => new sfWidgetFormFilterInput(),
      'descricao'  => new sfWidgetFormFilterInput(),
      'id_campus'  => new sfWidgetFormPropelChoice(array('model' => 'Tbcampus', 'add_empty' => true)),
      'numero'     => new sfWidgetFormFilterInput(),
      'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'created_by' => new sfWidgetFormFilterInput(),
      'updated_by' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'bloco'      => new sfValidatorPass(array('required' => false)),
      'capacidade' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'descricao'  => new sfValidatorPass(array('required' => false)),
      'id_campus'  => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tbcampus', 'column' => 'id_campus')),
      'numero'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'created_by' => new sfValidatorPass(array('required' => false)),
      'updated_by' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tbsala_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tbsala';
  }

  public function getFields()
  {
    return array(
      'id_sala'    => 'Number',
      'bloco'      => 'Text',
      'capacidade' => 'Number',
      'descricao'  => 'Text',
      'id_campus'  => 'ForeignKey',
      'numero'     => 'Number',
      'created_at' => 'Date',
      'updated_at' => 'Date',
      'created_by' => 'Text',
      'updated_by' => 'Text',
    );
  }
}
