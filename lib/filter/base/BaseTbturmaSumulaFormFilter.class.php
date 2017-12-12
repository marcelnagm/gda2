<?php

/**
 * TbturmaSumula filter form base class.
 *
 * @package    derca
 * @subpackage filter
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbturmaSumulaFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_turma'       => new sfWidgetFormPropelChoice(array('model' => 'Tbturma', 'add_empty' => true)),
      'data'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'descricao'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'matricula_prof' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'id_turma'       => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tbturma', 'column' => 'id_turma')),
      'data'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'descricao'      => new sfValidatorPass(array('required' => false)),
      'matricula_prof' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('tbturma_sumula_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TbturmaSumula';
  }

  public function getFields()
  {
    return array(
      'id_sumula'      => 'Number',
      'id_turma'       => 'ForeignKey',
      'data'           => 'Date',
      'descricao'      => 'Text',
      'matricula_prof' => 'Number',
    );
  }
}
