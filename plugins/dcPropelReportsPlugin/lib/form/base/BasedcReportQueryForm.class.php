<?php

/**
 * dcReportQuery form base class.
 *
 * @method dcReportQuery getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BasedcReportQueryForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'name'         => new sfWidgetFormInputText(),
      'description'  => new sfWidgetFormTextarea(),
      'database'     => new sfWidgetFormInputText(),
      'is_published' => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorPropelChoice(array('model' => 'dcReportQuery', 'column' => 'id', 'required' => false)),
      'name'         => new sfValidatorString(array('max_length' => 100)),
      'description'  => new sfValidatorString(array('required' => false)),
      'database'     => new sfValidatorString(array('max_length' => 100)),
      'is_published' => new sfValidatorBoolean(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'dcReportQuery', 'column' => array('name')))
    );

    $this->widgetSchema->setNameFormat('dc_report_query[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'dcReportQuery';
  }


}
