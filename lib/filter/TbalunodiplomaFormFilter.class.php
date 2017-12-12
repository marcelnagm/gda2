<?php

/**
 * Tbalunodiploma filter form.
 *
 * @package    derca
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class TbalunodiplomaFormFilter extends BaseTbalunodiplomaFormFilter {
    public function configure() {

        $this->widgetSchema['matricula'] = new sfWidgetFormFilterInput(array('with_empty'=>false));

        $this->validatorSchema['matricula'] = new sfValidatorSchemaFilter('text', new sfValidatorString(array('required' => false)));


    }
}
