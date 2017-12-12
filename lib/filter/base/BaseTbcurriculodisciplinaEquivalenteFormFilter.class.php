<?php

/**
 * TbcurriculodisciplinaEquivalente filter form base class.
 *
 * @package    derca
 * @subpackage filter
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTbcurriculodisciplinaEquivalenteFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
    ));

    $this->setValidators(array(
    ));

    $this->widgetSchema->setNameFormat('tbcurriculodisciplina_equivalente_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TbcurriculodisciplinaEquivalente';
  }

  public function getFields()
  {
    return array(
      'id_curriculo_disciplina' => 'ForeignKey',
      'cod_disciplina'          => 'ForeignKey',
    );
  }
}
