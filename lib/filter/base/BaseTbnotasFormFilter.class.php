<?php

/**
 * Tbnotas filter form base class.
 *
 * @package    derca
 * @subpackage filter
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbnotasFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_fila'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'matricula'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'carater'    => new sfWidgetFormFilterInput(),
      'nota_1'     => new sfWidgetFormFilterInput(),
      'nota_2'     => new sfWidgetFormFilterInput(),
      'nota_3'     => new sfWidgetFormFilterInput(),
      'nota_4'     => new sfWidgetFormFilterInput(),
      'nota_5'     => new sfWidgetFormFilterInput(),
      'nota_6'     => new sfWidgetFormFilterInput(),
      'mp'         => new sfWidgetFormFilterInput(),
      'nota_er'    => new sfWidgetFormFilterInput(),
      'mf'         => new sfWidgetFormFilterInput(),
      'faltas'     => new sfWidgetFormFilterInput(),
      'conceito'   => new sfWidgetFormFilterInput(),
      'n_notas'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'id_periodo' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'id_fila'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'matricula'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'carater'    => new sfValidatorPass(array('required' => false)),
      'nota_1'     => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'nota_2'     => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'nota_3'     => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'nota_4'     => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'nota_5'     => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'nota_6'     => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'mp'         => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'nota_er'    => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'mf'         => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'faltas'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'conceito'   => new sfValidatorPass(array('required' => false)),
      'n_notas'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_periodo' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('tbnotas_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tbnotas';
  }

  public function getFields()
  {
    return array(
      'id_nota'    => 'Number',
      'id_fila'    => 'Number',
      'matricula'  => 'Number',
      'carater'    => 'Text',
      'nota_1'     => 'Number',
      'nota_2'     => 'Number',
      'nota_3'     => 'Number',
      'nota_4'     => 'Number',
      'nota_5'     => 'Number',
      'nota_6'     => 'Number',
      'mp'         => 'Number',
      'nota_er'    => 'Number',
      'mf'         => 'Number',
      'faltas'     => 'Number',
      'conceito'   => 'Text',
      'n_notas'    => 'Number',
      'id_periodo' => 'Number',
    );
  }
}
