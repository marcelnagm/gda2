<?php

/**
 * Tbalunodiploma filter form base class.
 *
 * @package    derca
 * @subpackage filter
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbalunodiplomaFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'matricula'            => new sfWidgetFormPropelChoice(array('model' => 'Tbaluno', 'add_empty' => true)),
      'dt_entrega'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'dt_entrega_historico' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'dt_enade'             => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'n_registro'           => new sfWidgetFormFilterInput(),
      'dt_registro'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'livro'                => new sfWidgetFormFilterInput(),
      'folha'                => new sfWidgetFormFilterInput(),
      'n_processo'           => new sfWidgetFormFilterInput(),
      'obs'                  => new sfWidgetFormFilterInput(),
      'created_at'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'created_by'           => new sfWidgetFormFilterInput(),
      'updated_by'           => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'matricula'            => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tbaluno', 'column' => 'matricula')),
      'dt_entrega'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'dt_entrega_historico' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'dt_enade'             => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'n_registro'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'dt_registro'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'livro'                => new sfValidatorPass(array('required' => false)),
      'folha'                => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'n_processo'           => new sfValidatorPass(array('required' => false)),
      'obs'                  => new sfValidatorPass(array('required' => false)),
      'created_at'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'created_by'           => new sfValidatorPass(array('required' => false)),
      'updated_by'           => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tbalunodiploma_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tbalunodiploma';
  }

  public function getFields()
  {
    return array(
      'id_aluno_diploma'     => 'Number',
      'matricula'            => 'ForeignKey',
      'dt_entrega'           => 'Date',
      'dt_entrega_historico' => 'Date',
      'dt_enade'             => 'Date',
      'n_registro'           => 'Number',
      'dt_registro'          => 'Date',
      'livro'                => 'Text',
      'folha'                => 'Number',
      'n_processo'           => 'Text',
      'obs'                  => 'Text',
      'created_at'           => 'Date',
      'updated_at'           => 'Date',
      'created_by'           => 'Text',
      'updated_by'           => 'Text',
    );
  }
}
