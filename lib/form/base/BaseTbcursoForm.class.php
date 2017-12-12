<?php

/**
 * Tbcurso form base class.
 *
 * @method Tbcurso getObject() Returns the current form's model object
 *
 * @package    derca
 * @subpackage form
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbcursoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'cod_curso'  => new sfWidgetFormInputHidden(),
      'descricao'  => new sfWidgetFormInputText(),
      'sucinto'    => new sfWidgetFormInputText(),
      'centro'     => new sfWidgetFormInputText(),
      'id_nivel'   => new sfWidgetFormPropelChoice(array('model' => 'Tbcursonivel', 'add_empty' => false)),
      'created_at' => new sfWidgetFormDate(),
      'updated_at' => new sfWidgetFormDate(),
      'created_by' => new sfWidgetFormInputText(),
      'updated_by' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'cod_curso'  => new sfValidatorPropelChoice(array('model' => 'Tbcurso', 'column' => 'cod_curso', 'required' => false)),
      'descricao'  => new sfValidatorString(array('max_length' => 70, 'required' => false)),
      'sucinto'    => new sfValidatorString(array('max_length' => 25, 'required' => false)),
      'centro'     => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'id_nivel'   => new sfValidatorPropelChoice(array('model' => 'Tbcursonivel', 'column' => 'id_nivel')),
      'created_at' => new sfValidatorDate(array('required' => false)),
      'updated_at' => new sfValidatorDate(array('required' => false)),
      'created_by' => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'updated_by' => new sfValidatorString(array('max_length' => 20, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tbcurso[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tbcurso';
  }


}
