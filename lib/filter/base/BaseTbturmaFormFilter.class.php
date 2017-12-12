<?php

/**
 * Tbturma filter form base class.
 *
 * @package    derca
 * @subpackage filter
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbturmaFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_periodo'             => new sfWidgetFormPropelChoice(array('model' => 'Tbperiodo', 'add_empty' => true)),
      'cod_disciplina'         => new sfWidgetFormPropelChoice(array('model' => 'Tbdisciplina', 'add_empty' => true)),
      'turma'                  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'n_notas'                => new sfWidgetFormFilterInput(),
      'observacao'             => new sfWidgetFormFilterInput(),
      'notas_no_historico'     => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'id_oferta'              => new sfWidgetFormPropelChoice(array('model' => 'Tboferta', 'add_empty' => true)),
      'created_at'             => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'             => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'created_by'             => new sfWidgetFormFilterInput(),
      'updated_by'             => new sfWidgetFormFilterInput(),
      'tbturma_professor_list' => new sfWidgetFormPropelChoice(array('model' => 'Tbprofessor', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id_periodo'             => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tbperiodo', 'column' => 'id_periodo')),
      'cod_disciplina'         => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tbdisciplina', 'column' => 'cod_disciplina')),
      'turma'                  => new sfValidatorPass(array('required' => false)),
      'n_notas'                => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'observacao'             => new sfValidatorPass(array('required' => false)),
      'notas_no_historico'     => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'id_oferta'              => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tboferta', 'column' => 'id_oferta')),
      'created_at'             => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'             => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'created_by'             => new sfValidatorPass(array('required' => false)),
      'updated_by'             => new sfValidatorPass(array('required' => false)),
      'tbturma_professor_list' => new sfValidatorPropelChoice(array('model' => 'Tbprofessor', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tbturma_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function addTbturmaProfessorListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(TbturmaProfessorPeer::ID_TURMA, TbturmaPeer::ID_TURMA);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(TbturmaProfessorPeer::MATRICULA_PROF, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(TbturmaProfessorPeer::MATRICULA_PROF, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'Tbturma';
  }

  public function getFields()
  {
    return array(
      'id_turma'               => 'Number',
      'id_periodo'             => 'ForeignKey',
      'cod_disciplina'         => 'ForeignKey',
      'turma'                  => 'Text',
      'n_notas'                => 'Number',
      'observacao'             => 'Text',
      'notas_no_historico'     => 'Boolean',
      'id_oferta'              => 'ForeignKey',
      'created_at'             => 'Date',
      'updated_at'             => 'Date',
      'created_by'             => 'Text',
      'updated_by'             => 'Text',
      'tbturma_professor_list' => 'ManyKey',
    );
  }
}
