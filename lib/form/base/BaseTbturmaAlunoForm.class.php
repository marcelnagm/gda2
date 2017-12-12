<?php

/**
 * TbturmaAluno form base class.
 *
 * @method TbturmaAluno getObject() Returns the current form's model object
 *
 * @package    derca
 * @subpackage form
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbturmaAlunoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_aluno'          => new sfWidgetFormInputHidden(),
      'id_turma'          => new sfWidgetFormPropelChoice(array('model' => 'Tbturma', 'add_empty' => false)),
      'matricula'         => new sfWidgetFormPropelChoice(array('model' => 'Tbaluno', 'add_empty' => true)),
      'faltas'            => new sfWidgetFormInputText(),
      'media_parcial'     => new sfWidgetFormInputText(),
      'exame_recuperacao' => new sfWidgetFormInputText(),
      'media_final'       => new sfWidgetFormInputText(),
      'id_conceito'       => new sfWidgetFormPropelChoice(array('model' => 'Tbconceito', 'add_empty' => true)),
      'created_at'        => new sfWidgetFormDate(),
      'updated_at'        => new sfWidgetFormDate(),
      'created_by'        => new sfWidgetFormInputText(),
      'updated_by'        => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_aluno'          => new sfValidatorPropelChoice(array('model' => 'TbturmaAluno', 'column' => 'id_aluno', 'required' => false)),
      'id_turma'          => new sfValidatorPropelChoice(array('model' => 'Tbturma', 'column' => 'id_turma')),
      'matricula'         => new sfValidatorPropelChoice(array('model' => 'Tbaluno', 'column' => 'matricula', 'required' => false)),
      'faltas'            => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'media_parcial'     => new sfValidatorNumber(array('required' => false)),
      'exame_recuperacao' => new sfValidatorNumber(array('required' => false)),
      'media_final'       => new sfValidatorNumber(array('required' => false)),
      'id_conceito'       => new sfValidatorPropelChoice(array('model' => 'Tbconceito', 'column' => 'id_conceito', 'required' => false)),
      'created_at'        => new sfValidatorDate(array('required' => false)),
      'updated_at'        => new sfValidatorDate(array('required' => false)),
      'created_by'        => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'updated_by'        => new sfValidatorString(array('max_length' => 20, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'TbturmaAluno', 'column' => array('id_turma', 'matricula')))
    );

    $this->widgetSchema->setNameFormat('tbturma_aluno[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TbturmaAluno';
  }


}
