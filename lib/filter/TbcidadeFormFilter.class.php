<?php

/**
 * Tbcidade filter form.
 *
 * @package    derca
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class TbcidadeFormFilter extends BaseTbcidadeFormFilter
{
  public function configure()
  {
      $this->getWidget('id_estado')->setOption('order_by', array('Descricao','ASC'));
  }
}
