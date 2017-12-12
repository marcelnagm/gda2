<?php

/**
 * TbmatriculaComprovante filter form base class.
 *
 * @package    derca
 * @subpackage filter
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbmatriculaComprovanteFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'matricula'      => new sfWidgetFormPropelChoice(array('model' => 'Tbalunomatricula', 'add_empty' => true)),
      'datahora'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'codigo'         => new sfWidgetFormFilterInput(),
      'situacao'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'created_by'     => new sfWidgetFormFilterInput(),
      'updated_by'     => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'matricula'      => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tbalunomatricula', 'column' => 'matricula')),
      'datahora'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'codigo'         => new sfValidatorPass(array('required' => false)),
      'situacao'       => new sfValidatorPass(array('required' => false)),
      'created_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'created_by'     => new sfValidatorPass(array('required' => false)),
      'updated_by'     => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tbmatricula_comprovante_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TbmatriculaComprovante';
  }

  public function getFields()
  {
    return array(
      'id_comprovante' => 'Number',
      'matricula'      => 'ForeignKey',
      'datahora'       => 'Date',
      'codigo'         => 'Text',
      'situacao'       => 'Text',
      'created_at'     => 'Date',
      'updated_at'     => 'Date',
      'created_by'     => 'Text',
      'updated_by'     => 'Text',
    );
  }
}
