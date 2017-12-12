<?php

/**
 * TbmatriculaComprovante form base class.
 *
 * @method TbmatriculaComprovante getObject() Returns the current form's model object
 *
 * @package    derca
 * @subpackage form
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbmatriculaComprovanteForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_comprovante' => new sfWidgetFormInputHidden(),
      'matricula'      => new sfWidgetFormPropelChoice(array('model' => 'Tbalunomatricula', 'add_empty' => false)),
      'datahora'       => new sfWidgetFormDateTime(),
      'codigo'         => new sfWidgetFormInputText(),
      'situacao'       => new sfWidgetFormInputText(),
      'created_at'     => new sfWidgetFormDate(),
      'updated_at'     => new sfWidgetFormDate(),
      'created_by'     => new sfWidgetFormInputText(),
      'updated_by'     => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_comprovante' => new sfValidatorPropelChoice(array('model' => 'TbmatriculaComprovante', 'column' => 'id_comprovante', 'required' => false)),
      'matricula'      => new sfValidatorPropelChoice(array('model' => 'Tbalunomatricula', 'column' => 'matricula')),
      'datahora'       => new sfValidatorDateTime(array('required' => false)),
      'codigo'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'situacao'       => new sfValidatorString(array('max_length' => 255)),
      'created_at'     => new sfValidatorDate(array('required' => false)),
      'updated_at'     => new sfValidatorDate(array('required' => false)),
      'created_by'     => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'updated_by'     => new sfValidatorString(array('max_length' => 20, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tbmatricula_comprovante[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TbmatriculaComprovante';
  }


}
