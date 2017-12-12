<?php

/**
 * HotSpotRadcheck filter form base class.
 *
 * @package    derca
 * @subpackage filter
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseHotSpotRadcheckFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'username'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'attribute' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'op'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'value'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'username'  => new sfValidatorPass(array('required' => false)),
      'attribute' => new sfValidatorPass(array('required' => false)),
      'op'        => new sfValidatorPass(array('required' => false)),
      'value'     => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('hot_spot_radcheck_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'HotSpotRadcheck';
  }

  public function getFields()
  {
    return array(
      'id'        => 'Number',
      'username'  => 'Text',
      'attribute' => 'Text',
      'op'        => 'Text',
      'value'     => 'Text',
    );
  }
}
