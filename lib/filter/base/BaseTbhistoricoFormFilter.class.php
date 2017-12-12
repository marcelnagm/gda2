<?php

/**
 * Tbhistorico filter form base class.
 *
 * @package    derca
 * @subpackage filter
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbhistoricoFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_periodo'     => new sfWidgetFormPropelChoice(array('model' => 'Tbperiodo', 'add_empty' => true)),
      'matricula'      => new sfWidgetFormPropelChoice(array('model' => 'Tbaluno', 'add_empty' => true)),
      'cod_disciplina' => new sfWidgetFormPropelChoice(array('model' => 'Tbdisciplina', 'add_empty' => true)),
      'media'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'faltas'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'id_conceito'    => new sfWidgetFormPropelChoice(array('model' => 'Tbconceito', 'add_empty' => true)),
      'duplicado'      => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'created_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'created_by'     => new sfWidgetFormFilterInput(),
      'updated_by'     => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'id_periodo'     => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tbperiodo', 'column' => 'id_periodo')),
      'matricula'      => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tbaluno', 'column' => 'matricula')),
      'cod_disciplina' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tbdisciplina', 'column' => 'cod_disciplina')),
      'media'          => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'faltas'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_conceito'    => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tbconceito', 'column' => 'id_conceito')),
      'duplicado'      => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'created_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'created_by'     => new sfValidatorPass(array('required' => false)),
      'updated_by'     => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tbhistorico_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tbhistorico';
  }

  public function getFields()
  {
    return array(
      'id_historico'   => 'Number',
      'id_periodo'     => 'ForeignKey',
      'matricula'      => 'ForeignKey',
      'cod_disciplina' => 'ForeignKey',
      'media'          => 'Number',
      'faltas'         => 'Number',
      'id_conceito'    => 'ForeignKey',
      'duplicado'      => 'Boolean',
      'created_at'     => 'Date',
      'updated_at'     => 'Date',
      'created_by'     => 'Text',
      'updated_by'     => 'Text',
    );
  }
}
