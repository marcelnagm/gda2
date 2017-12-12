<?php

/**
 * TbturmaNota filter form base class.
 *
 * @package    derca
 * @subpackage filter
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbturmaNotaFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_aluno'   => new sfWidgetFormPropelChoice(array('model' => 'TbturmaAluno', 'add_empty' => true)),
      'n_nota'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'valor'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'created_by' => new sfWidgetFormFilterInput(),
      'updated_by' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'id_aluno'   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'TbturmaAluno', 'column' => 'id_aluno')),
      'n_nota'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'valor'      => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'created_by' => new sfValidatorPass(array('required' => false)),
      'updated_by' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tbturma_nota_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TbturmaNota';
  }

  public function getFields()
  {
    return array(
      'id_nota'    => 'Number',
      'id_aluno'   => 'ForeignKey',
      'n_nota'     => 'Number',
      'valor'      => 'Number',
      'created_at' => 'Date',
      'updated_at' => 'Date',
      'created_by' => 'Text',
      'updated_by' => 'Text',
    );
  }
}
