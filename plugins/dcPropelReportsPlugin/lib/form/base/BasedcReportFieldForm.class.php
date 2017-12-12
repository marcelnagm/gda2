<?php

/**
 * dcReportField form base class.
 *
 * @method dcReportField getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BasedcReportFieldForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'dc_report_table_id' => new sfWidgetFormPropelChoice(array('model' => 'dcReportTable', 'add_empty' => true)),
      'column'             => new sfWidgetFormInputText(),
      'alias'              => new sfWidgetFormInputText(),
      'group_selector'     => new sfWidgetFormInputCheckbox(),
      'handler'            => new sfWidgetFormInputText(),
      'dc_report_query_id' => new sfWidgetFormPropelChoice(array('model' => 'dcReportQuery', 'add_empty' => true)),
      'show_name'          => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorPropelChoice(array('model' => 'dcReportField', 'column' => 'id', 'required' => false)),
      'dc_report_table_id' => new sfValidatorPropelChoice(array('model' => 'dcReportTable', 'column' => 'id', 'required' => false)),
      'column'             => new sfValidatorString(array('max_length' => 255)),
      'alias'              => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'group_selector'     => new sfValidatorBoolean(),
      'handler'            => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'dc_report_query_id' => new sfValidatorPropelChoice(array('model' => 'dcReportQuery', 'column' => 'id', 'required' => false)),
      'show_name'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('dc_report_field[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'dcReportField';
  }


}
