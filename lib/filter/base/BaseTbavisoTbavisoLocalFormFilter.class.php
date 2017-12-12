<?php

/**
 * TbavisoTbavisoLocal filter form base class.
 *
 * @package    derca
 * @subpackage filter
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbavisoTbavisoLocalFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_aviso' => new sfWidgetFormPropelChoice(array('model' => 'Tbaviso', 'add_empty' => true)),
      'id_local' => new sfWidgetFormPropelChoice(array('model' => 'TbavisoLocal', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id_aviso' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tbaviso', 'column' => 'id_aviso')),
      'id_local' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'TbavisoLocal', 'column' => 'id_local')),
    ));

    $this->widgetSchema->setNameFormat('tbaviso_tbaviso_local_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TbavisoTbavisoLocal';
  }

  public function getFields()
  {
    return array(
      'id_aviso' => 'ForeignKey',
      'id_local' => 'ForeignKey',
      'id'       => 'Number',
    );
  }
}
