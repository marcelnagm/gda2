<?php

/**
 * Tbalunosenha form.
 *
 * @package    derca
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class TbalunosenhaForm extends BaseTbalunosenhaForm {
    public function configure() {

        $this->widgetSchema['matricula'] = new sfWidgetFormInput(array(),array('size' => 10));
        if( ! $this->isNew() ) $this->widgetSchema['matricula']->setAttribute('readonly','readonly');

        $this->widgetSchema['senha'] = new sfWidgetFormInputPassword();
        
    }
}
