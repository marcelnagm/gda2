<?php

/**
 * Tbofertahorario filter form.
 *
 * @package    derca
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class TbofertahorarioFormFilter extends BaseTbofertahorarioFormFilter
{
  public function configure()
  {
      $this->getWidget('id_oferta')->setOption('order_by', array('CodDisciplina','ASC'));
  }
}
