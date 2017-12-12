<?php

/**
 * Tbreligiao filter form base class.
 *
 * @package    derca
 * @subpackage filter
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbreligiaoFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'descricao'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'descricao'   => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tbreligiao_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tbreligiao';
  }

  public function getFields()
  {
    return array(
      'id_religiao' => 'Number',
      'descricao'   => 'Text',
    );
  }
}
