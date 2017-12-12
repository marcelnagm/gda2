<?php

/**
 * Tbpendencia filter form.
 *
 * @package    derca
 * @subpackage filter
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 * @version    SVN: $Id: sfPropelFormFilterTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class TbpendenciaFormFilter extends BaseTbpendenciaFormFilter {

    public function configure() {
        $this->widgetSchema['matricula'] = new sfWidgetFormFilterInput(array('with_empty' => false));
    }

}
