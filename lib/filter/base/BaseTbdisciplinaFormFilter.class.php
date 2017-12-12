<?php

/**
 * Tbdisciplina filter form base class.
 *
 * @package    derca
 * @subpackage filter
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbdisciplinaFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'descricao'                => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'sucinto'                  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'inicio'                   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'termino'                  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'ch'                       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'ch_teorica'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'ch_pratica'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'cred_pratico'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'cred_teorico'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'id_situacao'              => new sfWidgetFormPropelChoice(array('model' => 'Tbdisciplinasituacao', 'add_empty' => true)),
      'created_at'               => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'               => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'created_by'               => new sfWidgetFormFilterInput(),
      'updated_by'               => new sfWidgetFormFilterInput(),
      'tbgrade_equivalente_list' => new sfWidgetFormPropelChoice(array('model' => 'Tbcurriculodisciplinas', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'descricao'                => new sfValidatorPass(array('required' => false)),
      'sucinto'                  => new sfValidatorPass(array('required' => false)),
      'inicio'                   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'termino'                  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'ch'                       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'ch_teorica'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'ch_pratica'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'cred_pratico'             => new sfValidatorPass(array('required' => false)),
      'cred_teorico'             => new sfValidatorPass(array('required' => false)),
      'id_situacao'              => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tbdisciplinasituacao', 'column' => 'id_situacao')),
      'created_at'               => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'               => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'created_by'               => new sfValidatorPass(array('required' => false)),
      'updated_by'               => new sfValidatorPass(array('required' => false)),
      'tbgrade_equivalente_list' => new sfValidatorPropelChoice(array('model' => 'Tbcurriculodisciplinas', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tbdisciplina_filters[%s]');

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

    $criteria->addJoin(TbgradeEquivalentePeer::COD_DISCIPLINA, TbdisciplinaPeer::COD_DISCIPLINA);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(TbgradeEquivalentePeer::ID_CURRICULO_DISCIPLINA, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(TbgradeEquivalentePeer::ID_CURRICULO_DISCIPLINA, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'Tbdisciplina';
  }

  public function getFields()
  {
    return array(
      'cod_disciplina'           => 'Text',
      'descricao'                => 'Text',
      'sucinto'                  => 'Text',
      'inicio'                   => 'Date',
      'termino'                  => 'Date',
      'ch'                       => 'Number',
      'ch_teorica'               => 'Number',
      'ch_pratica'               => 'Number',
      'cred_pratico'             => 'Text',
      'cred_teorico'             => 'Text',
      'id_situacao'              => 'ForeignKey',
      'created_at'               => 'Date',
      'updated_at'               => 'Date',
      'created_by'               => 'Text',
      'updated_by'               => 'Text',
      'tbgrade_equivalente_list' => 'ManyKey',
    );
  }
}
