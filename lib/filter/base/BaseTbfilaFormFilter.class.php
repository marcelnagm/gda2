<?php

/**
 * Tbfila filter form base class.
 *
 * @package    derca
 * @subpackage filter
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbfilaFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'matricula'   => new sfWidgetFormPropelChoice(array('model' => 'Tbaluno', 'add_empty' => true)),
      'id_oferta'   => new sfWidgetFormPropelChoice(array('model' => 'Tboferta', 'add_empty' => true)),
      'id_situacao' => new sfWidgetFormPropelChoice(array('model' => 'Tbfilasituacao', 'add_empty' => true)),
      'pontos'      => new sfWidgetFormFilterInput(),
      'reprovacoes' => new sfWidgetFormFilterInput(),
      'formando'    => new sfWidgetFormFilterInput(),
      'created_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'created_by'  => new sfWidgetFormFilterInput(),
      'updated_by'  => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'matricula'   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tbaluno', 'column' => 'matricula')),
      'id_oferta'   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tboferta', 'column' => 'id_oferta')),
      'id_situacao' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tbfilasituacao', 'column' => 'id_situacao')),
      'pontos'      => new sfValidatorPass(array('required' => false)),
      'reprovacoes' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'formando'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'created_by'  => new sfValidatorPass(array('required' => false)),
      'updated_by'  => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tbfila_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tbfila';
  }

  public function getFields()
  {
    return array(
      'id_fila'     => 'Number',
      'matricula'   => 'ForeignKey',
      'id_oferta'   => 'ForeignKey',
      'id_situacao' => 'ForeignKey',
      'pontos'      => 'Text',
      'reprovacoes' => 'Number',
      'formando'    => 'Number',
      'created_at'  => 'Date',
      'updated_at'  => 'Date',
      'created_by'  => 'Text',
      'updated_by'  => 'Text',
    );
  }
}
