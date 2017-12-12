<?php

/**
 * dcReportTable filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BasedcReportTableFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'propel_name'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'alias'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'dc_report_query_id' => new sfWidgetFormPropelChoice(array('model' => 'dcReportQuery', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'propel_name'        => new sfValidatorPass(array('required' => false)),
      'alias'              => new sfValidatorPass(array('required' => false)),
      'dc_report_query_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'dcReportQuery', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('dc_report_table_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'dcReportTable';
  }

  public function getFields()
  {
    return array(
      'id'                 => 'Number',
      'propel_name'        => 'Text',
      'alias'              => 'Text',
      'dc_report_query_id' => 'ForeignKey',
    );
  }
}
