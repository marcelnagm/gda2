<?php

/**
 * Tbperiodo form base class.
 *
 * @method Tbperiodo getObject() Returns the current form's model object
 *
 * @package    derca
 * @subpackage form
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbperiodoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_periodo'                 => new sfWidgetFormInputHidden(),
      'descricao'                  => new sfWidgetFormInputText(),
      'ano'                        => new sfWidgetFormInputText(),
      'semestre'                   => new sfWidgetFormInputText(),
      'periodo'                    => new sfWidgetFormInputText(),
      'dt_inicio'                  => new sfWidgetFormDate(),
      'dt_fim'                     => new sfWidgetFormDate(),
      'dt_fim_notas'               => new sfWidgetFormDate(),
      'dt_inicio_oferta'           => new sfWidgetFormDate(),
      'dt_fim_oferta'              => new sfWidgetFormDate(),
      'dt_inicio_fila'             => new sfWidgetFormDate(),
      'dt_fim_fila'                => new sfWidgetFormDate(),
      'dt_inicio_resultado'        => new sfWidgetFormDate(),
      'dt_fim_resultado'           => new sfWidgetFormDate(),
      'dt_inicio_oferta_cadastro'  => new sfWidgetFormDate(),
      'dt_fim_oferta_cadastro'     => new sfWidgetFormDate(),
      'dt_inicio_cadastro'         => new sfWidgetFormDate(),
      'dt_fim_cadastro'            => new sfWidgetFormDate(),
      'dt_inicio_ajuste'           => new sfWidgetFormDate(),
      'dt_fim_ajuste'              => new sfWidgetFormDate(),
      'dt_inicio_ajuste_fila'      => new sfWidgetFormDate(),
      'dt_fim_ajuste_fila'         => new sfWidgetFormDate(),
      'dt_inicio_ajuste_resultado' => new sfWidgetFormDate(),
      'dt_fim_ajuste_resultado'    => new sfWidgetFormDate(),
      'dt_inicio_trancamento'      => new sfWidgetFormDate(),
      'dt_fim_trancamento'         => new sfWidgetFormDate(),
      'sucinto'                    => new sfWidgetFormInputText(),
      'id_nivel'                   => new sfWidgetFormPropelChoice(array('model' => 'Tbcursonivel', 'add_empty' => false)),
      'created_at'                 => new sfWidgetFormDate(),
      'updated_at'                 => new sfWidgetFormDate(),
      'created_by'                 => new sfWidgetFormInputText(),
      'updated_by'                 => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_periodo'                 => new sfValidatorPropelChoice(array('model' => 'Tbperiodo', 'column' => 'id_periodo', 'required' => false)),
      'descricao'                  => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'ano'                        => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'semestre'                   => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'periodo'                    => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'dt_inicio'                  => new sfValidatorDate(array('required' => false)),
      'dt_fim'                     => new sfValidatorDate(array('required' => false)),
      'dt_fim_notas'               => new sfValidatorDate(array('required' => false)),
      'dt_inicio_oferta'           => new sfValidatorDate(array('required' => false)),
      'dt_fim_oferta'              => new sfValidatorDate(array('required' => false)),
      'dt_inicio_fila'             => new sfValidatorDate(array('required' => false)),
      'dt_fim_fila'                => new sfValidatorDate(array('required' => false)),
      'dt_inicio_resultado'        => new sfValidatorDate(array('required' => false)),
      'dt_fim_resultado'           => new sfValidatorDate(array('required' => false)),
      'dt_inicio_oferta_cadastro'  => new sfValidatorDate(array('required' => false)),
      'dt_fim_oferta_cadastro'     => new sfValidatorDate(array('required' => false)),
      'dt_inicio_cadastro'         => new sfValidatorDate(array('required' => false)),
      'dt_fim_cadastro'            => new sfValidatorDate(array('required' => false)),
      'dt_inicio_ajuste'           => new sfValidatorDate(array('required' => false)),
      'dt_fim_ajuste'              => new sfValidatorDate(array('required' => false)),
      'dt_inicio_ajuste_fila'      => new sfValidatorDate(array('required' => false)),
      'dt_fim_ajuste_fila'         => new sfValidatorDate(array('required' => false)),
      'dt_inicio_ajuste_resultado' => new sfValidatorDate(array('required' => false)),
      'dt_fim_ajuste_resultado'    => new sfValidatorDate(array('required' => false)),
      'dt_inicio_trancamento'      => new sfValidatorDate(array('required' => false)),
      'dt_fim_trancamento'         => new sfValidatorDate(array('required' => false)),
      'sucinto'                    => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'id_nivel'                   => new sfValidatorPropelChoice(array('model' => 'Tbcursonivel', 'column' => 'id_nivel')),
      'created_at'                 => new sfValidatorDate(array('required' => false)),
      'updated_at'                 => new sfValidatorDate(array('required' => false)),
      'created_by'                 => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'updated_by'                 => new sfValidatorString(array('max_length' => 20, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tbperiodo[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tbperiodo';
  }


}
