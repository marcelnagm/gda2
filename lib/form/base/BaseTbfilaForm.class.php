<?php

/**
 * Tbfila form base class.
 *
 * @method Tbfila getObject() Returns the current form's model object
 *
 * @package    derca
 * @subpackage form
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbfilaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_fila'     => new sfWidgetFormInputHidden(),
      'matricula'   => new sfWidgetFormPropelChoice(array('model' => 'Tbaluno', 'add_empty' => false)),
      'id_oferta'   => new sfWidgetFormPropelChoice(array('model' => 'Tboferta', 'add_empty' => false)),
      'id_situacao' => new sfWidgetFormPropelChoice(array('model' => 'Tbfilasituacao', 'add_empty' => false)),
      'pontos'      => new sfWidgetFormInputText(),
      'reprovacoes' => new sfWidgetFormInputText(),
      'formando'    => new sfWidgetFormInputText(),
      'created_at'  => new sfWidgetFormDate(),
      'updated_at'  => new sfWidgetFormDate(),
      'created_by'  => new sfWidgetFormInputText(),
      'updated_by'  => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_fila'     => new sfValidatorPropelChoice(array('model' => 'Tbfila', 'column' => 'id_fila', 'required' => false)),
      'matricula'   => new sfValidatorPropelChoice(array('model' => 'Tbaluno', 'column' => 'matricula')),
      'id_oferta'   => new sfValidatorPropelChoice(array('model' => 'Tboferta', 'column' => 'id_oferta')),
      'id_situacao' => new sfValidatorPropelChoice(array('model' => 'Tbfilasituacao', 'column' => 'id_situacao')),
      'pontos'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'reprovacoes' => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'formando'    => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'created_at'  => new sfValidatorDate(array('required' => false)),
      'updated_at'  => new sfValidatorDate(array('required' => false)),
      'created_by'  => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'updated_by'  => new sfValidatorString(array('max_length' => 20, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tbfila[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tbfila';
  }


}
