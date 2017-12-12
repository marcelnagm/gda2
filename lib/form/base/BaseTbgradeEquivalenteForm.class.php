<?php

/**
 * TbgradeEquivalente form base class.
 *
 * @method TbgradeEquivalente getObject() Returns the current form's model object
 *
 * @package    derca
 * @subpackage form
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbgradeEquivalenteForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_grade_equivalente'    => new sfWidgetFormInputHidden(),
      'id_curriculo_disciplina' => new sfWidgetFormInputHidden(),
      'cod_disciplina'          => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'id_grade_equivalente'    => new sfValidatorPropelChoice(array('model' => 'TbgradeEquivalente', 'column' => 'id_grade_equivalente', 'required' => false)),
      'id_curriculo_disciplina' => new sfValidatorPropelChoice(array('model' => 'Tbcurriculodisciplinas', 'column' => 'id_curriculo_disciplina', 'required' => false)),
      'cod_disciplina'          => new sfValidatorPropelChoice(array('model' => 'Tbdisciplina', 'column' => 'cod_disciplina', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'TbgradeEquivalente', 'column' => array('id_curriculo_disciplina')))
    );

    $this->widgetSchema->setNameFormat('tbgrade_equivalente[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TbgradeEquivalente';
  }


}
