<?php

/**
 * dcReportRelation form base class.
 *
 * @method dcReportRelation getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BasedcReportRelationForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                    => new sfWidgetFormInputHidden(),
      'dc_report_table_left'  => new sfWidgetFormPropelChoice(array('model' => 'dcReportTable', 'add_empty' => false)),
      'dc_report_table_right' => new sfWidgetFormPropelChoice(array('model' => 'dcReportTable', 'add_empty' => false)),
      'column_right'          => new sfWidgetFormInputText(),
      'column_left'           => new sfWidgetFormInputText(),
      'join_type'             => new sfWidgetFormInputText(),
      'dc_report_query_id'    => new sfWidgetFormPropelChoice(array('model' => 'dcReportQuery', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'                    => new sfValidatorPropelChoice(array('model' => 'dcReportRelation', 'column' => 'id', 'required' => false)),
      'dc_report_table_left'  => new sfValidatorPropelChoice(array('model' => 'dcReportTable', 'column' => 'id')),
      'dc_report_table_right' => new sfValidatorPropelChoice(array('model' => 'dcReportTable', 'column' => 'id')),
      'column_right'          => new sfValidatorString(array('max_length' => 255)),
      'column_left'           => new sfValidatorString(array('max_length' => 255)),
      'join_type'             => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'dc_report_query_id'    => new sfValidatorPropelChoice(array('model' => 'dcReportQuery', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('dc_report_relation[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'dcReportRelation';
  }


}
