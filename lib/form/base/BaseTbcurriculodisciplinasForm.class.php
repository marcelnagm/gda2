<?php

/**
 * Tbcurriculodisciplinas form base class.
 *
 * @method Tbcurriculodisciplinas getObject() Returns the current form's model object
 *
 * @package    derca
 * @subpackage form
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbcurriculodisciplinasForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_curriculo_disciplina'  => new sfWidgetFormInputHidden(),
      'id_versao_curso'          => new sfWidgetFormPropelChoice(array('model' => 'Tbcursoversao', 'add_empty' => true)),
      'id_setor'                 => new sfWidgetFormPropelChoice(array('model' => 'Tbsetor', 'add_empty' => true)),
      'cod_disciplina'           => new sfWidgetFormPropelChoice(array('model' => 'Tbdisciplina', 'add_empty' => true)),
      'semestre_disciplina'      => new sfWidgetFormInputText(),
      'id_carater'               => new sfWidgetFormPropelChoice(array('model' => 'Tbcarater', 'add_empty' => true)),
      'created_at'               => new sfWidgetFormDate(),
      'updated_at'               => new sfWidgetFormDate(),
      'created_by'               => new sfWidgetFormInputText(),
      'updated_by'               => new sfWidgetFormInputText(),
      'tbgrade_equivalente_list' => new sfWidgetFormPropelChoice(array('multiple' => true, 'model' => 'Tbdisciplina')),
    ));

    $this->setValidators(array(
      'id_curriculo_disciplina'  => new sfValidatorPropelChoice(array('model' => 'Tbcurriculodisciplinas', 'column' => 'id_curriculo_disciplina', 'required' => false)),
      'id_versao_curso'          => new sfValidatorPropelChoice(array('model' => 'Tbcursoversao', 'column' => 'id_versao_curso', 'required' => false)),
      'id_setor'                 => new sfValidatorPropelChoice(array('model' => 'Tbsetor', 'column' => 'id_setor', 'required' => false)),
      'cod_disciplina'           => new sfValidatorPropelChoice(array('model' => 'Tbdisciplina', 'column' => 'cod_disciplina', 'required' => false)),
      'semestre_disciplina'      => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'id_carater'               => new sfValidatorPropelChoice(array('model' => 'Tbcarater', 'column' => 'id_carater', 'required' => false)),
      'created_at'               => new sfValidatorDate(array('required' => false)),
      'updated_at'               => new sfValidatorDate(array('required' => false)),
      'created_by'               => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'updated_by'               => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'tbgrade_equivalente_list' => new sfValidatorPropelChoice(array('multiple' => true, 'model' => 'Tbdisciplina', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tbcurriculodisciplinas[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tbcurriculodisciplinas';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['tbgrade_equivalente_list']))
    {
      $values = array();
      foreach ($this->object->getTbgradeEquivalentes() as $obj)
      {
        $values[] = $obj->getCodDisciplina();
      }

      $this->setDefault('tbgrade_equivalente_list', $values);
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveTbgradeEquivalenteList($con);
  }

  public function saveTbgradeEquivalenteList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['tbgrade_equivalente_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(TbgradeEquivalentePeer::ID_CURRICULO_DISCIPLINA, $this->object->getPrimaryKey());
    TbgradeEquivalentePeer::doDelete($c, $con);

    $values = $this->getValue('tbgrade_equivalente_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new TbgradeEquivalente();
        $obj->setIdCurriculoDisciplina($this->object->getPrimaryKey());
        $obj->setCodDisciplina($value);
        $obj->save();
      }
    }
  }

}
