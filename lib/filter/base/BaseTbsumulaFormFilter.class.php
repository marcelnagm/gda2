<?php

/**
 * Tbsumula filter form base class.
 *
 * @package    derca
 * @subpackage filter
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbsumulaFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'cod_disciplina' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'turma'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'cod_prof'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'data'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'descricao'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'cod_disciplina' => new sfValidatorPass(array('required' => false)),
      'turma'          => new sfValidatorPass(array('required' => false)),
      'cod_prof'       => new sfValidatorPass(array('required' => false)),
      'data'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'descricao'      => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tbsumula_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tbsumula';
  }

  public function getFields()
  {
    return array(
      'id_sumula'      => 'Number',
      'cod_disciplina' => 'Text',
      'turma'          => 'Text',
      'cod_prof'       => 'Text',
      'data'           => 'Date',
      'descricao'      => 'Text',
    );
  }
}
