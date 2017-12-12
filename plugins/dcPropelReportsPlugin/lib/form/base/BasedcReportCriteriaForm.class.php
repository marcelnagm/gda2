<?php

/**
 * dcReportCriteria form base class.
 *
 * @method dcReportCriteria getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BasedcReportCriteriaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                          => new sfWidgetFormInputHidden(),
      'dc_report_table_id'          => new sfWidgetFormPropelChoice(array('model' => 'dcReportTable', 'add_empty' => false)),
      'column'                      => new sfWidgetFormInputText(),
      'operation'                   => new sfWidgetFormInputText(),
      'value'                       => new sfWidgetFormTextarea(),
      'dc_report_group_criteria_id' => new sfWidgetFormPropelChoice(array('model' => 'dcReportGroupCriteria', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'                          => new sfValidatorPropelChoice(array('model' => 'dcReportCriteria', 'column' => 'id', 'required' => false)),
      'dc_report_table_id'          => new sfValidatorPropelChoice(array('model' => 'dcReportTable', 'column' => 'id')),
      'column'                      => new sfValidatorString(array('max_length' => 255)),
      'operation'                   => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'value'                       => new sfValidatorString(array('required' => false)),
      'dc_report_group_criteria_id' => new sfValidatorPropelChoice(array('model' => 'dcReportGroupCriteria', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('dc_report_criteria[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'dcReportCriteria';
  }


}
