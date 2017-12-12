<?php

/**
 * Tbdocs form base class.
 *
 * @method Tbdocs getObject() Returns the current form's model object
 *
 * @package    derca
 * @subpackage form
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbdocsForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_docs'         => new sfWidgetFormInputHidden(),
      'data_entrada'    => new sfWidgetFormDateTime(),
      'data_finalizado' => new sfWidgetFormDateTime(),
      'data_saida'      => new sfWidgetFormDateTime(),
      'nome_entrada'    => new sfWidgetFormInputText(),
      'nome_finalizado' => new sfWidgetFormInputText(),
      'nome_saida'      => new sfWidgetFormInputText(),
      'descricao'       => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_docs'         => new sfValidatorPropelChoice(array('model' => 'Tbdocs', 'column' => 'id_docs', 'required' => false)),
      'data_entrada'    => new sfValidatorDateTime(array('required' => false)),
      'data_finalizado' => new sfValidatorDateTime(array('required' => false)),
      'data_saida'      => new sfValidatorDateTime(array('required' => false)),
      'nome_entrada'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'nome_finalizado' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'nome_saida'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'descricao'       => new sfValidatorString(array('max_length' => 255)),
    ));

    $this->widgetSchema->setNameFormat('tbdocs[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tbdocs';
  }


}
