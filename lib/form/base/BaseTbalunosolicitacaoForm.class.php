<?php

/**
 * Tbalunosolicitacao form base class.
 *
 * @method Tbalunosolicitacao getObject() Returns the current form's model object
 *
 * @package    derca
 * @subpackage form
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbalunosolicitacaoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_solicitacao'   => new sfWidgetFormInputHidden(),
      'matricula'        => new sfWidgetFormPropelChoice(array('model' => 'Tbaluno', 'add_empty' => false)),
      'situacao'         => new sfWidgetFormInputText(),
      'tipo'             => new sfWidgetFormInputText(),
      'descricao'        => new sfWidgetFormTextarea(),
      'observacao'       => new sfWidgetFormTextarea(),
      'data_solicitacao' => new sfWidgetFormDate(),
      'data_encerrado'   => new sfWidgetFormDate(),
      'created_at'       => new sfWidgetFormDate(),
      'updated_at'       => new sfWidgetFormDate(),
      'created_by'       => new sfWidgetFormInputText(),
      'updated_by'       => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_solicitacao'   => new sfValidatorPropelChoice(array('model' => 'Tbalunosolicitacao', 'column' => 'id_solicitacao', 'required' => false)),
      'matricula'        => new sfValidatorPropelChoice(array('model' => 'Tbaluno', 'column' => 'matricula')),
      'situacao'         => new sfValidatorString(array('max_length' => 10)),
      'tipo'             => new sfValidatorString(array('max_length' => 30)),
      'descricao'        => new sfValidatorString(),
      'observacao'       => new sfValidatorString(array('required' => false)),
      'data_solicitacao' => new sfValidatorDate(),
      'data_encerrado'   => new sfValidatorDate(array('required' => false)),
      'created_at'       => new sfValidatorDate(array('required' => false)),
      'updated_at'       => new sfValidatorDate(array('required' => false)),
      'created_by'       => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'updated_by'       => new sfValidatorString(array('max_length' => 20, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tbalunosolicitacao[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tbalunosolicitacao';
  }


}
