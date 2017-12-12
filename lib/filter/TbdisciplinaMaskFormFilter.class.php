<?php

/**
 * TbdisciplinaMask filter form.
 *
 * @package    derca
 * @subpackage filter
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormFilterTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class TbdisciplinaMaskFormFilter extends BaseTbdisciplinaMaskFormFilter
{
  public function configure()
  {
      $this->widgetSchema['cod_disciplina'] = new sfWidgetFormInputText();
      $this->widgetSchema['cod_disciplina_mask'] = new sfWidgetFormInputText();
  }
}
