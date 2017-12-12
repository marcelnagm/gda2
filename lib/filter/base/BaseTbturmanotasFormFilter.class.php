<?php

/**
 * Tbturmanotas filter form base class.
 *
 * @package    derca
 * @subpackage filter
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbturmanotasFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_turma'  => new sfWidgetFormPropelChoice(array('model' => 'Tbturma', 'add_empty' => true)),
      'matricula' => new sfWidgetFormFilterInput(),
      'n_nota'    => new sfWidgetFormFilterInput(),
      'valor'     => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'id_turma'  => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tbturma', 'column' => 'id_turma')),
      'matricula' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'n_nota'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'valor'     => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('tbturmanotas_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tbturmanotas';
  }

  public function getFields()
  {
    return array(
      'id_nota'   => 'Number',
      'id_turma'  => 'ForeignKey',
      'matricula' => 'Number',
      'n_nota'    => 'Number',
      'valor'     => 'Number',
    );
  }
}
