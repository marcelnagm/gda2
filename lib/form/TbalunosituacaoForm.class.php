<?php

/**
 * Tbalunosituacao form.
 *
 * @package    derca
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class TbalunosituacaoForm extends BaseTbalunosituacaoForm
{
  public function configure()
  {

           unset($this['created_at']);
        unset($this['created_by']);
        unset($this['updated_by']);
        unset($this['updated_at']);
  }
}
