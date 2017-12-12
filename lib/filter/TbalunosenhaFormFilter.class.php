<?php

/**
 * Tbalunosenha filter form.
 *
 * @package    derca
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class TbalunosenhaFormFilter extends BaseTbalunosenhaFormFilter {
    public function configure() {
        unset($this['senha']);
        $this->widgetSchema['matricula'] = new sfWidgetFormFilterInput(array('with_empty'=>false),array('size' => 10));

        $this->validatorSchema['matricula'] = new sfValidatorSchemaFilter('text', new sfValidatorString(array('required' => false)));

    }
}
