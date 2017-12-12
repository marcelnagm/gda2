<?php

/**
 * Tbperiodo filter form base class.
 *
 * @package    derca
 * @subpackage filter
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbperiodoFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'descricao'                  => new sfWidgetFormFilterInput(),
      'ano'                        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'semestre'                   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'periodo'                    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'dt_inicio'                  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'dt_fim'                     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'dt_fim_notas'               => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'dt_inicio_oferta'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'dt_fim_oferta'              => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'dt_inicio_fila'             => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'dt_fim_fila'                => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'dt_inicio_resultado'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'dt_fim_resultado'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'dt_inicio_oferta_cadastro'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'dt_fim_oferta_cadastro'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'dt_inicio_cadastro'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'dt_fim_cadastro'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'dt_inicio_ajuste'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'dt_fim_ajuste'              => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'dt_inicio_ajuste_fila'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'dt_fim_ajuste_fila'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'dt_inicio_ajuste_resultado' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'dt_fim_ajuste_resultado'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'dt_inicio_trancamento'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'dt_fim_trancamento'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'sucinto'                    => new sfWidgetFormFilterInput(),
      'id_nivel'                   => new sfWidgetFormPropelChoice(array('model' => 'Tbcursonivel', 'add_empty' => true)),
      'created_at'                 => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'                 => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'created_by'                 => new sfWidgetFormFilterInput(),
      'updated_by'                 => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'descricao'                  => new sfValidatorPass(array('required' => false)),
      'ano'                        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'semestre'                   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'periodo'                    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'dt_inicio'                  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'dt_fim'                     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'dt_fim_notas'               => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'dt_inicio_oferta'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'dt_fim_oferta'              => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'dt_inicio_fila'             => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'dt_fim_fila'                => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'dt_inicio_resultado'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'dt_fim_resultado'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'dt_inicio_oferta_cadastro'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'dt_fim_oferta_cadastro'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'dt_inicio_cadastro'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'dt_fim_cadastro'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'dt_inicio_ajuste'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'dt_fim_ajuste'              => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'dt_inicio_ajuste_fila'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'dt_fim_ajuste_fila'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'dt_inicio_ajuste_resultado' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'dt_fim_ajuste_resultado'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'dt_inicio_trancamento'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'dt_fim_trancamento'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'sucinto'                    => new sfValidatorPass(array('required' => false)),
      'id_nivel'                   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tbcursonivel', 'column' => 'id_nivel')),
      'created_at'                 => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'                 => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'created_by'                 => new sfValidatorPass(array('required' => false)),
      'updated_by'                 => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tbperiodo_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tbperiodo';
  }

  public function getFields()
  {
    return array(
      'id_periodo'                 => 'Number',
      'descricao'                  => 'Text',
      'ano'                        => 'Number',
      'semestre'                   => 'Number',
      'periodo'                    => 'Number',
      'dt_inicio'                  => 'Date',
      'dt_fim'                     => 'Date',
      'dt_fim_notas'               => 'Date',
      'dt_inicio_oferta'           => 'Date',
      'dt_fim_oferta'              => 'Date',
      'dt_inicio_fila'             => 'Date',
      'dt_fim_fila'                => 'Date',
      'dt_inicio_resultado'        => 'Date',
      'dt_fim_resultado'           => 'Date',
      'dt_inicio_oferta_cadastro'  => 'Date',
      'dt_fim_oferta_cadastro'     => 'Date',
      'dt_inicio_cadastro'         => 'Date',
      'dt_fim_cadastro'            => 'Date',
      'dt_inicio_ajuste'           => 'Date',
      'dt_fim_ajuste'              => 'Date',
      'dt_inicio_ajuste_fila'      => 'Date',
      'dt_fim_ajuste_fila'         => 'Date',
      'dt_inicio_ajuste_resultado' => 'Date',
      'dt_fim_ajuste_resultado'    => 'Date',
      'dt_inicio_trancamento'      => 'Date',
      'dt_fim_trancamento'         => 'Date',
      'sucinto'                    => 'Text',
      'id_nivel'                   => 'ForeignKey',
      'created_at'                 => 'Date',
      'updated_at'                 => 'Date',
      'created_by'                 => 'Text',
      'updated_by'                 => 'Text',
    );
  }
}
