<?php

/**
 * TbturmaAluno filter form base class.
 *
 * @package    derca
 * @subpackage filter
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbturmaAlunoFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_turma'          => new sfWidgetFormPropelChoice(array('model' => 'Tbturma', 'add_empty' => true)),
      'matricula'         => new sfWidgetFormPropelChoice(array('model' => 'Tbaluno', 'add_empty' => true)),
      'faltas'            => new sfWidgetFormFilterInput(),
      'media_parcial'     => new sfWidgetFormFilterInput(),
      'exame_recuperacao' => new sfWidgetFormFilterInput(),
      'media_final'       => new sfWidgetFormFilterInput(),
      'id_conceito'       => new sfWidgetFormPropelChoice(array('model' => 'Tbconceito', 'add_empty' => true)),
      'created_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'created_by'        => new sfWidgetFormFilterInput(),
      'updated_by'        => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'id_turma'          => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tbturma', 'column' => 'id_turma')),
      'matricula'         => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tbaluno', 'column' => 'matricula')),
      'faltas'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'media_parcial'     => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'exame_recuperacao' => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'media_final'       => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'id_conceito'       => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tbconceito', 'column' => 'id_conceito')),
      'created_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'created_by'        => new sfValidatorPass(array('required' => false)),
      'updated_by'        => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tbturma_aluno_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TbturmaAluno';
  }

  public function getFields()
  {
    return array(
      'id_aluno'          => 'Number',
      'id_turma'          => 'ForeignKey',
      'matricula'         => 'ForeignKey',
      'faltas'            => 'Number',
      'media_parcial'     => 'Number',
      'exame_recuperacao' => 'Number',
      'media_final'       => 'Number',
      'id_conceito'       => 'ForeignKey',
      'created_at'        => 'Date',
      'updated_at'        => 'Date',
      'created_by'        => 'Text',
      'updated_by'        => 'Text',
    );
  }
}
