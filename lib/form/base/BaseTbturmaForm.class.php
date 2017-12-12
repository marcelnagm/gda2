<?php

/**
 * Tbturma form base class.
 *
 * @method Tbturma getObject() Returns the current form's model object
 *
 * @package    derca
 * @subpackage form
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbturmaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_turma'               => new sfWidgetFormInputHidden(),
      'id_periodo'             => new sfWidgetFormPropelChoice(array('model' => 'Tbperiodo', 'add_empty' => false)),
      'cod_disciplina'         => new sfWidgetFormPropelChoice(array('model' => 'Tbdisciplina', 'add_empty' => false)),
      'turma'                  => new sfWidgetFormInputText(),
      'n_notas'                => new sfWidgetFormInputText(),
      'observacao'             => new sfWidgetFormInputText(),
      'notas_no_historico'     => new sfWidgetFormInputCheckbox(),
      'id_oferta'              => new sfWidgetFormPropelChoice(array('model' => 'Tboferta', 'add_empty' => true)),
      'created_at'             => new sfWidgetFormDate(),
      'updated_at'             => new sfWidgetFormDate(),
      'created_by'             => new sfWidgetFormInputText(),
      'updated_by'             => new sfWidgetFormInputText(),
      'tbturma_professor_list' => new sfWidgetFormPropelChoice(array('multiple' => true, 'model' => 'Tbprofessor')),
    ));

    $this->setValidators(array(
      'id_turma'               => new sfValidatorPropelChoice(array('model' => 'Tbturma', 'column' => 'id_turma', 'required' => false)),
      'id_periodo'             => new sfValidatorPropelChoice(array('model' => 'Tbperiodo', 'column' => 'id_periodo')),
      'cod_disciplina'         => new sfValidatorPropelChoice(array('model' => 'Tbdisciplina', 'column' => 'cod_disciplina')),
      'turma'                  => new sfValidatorString(array('max_length' => 255)),
      'n_notas'                => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'observacao'             => new sfValidatorString(array('max_length' => 150, 'required' => false)),
      'notas_no_historico'     => new sfValidatorBoolean(array('required' => false)),
      'id_oferta'              => new sfValidatorPropelChoice(array('model' => 'Tboferta', 'column' => 'id_oferta', 'required' => false)),
      'created_at'             => new sfValidatorDate(array('required' => false)),
      'updated_at'             => new sfValidatorDate(array('required' => false)),
      'created_by'             => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'updated_by'             => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'tbturma_professor_list' => new sfValidatorPropelChoice(array('multiple' => true, 'model' => 'Tbprofessor', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tbturma[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tbturma';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['tbturma_professor_list']))
    {
      $values = array();
      foreach ($this->object->getTbturmaProfessors() as $obj)
      {
        $values[] = $obj->getMatriculaProf();
      }

      $this->setDefault('tbturma_professor_list', $values);
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveTbturmaProfessorList($con);
  }

  public function saveTbturmaProfessorList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['tbturma_professor_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(TbturmaProfessorPeer::ID_TURMA, $this->object->getPrimaryKey());
    TbturmaProfessorPeer::doDelete($c, $con);

    $values = $this->getValue('tbturma_professor_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new TbturmaProfessor();
        $obj->setIdTurma($this->object->getPrimaryKey());
        $obj->setMatriculaProf($value);
        $obj->save();
      }
    }
  }

}
