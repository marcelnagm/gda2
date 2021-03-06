<?php

/**
 * dcReportCriteria filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BasedcReportCriteriaFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'dc_report_table_id'          => new sfWidgetFormPropelChoice(array('model' => 'dcReportTable', 'add_empty' => true)),
      'column'                      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'operation'                   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'value'                       => new sfWidgetFormFilterInput(),
      'dc_report_group_criteria_id' => new sfWidgetFormPropelChoice(array('model' => 'dcReportGroupCriteria', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'dc_report_table_id'          => new sfValidatorPropelChoice(array('required' => false, 'model' => 'dcReportTable', 'column' => 'id')),
      'column'                      => new sfValidatorPass(array('required' => false)),
      'operation'                   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'value'                       => new sfValidatorPass(array('required' => false)),
      'dc_report_group_criteria_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'dcReportGroupCriteria', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('dc_report_criteria_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'dcReportCriteria';
  }

  public function getFields()
  {
    return array(
      'id'                          => 'Number',
      'dc_report_table_id'          => 'ForeignKey',
      'column'                      => 'Text',
      'operation'                   => 'Number',
      'value'                       => 'Text',
      'dc_report_group_criteria_id' => 'ForeignKey',
    );
  }
}
