<?php

/**
 * TbturmaNota form base class.
 *
 * @method TbturmaNota getObject() Returns the current form's model object
 *
 * @package    derca
 * @subpackage form
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbturmaNotaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_nota'    => new sfWidgetFormInputHidden(),
      'id_aluno'   => new sfWidgetFormPropelChoice(array('model' => 'TbturmaAluno', 'add_empty' => false)),
      'n_nota'     => new sfWidgetFormInputText(),
      'valor'      => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormDate(),
      'updated_at' => new sfWidgetFormDate(),
      'created_by' => new sfWidgetFormInputText(),
      'updated_by' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_nota'    => new sfValidatorPropelChoice(array('model' => 'TbturmaNota', 'column' => 'id_nota', 'required' => false)),
      'id_aluno'   => new sfValidatorPropelChoice(array('model' => 'TbturmaAluno', 'column' => 'id_aluno')),
      'n_nota'     => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'valor'      => new sfValidatorNumber(),
      'created_at' => new sfValidatorDate(array('required' => false)),
      'updated_at' => new sfValidatorDate(array('required' => false)),
      'created_by' => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'updated_by' => new sfValidatorString(array('max_length' => 20, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'TbturmaNota', 'column' => array('id_aluno', 'n_nota')))
    );

    $this->widgetSchema->setNameFormat('tbturma_nota[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TbturmaNota';
  }


}
