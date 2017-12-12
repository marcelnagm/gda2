<?php

/**
 * Tbofertacoordenador form base class.
 *
 * @method Tbofertacoordenador getObject() Returns the current form's model object
 *
 * @package    derca
 * @subpackage form
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbofertacoordenadorForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_oferta_coordenador' => new sfWidgetFormInputHidden(),
      'matricula_prof'        => new sfWidgetFormPropelChoice(array('model' => 'Tbprofessor', 'add_empty' => false)),
      'id_oferta'             => new sfWidgetFormPropelChoice(array('model' => 'Tboferta', 'add_empty' => false)),
      'created_at'            => new sfWidgetFormDate(),
      'updated_at'            => new sfWidgetFormDate(),
      'created_by'            => new sfWidgetFormInputText(),
      'updated_by'            => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_oferta_coordenador' => new sfValidatorPropelChoice(array('model' => 'Tbofertacoordenador', 'column' => 'id_oferta_coordenador', 'required' => false)),
      'matricula_prof'        => new sfValidatorPropelChoice(array('model' => 'Tbprofessor', 'column' => 'matricula_prof')),
      'id_oferta'             => new sfValidatorPropelChoice(array('model' => 'Tboferta', 'column' => 'id_oferta')),
      'created_at'            => new sfValidatorDate(array('required' => false)),
      'updated_at'            => new sfValidatorDate(array('required' => false)),
      'created_by'            => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'updated_by'            => new sfValidatorString(array('max_length' => 20, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tbofertacoordenador[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tbofertacoordenador';
  }


}
