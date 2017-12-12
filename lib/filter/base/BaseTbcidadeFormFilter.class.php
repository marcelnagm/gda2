<?php

/**
 * Tbcidade filter form base class.
 *
 * @package    derca
 * @subpackage filter
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbcidadeFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'descricao'  => new sfWidgetFormFilterInput(),
      'id_estado'  => new sfWidgetFormPropelChoice(array('model' => 'Tbestado', 'add_empty' => true)),
      'id_pais'    => new sfWidgetFormPropelChoice(array('model' => 'Tbpais', 'add_empty' => true)),
      'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'created_by' => new sfWidgetFormFilterInput(),
      'updated_by' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'descricao'  => new sfValidatorPass(array('required' => false)),
      'id_estado'  => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tbestado', 'column' => 'id_estado')),
      'id_pais'    => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tbpais', 'column' => 'id_pais')),
      'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'created_by' => new sfValidatorPass(array('required' => false)),
      'updated_by' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tbcidade_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tbcidade';
  }

  public function getFields()
  {
    return array(
      'id_cidade'  => 'Number',
      'descricao'  => 'Text',
      'id_estado'  => 'ForeignKey',
      'id_pais'    => 'ForeignKey',
      'created_at' => 'Date',
      'updated_at' => 'Date',
      'created_by' => 'Text',
      'updated_by' => 'Text',
    );
  }
}
