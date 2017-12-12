<?php

/**
 * Tbalunosolicitacao filter form.
 *
 * @package    derca
 * @subpackage filter
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 * @version    SVN: $Id: sfPropelFormFilterTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class TbalunosolicitacaoFormFilter extends BaseTbalunosolicitacaoFormFilter
{
  public function configure()
  {
      $this->widgetSchema['matricula'] = new sfWidgetFormFilterInput(array('with_empty'=>false),array('size' => 10));
        $this->validatorSchema['matricula'] = new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false)));
  }
}
