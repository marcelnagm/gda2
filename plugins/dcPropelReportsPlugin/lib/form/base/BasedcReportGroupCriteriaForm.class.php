<?php

/**
 * dcReportGroupCriteria form base class.
 *
 * @method dcReportGroupCriteria getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BasedcReportGroupCriteriaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'dc_report_query_id' => new sfWidgetFormPropelChoice(array('model' => 'dcReportQuery', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorPropelChoice(array('model' => 'dcReportGroupCriteria', 'column' => 'id', 'required' => false)),
      'dc_report_query_id' => new sfValidatorPropelChoice(array('model' => 'dcReportQuery', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('dc_report_group_criteria[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'dcReportGroupCriteria';
  }


}
