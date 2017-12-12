<?php

/**
 * Tbpessoa filter form base class.
 *
 * @package    derca
 * @subpackage filter
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbpessoaFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'nome'              => new sfWidgetFormFilterInput(),
      'celular'           => new sfWidgetFormFilterInput(),
      'email'             => new sfWidgetFormFilterInput(),
      'fone_residencial'  => new sfWidgetFormFilterInput(),
      'foto'              => new sfWidgetFormFilterInput(),
      'id_neces_especial' => new sfWidgetFormPropelChoice(array('model' => 'Tbnecesespecial', 'add_empty' => true)),
      'created_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'created_by'        => new sfWidgetFormFilterInput(),
      'updated_by'        => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'nome'              => new sfValidatorPass(array('required' => false)),
      'celular'           => new sfValidatorPass(array('required' => false)),
      'email'             => new sfValidatorPass(array('required' => false)),
      'fone_residencial'  => new sfValidatorPass(array('required' => false)),
      'foto'              => new sfValidatorPass(array('required' => false)),
      'id_neces_especial' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tbnecesespecial', 'column' => 'id_neces_especial')),
      'created_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'created_by'        => new sfValidatorPass(array('required' => false)),
      'updated_by'        => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tbpessoa_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tbpessoa';
  }

  public function getFields()
  {
    return array(
      'id_pessoa'         => 'Number',
      'nome'              => 'Text',
      'celular'           => 'Text',
      'email'             => 'Text',
      'fone_residencial'  => 'Text',
      'foto'              => 'Text',
      'id_neces_especial' => 'ForeignKey',
      'created_at'        => 'Date',
      'updated_at'        => 'Date',
      'created_by'        => 'Text',
      'updated_by'        => 'Text',
    );
  }
}
