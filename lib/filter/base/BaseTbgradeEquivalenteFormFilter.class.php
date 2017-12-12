<?php

/**
 * TbgradeEquivalente filter form base class.
 *
 * @package    derca
 * @subpackage filter
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbgradeEquivalenteFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
    ));

    $this->setValidators(array(
    ));

    $this->widgetSchema->setNameFormat('tbgrade_equivalente_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TbgradeEquivalente';
  }

  public function getFields()
  {
    return array(
      'id_grade_equivalente'    => 'Number',
      'id_curriculo_disciplina' => 'ForeignKey',
      'cod_disciplina'          => 'ForeignKey',
    );
  }
}
