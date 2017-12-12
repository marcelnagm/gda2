<?php

/**
 * Tbdisciplinarequisitos form base class.
 *
 * @method Tbdisciplinarequisitos getObject() Returns the current form's model object
 *
 * @package    derca
 * @subpackage form
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbdisciplinarequisitosForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_requisito'       => new sfWidgetFormInputHidden(),
      'cod_disciplina'     => new sfWidgetFormPropelChoice(array('model' => 'Tbdisciplina', 'add_empty' => false)),
      'id_versao_curso'    => new sfWidgetFormPropelChoice(array('model' => 'Tbcursoversao', 'add_empty' => false)),
      'cod_disc_requisito' => new sfWidgetFormPropelChoice(array('model' => 'Tbdisciplina', 'add_empty' => true)),
      'created_at'         => new sfWidgetFormDate(),
      'updated_at'         => new sfWidgetFormDate(),
      'created_by'         => new sfWidgetFormInputText(),
      'updated_by'         => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_requisito'       => new sfValidatorPropelChoice(array('model' => 'Tbdisciplinarequisitos', 'column' => 'id_requisito', 'required' => false)),
      'cod_disciplina'     => new sfValidatorPropelChoice(array('model' => 'Tbdisciplina', 'column' => 'cod_disciplina')),
      'id_versao_curso'    => new sfValidatorPropelChoice(array('model' => 'Tbcursoversao', 'column' => 'id_versao_curso')),
      'cod_disc_requisito' => new sfValidatorPropelChoice(array('model' => 'Tbdisciplina', 'column' => 'cod_disciplina', 'required' => false)),
      'created_at'         => new sfValidatorDate(array('required' => false)),
      'updated_at'         => new sfValidatorDate(array('required' => false)),
      'created_by'         => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'updated_by'         => new sfValidatorString(array('max_length' => 20, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'Tbdisciplinarequisitos', 'column' => array('cod_disciplina', 'id_versao_curso', 'cod_disc_requisito')))
    );

    $this->widgetSchema->setNameFormat('tbdisciplinarequisitos[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tbdisciplinarequisitos';
  }


}
