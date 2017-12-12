<?php

/**
 * Tbaviso filter form base class.
 *
 * @package    derca
 * @subpackage filter
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbavisoFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'titulo'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'texto'      => new sfWidgetFormFilterInput(),
      'publicado'  => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'local'      => new sfWidgetFormPropelChoice(array('model' => 'TbavisoLocal', 'add_empty' => true, 'key_method' => 'getNome')),
      'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'created_by' => new sfWidgetFormFilterInput(),
      'updated_by' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'titulo'     => new sfValidatorPass(array('required' => false)),
      'texto'      => new sfValidatorPass(array('required' => false)),
      'publicado'  => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'local'      => new sfValidatorPropelChoice(array('required' => false, 'model' => 'TbavisoLocal', 'column' => 'nome')),
      'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'created_by' => new sfValidatorPass(array('required' => false)),
      'updated_by' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tbaviso_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tbaviso';
  }

  public function getFields()
  {
    return array(
      'id_aviso'   => 'Number',
      'titulo'     => 'Text',
      'texto'      => 'Text',
      'publicado'  => 'Boolean',
      'local'      => 'ForeignKey',
      'created_at' => 'Date',
      'updated_at' => 'Date',
      'created_by' => 'Text',
      'updated_by' => 'Text',
    );
  }
}
