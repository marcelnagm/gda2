<?php

/**
 * dcReportFilter form base class.
 *
 * @method dcReportFilter getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BasedcReportFilterForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'dc_report_query_id'  => new sfWidgetFormPropelChoice(array('model' => 'dcReportQuery', 'add_empty' => false)),
      'dc_report_field_id'  => new sfWidgetFormPropelChoice(array('model' => 'dcReportField', 'add_empty' => false)),
      'name'                => new sfWidgetFormInputText(),
      'filter_type'         => new sfWidgetFormInputText(),
      'database_table_name' => new sfWidgetFormInputText(),
      'id'                  => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'dc_report_query_id'  => new sfValidatorPropelChoice(array('model' => 'dcReportQuery', 'column' => 'id')),
      'dc_report_field_id'  => new sfValidatorPropelChoice(array('model' => 'dcReportField', 'column' => 'id')),
      'name'                => new sfValidatorString(array('max_length' => 100)),
      'filter_type'         => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'database_table_name' => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'id'                  => new sfValidatorPropelChoice(array('model' => 'dcReportFilter', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('dc_report_filter[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'dcReportFilter';
  }


}
