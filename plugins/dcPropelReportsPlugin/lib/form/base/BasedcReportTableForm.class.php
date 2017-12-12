<?php

/**
 * dcReportTable form base class.
 *
 * @method dcReportTable getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BasedcReportTableForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'propel_name'        => new sfWidgetFormInputText(),
      'alias'              => new sfWidgetFormInputText(),
      'dc_report_query_id' => new sfWidgetFormPropelChoice(array('model' => 'dcReportQuery', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorPropelChoice(array('model' => 'dcReportTable', 'column' => 'id', 'required' => false)),
      'propel_name'        => new sfValidatorString(array('max_length' => 255)),
      'alias'              => new sfValidatorString(array('max_length' => 255)),
      'dc_report_query_id' => new sfValidatorPropelChoice(array('model' => 'dcReportQuery', 'column' => 'id')),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'dcReportTable', 'column' => array('dc_report_query_id', 'alias')))
    );

    $this->widgetSchema->setNameFormat('dc_report_table[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'dcReportTable';
  }


}
