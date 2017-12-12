<?php

/**
 * dcReportRelation filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BasedcReportRelationFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'dc_report_table_left'  => new sfWidgetFormPropelChoice(array('model' => 'dcReportTable', 'add_empty' => true)),
      'dc_report_table_right' => new sfWidgetFormPropelChoice(array('model' => 'dcReportTable', 'add_empty' => true)),
      'column_right'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'column_left'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'join_type'             => new sfWidgetFormFilterInput(),
      'dc_report_query_id'    => new sfWidgetFormPropelChoice(array('model' => 'dcReportQuery', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'dc_report_table_left'  => new sfValidatorPropelChoice(array('required' => false, 'model' => 'dcReportTable', 'column' => 'id')),
      'dc_report_table_right' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'dcReportTable', 'column' => 'id')),
      'column_right'          => new sfValidatorPass(array('required' => false)),
      'column_left'           => new sfValidatorPass(array('required' => false)),
      'join_type'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'dc_report_query_id'    => new sfValidatorPropelChoice(array('required' => false, 'model' => 'dcReportQuery', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('dc_report_relation_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'dcReportRelation';
  }

  public function getFields()
  {
    return array(
      'id'                    => 'Number',
      'dc_report_table_left'  => 'ForeignKey',
      'dc_report_table_right' => 'ForeignKey',
      'column_right'          => 'Text',
      'column_left'           => 'Text',
      'join_type'             => 'Number',
      'dc_report_query_id'    => 'ForeignKey',
    );
  }
}
