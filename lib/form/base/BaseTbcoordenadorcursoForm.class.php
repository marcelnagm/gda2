<?php

/**
 * Tbcoordenadorcurso form base class.
 *
 * @method Tbcoordenadorcurso getObject() Returns the current form's model object
 *
 * @package    derca
 * @subpackage form
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbcoordenadorcursoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_coordenador_curso' => new sfWidgetFormInputHidden(),
      'matricula_prof'       => new sfWidgetFormInputHidden(),
      'id_versao_curso'      => new sfWidgetFormInputHidden(),
      'created_at'           => new sfWidgetFormDate(),
      'updated_at'           => new sfWidgetFormDate(),
      'created_by'           => new sfWidgetFormInputText(),
      'updated_by'           => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_coordenador_curso' => new sfValidatorPropelChoice(array('model' => 'Tbcoordenadorcurso', 'column' => 'id_coordenador_curso', 'required' => false)),
      'matricula_prof'       => new sfValidatorPropelChoice(array('model' => 'Tbprofessor', 'column' => 'matricula_prof', 'required' => false)),
      'id_versao_curso'      => new sfValidatorPropelChoice(array('model' => 'Tbcursoversao', 'column' => 'id_versao_curso', 'required' => false)),
      'created_at'           => new sfValidatorDate(array('required' => false)),
      'updated_at'           => new sfValidatorDate(array('required' => false)),
      'created_by'           => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'updated_by'           => new sfValidatorString(array('max_length' => 20, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tbcoordenadorcurso[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tbcoordenadorcurso';
  }


}
