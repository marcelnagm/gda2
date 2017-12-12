<?php

/**
 * TbalunoImport filter form.
 *
 * @package    derca
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class TbalunoImportFormFilter extends BaseTbalunoImportFormFilter
{
  public function configure()
  {

      $this->validatorSchema['matricula'] = new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false)));

  }
}
