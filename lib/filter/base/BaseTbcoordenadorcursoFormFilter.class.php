<?php

/**
 * Tbcoordenadorcurso filter form base class.
 *
 * @package    derca
 * @subpackage filter
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbcoordenadorcursoFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'created_at'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'created_by'           => new sfWidgetFormFilterInput(),
      'updated_by'           => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'created_at'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'created_by'           => new sfValidatorPass(array('required' => false)),
      'updated_by'           => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tbcoordenadorcurso_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tbcoordenadorcurso';
  }

  public function getFields()
  {
    return array(
      'id_coordenador_curso' => 'Number',
      'matricula_prof'       => 'ForeignKey',
      'id_versao_curso'      => 'ForeignKey',
      'created_at'           => 'Date',
      'updated_at'           => 'Date',
      'created_by'           => 'Text',
      'updated_by'           => 'Text',
    );
  }
}
