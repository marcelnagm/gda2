<?php

/**
 * TbfilaBkp filter form base class.
 *
 * @package    derca
 * @subpackage filter
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbfilaBkpFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_fila'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'matricula'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'id_oferta'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'hora_insert' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'hora_delete' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'id_situacao' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'id_fila'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'matricula'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_oferta'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'hora_insert' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'hora_delete' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'id_situacao' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('tbfila_bkp_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TbfilaBkp';
  }

  public function getFields()
  {
    return array(
      'id_fila'     => 'Number',
      'matricula'   => 'Number',
      'id_oferta'   => 'Number',
      'hora_insert' => 'Date',
      'hora_delete' => 'Date',
      'id_situacao' => 'Number',
      'id'          => 'Number',
    );
  }
}
