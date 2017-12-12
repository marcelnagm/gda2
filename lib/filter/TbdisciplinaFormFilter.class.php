<?php

/**
 * Tbdisciplina filter form.
 *
 * @package    derca
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class TbdisciplinaFormFilter extends BaseTbdisciplinaFormFilter {
    public function configure() {

        $this->widgetSchema['cod_disciplina'] = new sfWidgetFormFilterInput();
        $this->validatorSchema['cod_disciplina'] = new sfValidatorSchemaFilter('text', new sfValidatorRegex(array('pattern' => '/^[A-Z0-9]+[A-Z]?$/', 'required' => false)));

    }
}
