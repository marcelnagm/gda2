<?php

/**
 * Tbsumula form.
 *
 * @package    derca
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class TbsumulaForm extends BaseTbsumulaForm
{
  public function configure()
  {
      $criteria = new Criteria();
      $criteria->add(TbturmaPeer::NOTAS_NO_HISTORICO,false);

      $this->getWidget('id_turma')->setOption('criteria', $criteria);

      

  }
}
