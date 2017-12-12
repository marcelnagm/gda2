<?php

/**
 * Tbdisciplinarequisitos filter form base class.
 *
 * @package    derca
 * @subpackage filter
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbdisciplinarequisitosFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'cod_disciplina'     => new sfWidgetFormPropelChoice(array('model' => 'Tbdisciplina', 'add_empty' => true)),
      'id_versao_curso'    => new sfWidgetFormPropelChoice(array('model' => 'Tbcursoversao', 'add_empty' => true)),
      'cod_disc_requisito' => new sfWidgetFormPropelChoice(array('model' => 'Tbdisciplina', 'add_empty' => true)),
      'created_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'created_by'         => new sfWidgetFormFilterInput(),
      'updated_by'         => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'cod_disciplina'     => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tbdisciplina', 'column' => 'cod_disciplina')),
      'id_versao_curso'    => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tbcursoversao', 'column' => 'id_versao_curso')),
      'cod_disc_requisito' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tbdisciplina', 'column' => 'cod_disciplina')),
      'created_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'created_by'         => new sfValidatorPass(array('required' => false)),
      'updated_by'         => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tbdisciplinarequisitos_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tbdisciplinarequisitos';
  }

  public function getFields()
  {
    return array(
      'id_requisito'       => 'Number',
      'cod_disciplina'     => 'ForeignKey',
      'id_versao_curso'    => 'ForeignKey',
      'cod_disc_requisito' => 'ForeignKey',
      'created_at'         => 'Date',
      'updated_at'         => 'Date',
      'created_by'         => 'Text',
      'updated_by'         => 'Text',
    );
  }
}
