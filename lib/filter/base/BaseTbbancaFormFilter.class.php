<?php

/**
 * Tbbanca filter form base class.
 *
 * @package    derca
 * @subpackage filter
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbbancaFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'matricula'        => new sfWidgetFormPropelChoice(array('model' => 'Tbaluno', 'add_empty' => true)),
      'nomeorientador'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'primeiromembro'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'segundomembro'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'terceiromembro'   => new sfWidgetFormFilterInput(),
      'quartomembro'     => new sfWidgetFormFilterInput(),
      'datadefesa'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'resultado'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'mediabanca'       => new sfWidgetFormFilterInput(),
      'titulomonografia' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'matricula'        => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tbaluno', 'column' => 'matricula')),
      'nomeorientador'   => new sfValidatorPass(array('required' => false)),
      'primeiromembro'   => new sfValidatorPass(array('required' => false)),
      'segundomembro'    => new sfValidatorPass(array('required' => false)),
      'terceiromembro'   => new sfValidatorPass(array('required' => false)),
      'quartomembro'     => new sfValidatorPass(array('required' => false)),
      'datadefesa'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'resultado'        => new sfValidatorPass(array('required' => false)),
      'mediabanca'       => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'titulomonografia' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tbbanca_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tbbanca';
  }

  public function getFields()
  {
    return array(
      'banca_id'         => 'Number',
      'matricula'        => 'ForeignKey',
      'nomeorientador'   => 'Text',
      'primeiromembro'   => 'Text',
      'segundomembro'    => 'Text',
      'terceiromembro'   => 'Text',
      'quartomembro'     => 'Text',
      'datadefesa'       => 'Date',
      'resultado'        => 'Text',
      'mediabanca'       => 'Number',
      'titulomonografia' => 'Text',
    );
  }
}
