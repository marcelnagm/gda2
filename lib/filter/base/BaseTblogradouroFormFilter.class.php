<?php

/**
 * Tblogradouro filter form base class.
 *
 * @package    derca
 * @subpackage filter
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTblogradouroFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'descricao'     => new sfWidgetFormFilterInput(),
      'cep'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'id_bairro'     => new sfWidgetFormPropelChoice(array('model' => 'Tbbairro', 'add_empty' => true)),
      'id_cidade'     => new sfWidgetFormPropelChoice(array('model' => 'Tbcidade', 'add_empty' => true)),
      'created_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'created_by'    => new sfWidgetFormFilterInput(),
      'updated_by'    => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'descricao'     => new sfValidatorPass(array('required' => false)),
      'cep'           => new sfValidatorPass(array('required' => false)),
      'id_bairro'     => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tbbairro', 'column' => 'id_bairro')),
      'id_cidade'     => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tbcidade', 'column' => 'id_cidade')),
      'created_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'created_by'    => new sfValidatorPass(array('required' => false)),
      'updated_by'    => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tblogradouro_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tblogradouro';
  }

  public function getFields()
  {
    return array(
      'id_logradouro' => 'Number',
      'descricao'     => 'Text',
      'cep'           => 'Text',
      'id_bairro'     => 'ForeignKey',
      'id_cidade'     => 'ForeignKey',
      'created_at'    => 'Date',
      'updated_at'    => 'Date',
      'created_by'    => 'Text',
      'updated_by'    => 'Text',
    );
  }
}
