<?php

/**
 * Tbcurso filter form base class.
 *
 * @package    derca
 * @subpackage filter
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbcursoFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'descricao'  => new sfWidgetFormFilterInput(),
      'sucinto'    => new sfWidgetFormFilterInput(),
      'centro'     => new sfWidgetFormFilterInput(),
      'id_nivel'   => new sfWidgetFormPropelChoice(array('model' => 'Tbcursonivel', 'add_empty' => true)),
      'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'created_by' => new sfWidgetFormFilterInput(),
      'updated_by' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'descricao'  => new sfValidatorPass(array('required' => false)),
      'sucinto'    => new sfValidatorPass(array('required' => false)),
      'centro'     => new sfValidatorPass(array('required' => false)),
      'id_nivel'   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tbcursonivel', 'column' => 'id_nivel')),
      'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'created_by' => new sfValidatorPass(array('required' => false)),
      'updated_by' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tbcurso_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tbcurso';
  }

  public function getFields()
  {
    return array(
      'cod_curso'  => 'Number',
      'descricao'  => 'Text',
      'sucinto'    => 'Text',
      'centro'     => 'Text',
      'id_nivel'   => 'ForeignKey',
      'created_at' => 'Date',
      'updated_at' => 'Date',
      'created_by' => 'Text',
      'updated_by' => 'Text',
    );
  }
}
