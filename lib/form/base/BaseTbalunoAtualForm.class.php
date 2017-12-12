<?php

/**
 * TbalunoAtual form base class.
 *
 * @method TbalunoAtual getObject() Returns the current form's model object
 *
 * @package    derca
 * @subpackage form
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbalunoAtualForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'nome'               => new sfWidgetFormInputText(),
      'matricula'          => new sfWidgetFormInputHidden(),
      'dt_nascimento'      => new sfWidgetFormDate(),
      'naturalidade'       => new sfWidgetFormInputText(),
      'uf_nascimento'      => new sfWidgetFormInputText(),
      'nacionalidade'      => new sfWidgetFormInputText(),
      'sexo'               => new sfWidgetFormInputText(),
      'estado_civil'       => new sfWidgetFormInputText(),
      'pai'                => new sfWidgetFormInputText(),
      'mae'                => new sfWidgetFormInputText(),
      'celular'            => new sfWidgetFormInputText(),
      'fone_residencial'   => new sfWidgetFormInputText(),
      'email1'             => new sfWidgetFormInputText(),
      'email2'             => new sfWidgetFormInputText(),
      'end_residencial'    => new sfWidgetFormInputText(),
      'bairro_residencial' => new sfWidgetFormInputText(),
      'cep_residencial'    => new sfWidgetFormInputText(),
      'numero'             => new sfWidgetFormInputText(),
      'complemento'        => new sfWidgetFormInputText(),
      'grau_2'             => new sfWidgetFormInputText(),
      'uf_conc_2'          => new sfWidgetFormInputText(),
      'ano_concl_2grau'    => new sfWidgetFormInputText(),
      'local_trabalho'     => new sfWidgetFormInputText(),
      'end_trabalho'       => new sfWidgetFormInputText(),
      'bairro_trabalho'    => new sfWidgetFormInputText(),
      'cep_trabalho'       => new sfWidgetFormInputText(),
      'fone_trabalho'      => new sfWidgetFormInputText(),
      'ramal_trabalho'     => new sfWidgetFormInputText(),
      'created_at'         => new sfWidgetFormDate(),
      'updated_at'         => new sfWidgetFormDate(),
      'created_by'         => new sfWidgetFormInputText(),
      'updated_by'         => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'nome'               => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'matricula'          => new sfValidatorPropelChoice(array('model' => 'TbalunoAtual', 'column' => 'matricula', 'required' => false)),
      'dt_nascimento'      => new sfValidatorDate(),
      'naturalidade'       => new sfValidatorString(array('max_length' => 40)),
      'uf_nascimento'      => new sfValidatorString(array('max_length' => 2)),
      'nacionalidade'      => new sfValidatorString(array('max_length' => 15)),
      'sexo'               => new sfValidatorString(array('max_length' => 1)),
      'estado_civil'       => new sfValidatorString(array('max_length' => 15)),
      'pai'                => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'mae'                => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'celular'            => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'fone_residencial'   => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'email1'             => new sfValidatorString(array('max_length' => 60, 'required' => false)),
      'email2'             => new sfValidatorString(array('max_length' => 60, 'required' => false)),
      'end_residencial'    => new sfValidatorString(array('max_length' => 60)),
      'bairro_residencial' => new sfValidatorString(array('max_length' => 40)),
      'cep_residencial'    => new sfValidatorString(array('max_length' => 8)),
      'numero'             => new sfValidatorString(array('max_length' => 8)),
      'complemento'        => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'grau_2'             => new sfValidatorString(array('max_length' => 100)),
      'uf_conc_2'          => new sfValidatorString(array('max_length' => 2)),
      'ano_concl_2grau'    => new sfValidatorString(array('max_length' => 4)),
      'local_trabalho'     => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'end_trabalho'       => new sfValidatorString(array('max_length' => 60, 'required' => false)),
      'bairro_trabalho'    => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'cep_trabalho'       => new sfValidatorString(array('max_length' => 8, 'required' => false)),
      'fone_trabalho'      => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'ramal_trabalho'     => new sfValidatorString(array('max_length' => 5, 'required' => false)),
      'created_at'         => new sfValidatorDate(array('required' => false)),
      'updated_at'         => new sfValidatorDate(array('required' => false)),
      'created_by'         => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'updated_by'         => new sfValidatorString(array('max_length' => 20, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tbaluno_atual[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TbalunoAtual';
  }


}
