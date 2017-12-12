<?php

/**
 * Tboferta form base class.
 *
 * @method Tboferta getObject() Returns the current form's model object
 *
 * @package    derca
 * @subpackage form
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbofertaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_oferta'          => new sfWidgetFormInputHidden(),
      'id_periodo'         => new sfWidgetFormPropelChoice(array('model' => 'Tbperiodo', 'add_empty' => false)),
      'id_turno'           => new sfWidgetFormPropelChoice(array('model' => 'Tbturno', 'add_empty' => false)),
      'cod_curso'          => new sfWidgetFormPropelChoice(array('model' => 'Tbcurso', 'add_empty' => false)),
      'cod_curso_destino'  => new sfWidgetFormPropelChoice(array('model' => 'Tbcurso', 'add_empty' => true)),
      'cod_disciplina'     => new sfWidgetFormPropelChoice(array('model' => 'Tbdisciplina', 'add_empty' => false)),
      'turma'              => new sfWidgetFormInputText(),
      'id_sala'            => new sfWidgetFormPropelChoice(array('model' => 'Tbsala', 'add_empty' => false)),
      'vagas'              => new sfWidgetFormInputText(),
      'matriculados'       => new sfWidgetFormInputText(),
      'excesso'            => new sfWidgetFormInputText(),
      'cancelados'         => new sfWidgetFormInputText(),
      'trancados'          => new sfWidgetFormInputText(),
      'id_matricula_prof'  => new sfWidgetFormPropelChoice(array('model' => 'Tbprofessor', 'add_empty' => false)),
      'id_matricula_prof2' => new sfWidgetFormPropelChoice(array('model' => 'Tbprofessor', 'add_empty' => true)),
      'id_setor'           => new sfWidgetFormPropelChoice(array('model' => 'Tbsetor', 'add_empty' => false)),
      'dt_inicio'          => new sfWidgetFormDate(),
      'dt_fim'             => new sfWidgetFormDate(),
      'id_situacao'        => new sfWidgetFormPropelChoice(array('model' => 'Tbofertasituacao', 'add_empty' => false)),
      'id_polo'            => new sfWidgetFormPropelChoice(array('model' => 'Tbpolos', 'add_empty' => false)),
      'created_at'         => new sfWidgetFormDate(),
      'updated_at'         => new sfWidgetFormDate(),
      'created_by'         => new sfWidgetFormInputText(),
      'updated_by'         => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_oferta'          => new sfValidatorPropelChoice(array('model' => 'Tboferta', 'column' => 'id_oferta', 'required' => false)),
      'id_periodo'         => new sfValidatorPropelChoice(array('model' => 'Tbperiodo', 'column' => 'id_periodo')),
      'id_turno'           => new sfValidatorPropelChoice(array('model' => 'Tbturno', 'column' => 'id_turno')),
      'cod_curso'          => new sfValidatorPropelChoice(array('model' => 'Tbcurso', 'column' => 'cod_curso')),
      'cod_curso_destino'  => new sfValidatorPropelChoice(array('model' => 'Tbcurso', 'column' => 'cod_curso', 'required' => false)),
      'cod_disciplina'     => new sfValidatorPropelChoice(array('model' => 'Tbdisciplina', 'column' => 'cod_disciplina')),
      'turma'              => new sfValidatorString(array('max_length' => 5)),
      'id_sala'            => new sfValidatorPropelChoice(array('model' => 'Tbsala', 'column' => 'id_sala')),
      'vagas'              => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'matriculados'       => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'excesso'            => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'cancelados'         => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'trancados'          => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'id_matricula_prof'  => new sfValidatorPropelChoice(array('model' => 'Tbprofessor', 'column' => 'matricula_prof')),
      'id_matricula_prof2' => new sfValidatorPropelChoice(array('model' => 'Tbprofessor', 'column' => 'matricula_prof', 'required' => false)),
      'id_setor'           => new sfValidatorPropelChoice(array('model' => 'Tbsetor', 'column' => 'id_setor')),
      'dt_inicio'          => new sfValidatorDate(array('required' => false)),
      'dt_fim'             => new sfValidatorDate(array('required' => false)),
      'id_situacao'        => new sfValidatorPropelChoice(array('model' => 'Tbofertasituacao', 'column' => 'id_situacao')),
      'id_polo'            => new sfValidatorPropelChoice(array('model' => 'Tbpolos', 'column' => 'id_polo')),
      'created_at'         => new sfValidatorDate(array('required' => false)),
      'updated_at'         => new sfValidatorDate(array('required' => false)),
      'created_by'         => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'updated_by'         => new sfValidatorString(array('max_length' => 20, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'Tboferta', 'column' => array('id_periodo', 'cod_disciplina', 'turma')))
    );

    $this->widgetSchema->setNameFormat('tboferta[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tboferta';
  }


}
