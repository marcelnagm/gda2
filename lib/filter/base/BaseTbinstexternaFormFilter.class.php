<?php

/**
 * Tbinstexterna filter form base class.
 *
 * @package    derca
 * @subpackage filter
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbinstexternaFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'descricao'       => new sfWidgetFormFilterInput(),
      'sucinto'         => new sfWidgetFormFilterInput(),
      'uf'              => new sfWidgetFormFilterInput(),
      'created_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'created_by'      => new sfWidgetFormFilterInput(),
      'updated_by'      => new sfWidgetFormFilterInput(),
      'id_tipo'         => new sfWidgetFormPropelChoice(array('model' => 'Tbinstexternatipo', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'descricao'       => new sfValidatorPass(array('required' => false)),
      'sucinto'         => new sfValidatorPass(array('required' => false)),
      'uf'              => new sfValidatorPass(array('required' => false)),
      'created_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'created_by'      => new sfValidatorPass(array('required' => false)),
      'updated_by'      => new sfValidatorPass(array('required' => false)),
      'id_tipo'         => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tbinstexternatipo', 'column' => 'id_tipo')),
    ));

    $this->widgetSchema->setNameFormat('tbinstexterna_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tbinstexterna';
  }

  public function getFields()
  {
    return array(
      'id_inst_externa' => 'Number',
      'descricao'       => 'Text',
      'sucinto'         => 'Text',
      'uf'              => 'Text',
      'created_at'      => 'Date',
      'updated_at'      => 'Date',
      'created_by'      => 'Text',
      'updated_by'      => 'Text',
      'id_tipo'         => 'ForeignKey',
    );
  }
}
