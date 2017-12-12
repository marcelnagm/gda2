<?php

/**
 * Tbdisciplinarequisitos filter form.
 *
 * @package    derca
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class TbdisciplinarequisitosFormFilter extends BaseTbdisciplinarequisitosFormFilter
{
  public function configure()
  {
      $this->getWidget('cod_disciplina')->setOption('order_by', array('Sucinto','ASC'));
      $this->getWidget('id_versao_curso')->setOption('order_by', array('Descricao','ASC'));
      $this->getWidget('cod_disc_requisito')->setOption('order_by', array('Sucinto','ASC'));
  }
}
