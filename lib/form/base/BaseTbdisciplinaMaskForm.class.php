<?php

/**
 * TbdisciplinaMask form base class.
 *
 * @method TbdisciplinaMask getObject() Returns the current form's model object
 *
 * @package    derca
 * @subpackage form
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbdisciplinaMaskForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_disciplina_mask'  => new sfWidgetFormInputHidden(),
      'cod_disciplina'      => new sfWidgetFormPropelChoice(array('model' => 'Tbdisciplina', 'add_empty' => false)),
      'cod_disciplina_mask' => new sfWidgetFormPropelChoice(array('model' => 'Tbdisciplina', 'add_empty' => false)),
      'created_at'          => new sfWidgetFormDate(),
      'updated_at'          => new sfWidgetFormDate(),
      'created_by'          => new sfWidgetFormInputText(),
      'updated_by'          => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_disciplina_mask'  => new sfValidatorPropelChoice(array('model' => 'TbdisciplinaMask', 'column' => 'id_disciplina_mask', 'required' => false)),
      'cod_disciplina'      => new sfValidatorPropelChoice(array('model' => 'Tbdisciplina', 'column' => 'cod_disciplina')),
      'cod_disciplina_mask' => new sfValidatorPropelChoice(array('model' => 'Tbdisciplina', 'column' => 'cod_disciplina')),
      'created_at'          => new sfValidatorDate(array('required' => false)),
      'updated_at'          => new sfValidatorDate(array('required' => false)),
      'created_by'          => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'updated_by'          => new sfValidatorString(array('max_length' => 20, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'TbdisciplinaMask', 'column' => array('id_disciplina_mask', 'cod_disciplina')))
    );

    $this->widgetSchema->setNameFormat('tbdisciplina_mask[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TbdisciplinaMask';
  }


}
