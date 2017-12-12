<?php

/**
 * Tbcursoversao form base class.
 *
 * @method Tbcursoversao getObject() Returns the current form's model object
 *
 * @package    derca
 * @subpackage form
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbcursoversaoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_versao_curso'         => new sfWidgetFormInputHidden(),
      'id_formacao'             => new sfWidgetFormPropelChoice(array('model' => 'Tbformacao', 'add_empty' => true)),
      'cod_curso'               => new sfWidgetFormPropelChoice(array('model' => 'Tbcurso', 'add_empty' => false)),
      'id_turno'                => new sfWidgetFormPropelChoice(array('model' => 'Tbturno', 'add_empty' => false)),
      'descricao'               => new sfWidgetFormInputText(),
      'situacao'                => new sfWidgetFormInputText(),
      'doc_criacao'             => new sfWidgetFormTextarea(),
      'dt_criacao'              => new sfWidgetFormDate(),
      'dt_inicio'               => new sfWidgetFormDate(),
      'dt_termino'              => new sfWidgetFormDate(),
      'id_campus'               => new sfWidgetFormPropelChoice(array('model' => 'Tbcampus', 'add_empty' => true)),
      'id_setor'                => new sfWidgetFormPropelChoice(array('model' => 'Tbsetor', 'add_empty' => true)),
      'prazo_min'               => new sfWidgetFormInputText(),
      'prazo_max'               => new sfWidgetFormInputText(),
      'cred_obr'                => new sfWidgetFormInputText(),
      'cred_eletivo'            => new sfWidgetFormInputText(),
      'cred_total'              => new sfWidgetFormInputText(),
      'ch_obr'                  => new sfWidgetFormInputText(),
      'ch_eletiva'              => new sfWidgetFormInputText(),
      'ch_total'                => new sfWidgetFormInputText(),
      'semestre_inicio'         => new sfWidgetFormInputText(),
      'cod_integracao'          => new sfWidgetFormInputText(),
      'cod_integracao_tipo'     => new sfWidgetFormInputText(),
      'created_at'              => new sfWidgetFormDate(),
      'updated_at'              => new sfWidgetFormDate(),
      'created_by'              => new sfWidgetFormInputText(),
      'updated_by'              => new sfWidgetFormInputText(),
      'tbcoordenadorcurso_list' => new sfWidgetFormPropelChoice(array('multiple' => true, 'model' => 'Tbprofessor')),
    ));

    $this->setValidators(array(
      'id_versao_curso'         => new sfValidatorPropelChoice(array('model' => 'Tbcursoversao', 'column' => 'id_versao_curso', 'required' => false)),
      'id_formacao'             => new sfValidatorPropelChoice(array('model' => 'Tbformacao', 'column' => 'id_formacao', 'required' => false)),
      'cod_curso'               => new sfValidatorPropelChoice(array('model' => 'Tbcurso', 'column' => 'cod_curso')),
      'id_turno'                => new sfValidatorPropelChoice(array('model' => 'Tbturno', 'column' => 'id_turno')),
      'descricao'               => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'situacao'                => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'doc_criacao'             => new sfValidatorString(array('required' => false)),
      'dt_criacao'              => new sfValidatorDate(array('required' => false)),
      'dt_inicio'               => new sfValidatorDate(),
      'dt_termino'              => new sfValidatorDate(array('required' => false)),
      'id_campus'               => new sfValidatorPropelChoice(array('model' => 'Tbcampus', 'column' => 'id_campus', 'required' => false)),
      'id_setor'                => new sfValidatorPropelChoice(array('model' => 'Tbsetor', 'column' => 'id_setor', 'required' => false)),
      'prazo_min'               => new sfValidatorString(array('max_length' => 3, 'required' => false)),
      'prazo_max'               => new sfValidatorString(array('max_length' => 3, 'required' => false)),
      'cred_obr'                => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'cred_eletivo'            => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'cred_total'              => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'ch_obr'                  => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'ch_eletiva'              => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'ch_total'                => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'semestre_inicio'         => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'cod_integracao'          => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'cod_integracao_tipo'     => new sfValidatorString(array('max_length' => 1, 'required' => false)),
      'created_at'              => new sfValidatorDate(array('required' => false)),
      'updated_at'              => new sfValidatorDate(array('required' => false)),
      'created_by'              => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'updated_by'              => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'tbcoordenadorcurso_list' => new sfValidatorPropelChoice(array('multiple' => true, 'model' => 'Tbprofessor', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tbcursoversao[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tbcursoversao';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['tbcoordenadorcurso_list']))
    {
      $values = array();
      foreach ($this->object->getTbcoordenadorcursos() as $obj)
      {
        $values[] = $obj->getMatriculaProf();
      }

      $this->setDefault('tbcoordenadorcurso_list', $values);
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveTbcoordenadorcursoList($con);
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
    $c->add(TbcoordenadorcursoPeer::ID_VERSAO_CURSO, $this->object->getPrimaryKey());
    TbcoordenadorcursoPeer::doDelete($c, $con);

    $values = $this->getValue('tbcoordenadorcurso_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new Tbcoordenadorcurso();
        $obj->setIdVersaoCurso($this->object->getPrimaryKey());
        $obj->setMatriculaProf($value);
        $obj->save();
      }
    }
  }

}
