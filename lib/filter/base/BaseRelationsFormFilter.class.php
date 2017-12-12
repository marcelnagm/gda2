<?php

/**
 * Relations filter form base class.
 *
 * @package    derca
 * @subpackage filter
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseRelationsFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'TbavisoLocal' => new sfWidgetFormFilterInput(),
      'Tbaviso'      => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'TbavisoLocal' => new sfValidatorPass(array('required' => false)),
      'Tbaviso'      => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('relations_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Relations';
  }

  public function getFields()
  {
    return array(
      'TbavisoLocal' => 'Text',
      'Tbaviso'      => 'Text',
      'id'           => 'Number',
    );
  }
}
