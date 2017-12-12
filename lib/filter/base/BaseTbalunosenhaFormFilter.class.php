<?php

/**
 * Tbalunosenha filter form base class.
 *
 * @package    derca
 * @subpackage filter
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbalunosenhaFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'matricula' => new sfWidgetFormPropelChoice(array('model' => 'Tbaluno', 'add_empty' => true)),
      'senha'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'matricula' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tbaluno', 'column' => 'matricula')),
      'senha'     => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tbalunosenha_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tbalunosenha';
  }

  public function getFields()
  {
    return array(
      'id'        => 'Number',
      'matricula' => 'ForeignKey',
      'senha'     => 'Text',
    );
  }
}
