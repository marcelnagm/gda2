<?php

/**
 * Tbhistorico filter form.
 *
 * @package    derca
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class TbhistoricoFormFilter extends BaseTbhistoricoFormFilter {
    public function configure() {
        
        unset($this['carater']);

        $this->widgetSchema['matricula'] = new sfWidgetFormInput();

        $this->validatorSchema['matricula'] = new sfValidatorString(array('required' => false));

        $this->widgetSchema['cod_disciplina']->setOption('order_by', array('Sucinto','ASC'));
        $this->widgetSchema['id_conceito']->setOption('order_by', array('Sucinto','ASC'));


    }
}
