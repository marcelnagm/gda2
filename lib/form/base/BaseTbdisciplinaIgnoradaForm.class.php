<?php

/**
 * TbdisciplinaIgnorada form base class.
 *
 * @method TbdisciplinaIgnorada getObject() Returns the current form's model object
 *
 * @package    derca
 * @subpackage form
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbdisciplinaIgnoradaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_disciplina_ignorada' => new sfWidgetFormInputHidden(),
      'cod_disciplina'         => new sfWidgetFormPropelChoice(array('model' => 'Tbdisciplina', 'add_empty' => false)),
      'created_at'             => new sfWidgetFormDate(),
      'updated_at'             => new sfWidgetFormDate(),
      'created_by'             => new sfWidgetFormInputText(),
      'updated_by'             => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_disciplina_ignorada' => new sfValidatorPropelChoice(array('model' => 'TbdisciplinaIgnorada', 'column' => 'id_disciplina_ignorada', 'required' => false)),
      'cod_disciplina'         => new sfValidatorPropelChoice(array('model' => 'Tbdisciplina', 'column' => 'cod_disciplina')),
      'created_at'             => new sfValidatorDate(array('required' => false)),
      'updated_at'             => new sfValidatorDate(array('required' => false)),
      'created_by'             => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'updated_by'             => new sfValidatorString(array('max_length' => 20, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'TbdisciplinaIgnorada', 'column' => array('id_disciplina_ignorada', 'cod_disciplina')))
    );

    $this->widgetSchema->setNameFormat('tbdisciplina_ignorada[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TbdisciplinaIgnorada';
  }


}
