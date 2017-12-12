<?php

/**
 * TbturmaProfessor form base class.
 *
 * @method TbturmaProfessor getObject() Returns the current form's model object
 *
 * @package    derca
 * @subpackage form
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbturmaProfessorForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_turma'       => new sfWidgetFormInputHidden(),
      'matricula_prof' => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'id_turma'       => new sfValidatorPropelChoice(array('model' => 'Tbturma', 'column' => 'id_turma', 'required' => false)),
      'matricula_prof' => new sfValidatorPropelChoice(array('model' => 'Tbprofessor', 'column' => 'matricula_prof', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tbturma_professor[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TbturmaProfessor';
  }


}
