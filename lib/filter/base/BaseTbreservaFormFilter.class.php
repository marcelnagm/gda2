<?php

/**
 * Tbreserva filter form base class.
 *
 * @package    derca
 * @subpackage filter
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbreservaFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'cod_disciplina' => new sfWidgetFormPropelChoice(array('model' => 'Tbdisciplina', 'add_empty' => true)),
      'id_sala'        => new sfWidgetFormPropelChoice(array('model' => 'Tbsala', 'add_empty' => true)),
      'turma'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'cod_disciplina' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tbdisciplina', 'column' => 'cod_disciplina')),
      'id_sala'        => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tbsala', 'column' => 'id_sala')),
      'turma'          => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tbreserva_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tbreserva';
  }

  public function getFields()
  {
    return array(
      'idreserva'      => 'Number',
      'cod_disciplina' => 'ForeignKey',
      'id_sala'        => 'ForeignKey',
      'turma'          => 'Text',
    );
  }
}
