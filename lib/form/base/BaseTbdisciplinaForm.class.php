<?php

/**
 * Tbdisciplina form base class.
 *
 * @method Tbdisciplina getObject() Returns the current form's model object
 *
 * @package    derca
 * @subpackage form
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbdisciplinaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'cod_disciplina'           => new sfWidgetFormInputHidden(),
      'descricao'                => new sfWidgetFormInputText(),
      'sucinto'                  => new sfWidgetFormInputText(),
      'inicio'                   => new sfWidgetFormDate(),
      'termino'                  => new sfWidgetFormDate(),
      'ch'                       => new sfWidgetFormInputText(),
      'ch_teorica'               => new sfWidgetFormInputText(),
      'ch_pratica'               => new sfWidgetFormInputText(),
      'cred_pratico'             => new sfWidgetFormInputText(),
      'cred_teorico'             => new sfWidgetFormInputText(),
      'id_situacao'              => new sfWidgetFormPropelChoice(array('model' => 'Tbdisciplinasituacao', 'add_empty' => false)),
      'created_at'               => new sfWidgetFormDate(),
      'updated_at'               => new sfWidgetFormDate(),
      'created_by'               => new sfWidgetFormInputText(),
      'updated_by'               => new sfWidgetFormInputText(),
      'tbgrade_equivalente_list' => new sfWidgetFormPropelChoice(array('multiple' => true, 'model' => 'Tbcurriculodisciplinas')),
    ));

    $this->setValidators(array(
      'cod_disciplina'           => new sfValidatorPropelChoice(array('model' => 'Tbdisciplina', 'column' => 'cod_disciplina', 'required' => false)),
      'descricao'                => new sfValidatorString(array('max_length' => 100)),
      'sucinto'                  => new sfValidatorString(array('max_length' => 40)),
      'inicio'                   => new sfValidatorDate(array('required' => false)),
      'termino'                  => new sfValidatorDate(array('required' => false)),
      'ch'                       => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'ch_teorica'               => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'ch_pratica'               => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'cred_pratico'             => new sfValidatorString(array('max_length' => 255)),
      'cred_teorico'             => new sfValidatorString(array('max_length' => 255)),
      'id_situacao'              => new sfValidatorPropelChoice(array('model' => 'Tbdisciplinasituacao', 'column' => 'id_situacao')),
      'created_at'               => new sfValidatorDate(array('required' => false)),
      'updated_at'               => new sfValidatorDate(array('required' => false)),
      'created_by'               => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'updated_by'               => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'tbgrade_equivalente_list' => new sfValidatorPropelChoice(array('multiple' => true, 'model' => 'Tbcurriculodisciplinas', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'Tbdisciplina', 'column' => array('cod_disciplina')))
    );

    $this->widgetSchema->setNameFormat('tbdisciplina[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tbdisciplina';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['tbgrade_equivalente_list']))
    {
      $values = array();
      foreach ($this->object->getTbgradeEquivalentes() as $obj)
      {
        $values[] = $obj->getIdCurriculoDisciplina();
      }

      $this->setDefault('tbgrade_equivalente_list', $values);
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveTbgradeEquivalenteList($con);
  }

  public function saveTbgradeEquivalenteList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['tbgrade_equivalente_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(TbgradeEquivalentePeer::COD_DISCIPLINA, $this->object->getPrimaryKey());
    TbgradeEquivalentePeer::doDelete($c, $con);

    $values = $this->getValue('tbgrade_equivalente_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new TbgradeEquivalente();
        $obj->setCodDisciplina($this->object->getPrimaryKey());
        $obj->setIdCurriculoDisciplina($value);
        $obj->save();
      }
    }
  }

}
