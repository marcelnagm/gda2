<?php

/**
 * Tbprofessor form base class.
 *
 * @method Tbprofessor getObject() Returns the current form's model object
 *
 * @package    derca
 * @subpackage form
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbprofessorForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_pessoa'               => new sfWidgetFormInputText(),
      'matricula_prof'          => new sfWidgetFormInputHidden(),
      'cpf'                     => new sfWidgetFormInputText(),
      'siape'                   => new sfWidgetFormInputText(),
      'nome'                    => new sfWidgetFormInputText(),
      'celular'                 => new sfWidgetFormInputText(),
      'fone_residencial'        => new sfWidgetFormInputText(),
      'email'                   => new sfWidgetFormInputText(),
      'foto'                    => new sfWidgetFormInputText(),
      'id_neces_especial'       => new sfWidgetFormPropelChoice(array('model' => 'Tbnecesespecial', 'add_empty' => true)),
      'cod_curso'               => new sfWidgetFormPropelChoice(array('model' => 'Tbcurso', 'add_empty' => true)),
      'id_tipo_vinculo'         => new sfWidgetFormPropelChoice(array('model' => 'Tbproftipovinculo', 'add_empty' => true)),
      'id_formacao'             => new sfWidgetFormPropelChoice(array('model' => 'Tbformacao', 'add_empty' => true)),
      'id_prof_sit'             => new sfWidgetFormPropelChoice(array('model' => 'Tbprofessorsituacao', 'add_empty' => true)),
      'id_setor'                => new sfWidgetFormPropelChoice(array('model' => 'Tbsetor', 'add_empty' => true)),
      'coordenador'             => new sfWidgetFormInputCheckbox(),
      'created_at'              => new sfWidgetFormDate(),
      'updated_at'              => new sfWidgetFormDate(),
      'created_by'              => new sfWidgetFormInputText(),
      'updated_by'              => new sfWidgetFormInputText(),
      'tbturma_professor_list'  => new sfWidgetFormPropelChoice(array('multiple' => true, 'model' => 'Tbturma')),
      'tbcoordenadorcurso_list' => new sfWidgetFormPropelChoice(array('multiple' => true, 'model' => 'Tbcursoversao')),
    ));

    $this->setValidators(array(
      'id_pessoa'               => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'matricula_prof'          => new sfValidatorPropelChoice(array('model' => 'Tbprofessor', 'column' => 'matricula_prof', 'required' => false)),
      'cpf'                     => new sfValidatorString(array('max_length' => 11, 'required' => false)),
      'siape'                   => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'nome'                    => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'celular'                 => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'fone_residencial'        => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'email'                   => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'foto'                    => new sfValidatorPass(array('required' => false)),
      'id_neces_especial'       => new sfValidatorPropelChoice(array('model' => 'Tbnecesespecial', 'column' => 'id_neces_especial', 'required' => false)),
      'cod_curso'               => new sfValidatorPropelChoice(array('model' => 'Tbcurso', 'column' => 'cod_curso', 'required' => false)),
      'id_tipo_vinculo'         => new sfValidatorPropelChoice(array('model' => 'Tbproftipovinculo', 'column' => 'id_tipo_vinculo', 'required' => false)),
      'id_formacao'             => new sfValidatorPropelChoice(array('model' => 'Tbformacao', 'column' => 'id_formacao', 'required' => false)),
      'id_prof_sit'             => new sfValidatorPropelChoice(array('model' => 'Tbprofessorsituacao', 'column' => 'id_situacao', 'required' => false)),
      'id_setor'                => new sfValidatorPropelChoice(array('model' => 'Tbsetor', 'column' => 'id_setor', 'required' => false)),
      'coordenador'             => new sfValidatorBoolean(),
      'created_at'              => new sfValidatorDate(array('required' => false)),
      'updated_at'              => new sfValidatorDate(array('required' => false)),
      'created_by'              => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'updated_by'              => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'tbturma_professor_list'  => new sfValidatorPropelChoice(array('multiple' => true, 'model' => 'Tbturma', 'required' => false)),
      'tbcoordenadorcurso_list' => new sfValidatorPropelChoice(array('multiple' => true, 'model' => 'Tbcursoversao', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tbprofessor[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tbprofessor';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['tbturma_professor_list']))
    {
      $values = array();
      foreach ($this->object->getTbturmaProfessors() as $obj)
      {
        $values[] = $obj->getIdTurma();
      }

      $this->setDefault('tbturma_professor_list', $values);
    }

    if (isset($this->widgetSchema['tbcoordenadorcurso_list']))
    {
      $values = array();
      foreach ($this->object->getTbcoordenadorcursos() as $obj)
      {
        $values[] = $obj->getIdVersaoCurso();
      }

      $this->setDefault('tbcoordenadorcurso_list', $values);
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveTbturmaProfessorList($con);
    $this->saveTbcoordenadorcursoList($con);
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
    $c->add(TbturmaProfessorPeer::MATRICULA_PROF, $this->object->getPrimaryKey());
    TbturmaProfessorPeer::doDelete($c, $con);

    $values = $this->getValue('tbturma_professor_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new TbturmaProfessor();
        $obj->setMatriculaProf($this->object->getPrimaryKey());
        $obj->setIdTurma($value);
        $obj->save();
      }
    }
  }

  public function saveTbcoordenadorcursoList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['tbcoordenadorcurso_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(TbcoordenadorcursoPeer::MATRICULA_PROF, $this->object->getPrimaryKey());
    TbcoordenadorcursoPeer::doDelete($c, $con);

    $values = $this->getValue('tbcoordenadorcurso_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new Tbcoordenadorcurso();
        $obj->setMatriculaProf($this->object->getPrimaryKey());
        $obj->setIdVersaoCurso($value);
        $obj->save();
      }
    }
  }

}
