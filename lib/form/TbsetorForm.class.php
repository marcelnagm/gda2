<?php

/**
 * Tbsetor form.
 *
 * @package    derca
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class TbsetorForm extends BaseTbsetorForm
{
  public function configure()
  {
      $this->widgetSchema['descricao']->setAttribute('size', 50);
      $this->widgetSchema['sucinto']->setAttribute('size', 15);
      $this->widgetSchema['sucinto']->setAttribute('maxlength', 15);
  }
}
