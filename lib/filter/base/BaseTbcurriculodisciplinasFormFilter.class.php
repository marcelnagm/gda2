<?php

/**
 * Tbcurriculodisciplinas filter form base class.
 *
 * @package    derca
 * @subpackage filter
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbcurriculodisciplinasFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_versao_curso'          => new sfWidgetFormPropelChoice(array('model' => 'Tbcursoversao', 'add_empty' => true)),
      'id_setor'                 => new sfWidgetFormPropelChoice(array('model' => 'Tbsetor', 'add_empty' => true)),
      'cod_disciplina'           => new sfWidgetFormPropelChoice(array('model' => 'Tbdisciplina', 'add_empty' => true)),
      'semestre_disciplina'      => new sfWidgetFormFilterInput(),
      'id_carater'               => new sfWidgetFormPropelChoice(array('model' => 'Tbcarater', 'add_empty' => true)),
      'created_at'               => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'               => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'created_by'               => new sfWidgetFormFilterInput(),
      'updated_by'               => new sfWidgetFormFilterInput(),
      'tbgrade_equivalente_list' => new sfWidgetFormPropelChoice(array('model' => 'Tbdisciplina', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id_versao_curso'          => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tbcursoversao', 'column' => 'id_versao_curso')),
      'id_setor'                 => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tbsetor', 'column' => 'id_setor')),
      'cod_disciplina'           => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tbdisciplina', 'column' => 'cod_disciplina')),
      'semestre_disciplina'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_carater'               => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tbcarater', 'column' => 'id_carater')),
      'created_at'               => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'               => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'created_by'               => new sfValidatorPass(array('required' => false)),
      'updated_by'               => new sfValidatorPass(array('required' => false)),
      'tbgrade_equivalente_list' => new sfValidatorPropelChoice(array('model' => 'Tbdisciplina', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tbcurriculodisciplinas_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function addTbgradeEquivalenteListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(TbgradeEquivalentePeer::ID_CURRICULO_DISCIPLINA, TbcurriculodisciplinasPeer::ID_CURRICULO_DISCIPLINA);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(TbgradeEquivalentePeer::COD_DISCIPLINA, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(TbgradeEquivalentePeer::COD_DISCIPLINA, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'Tbcurriculodisciplinas';
  }

  public function getFields()
  {
    return array(
      'id_curriculo_disciplina'  => 'Number',
      'id_versao_curso'          => 'ForeignKey',
      'id_setor'                 => 'ForeignKey',
      'cod_disciplina'           => 'ForeignKey',
      'semestre_disciplina'      => 'Number',
      'id_carater'               => 'ForeignKey',
      'created_at'               => 'Date',
      'updated_at'               => 'Date',
      'created_by'               => 'Text',
      'updated_by'               => 'Text',
      'tbgrade_equivalente_list' => 'ManyKey',
    );
  }
}
