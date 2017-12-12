<?php

/**
 * Tbalunodiploma form.
 *
 * @package    derca
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class TbalunodiplomaForm extends BaseTbalunodiplomaForm {


    public function configure() {
        $this->widgetSchema['matricula'] = new sfWidgetFormInput(array(),array('size' => 10));
        $this->validatorSchema['matricula'] = new sfValidatorRegex(array('pattern'=>'/^[0-9]+$/', 'required' => true));

        if( ! $this->isNew() ) $this->widgetSchema['matricula']->setAttribute('readonly','readonly');
    unset($this['created_at']);
        unset($this['created_by']);
        unset($this['updated_by']);
        unset($this['updated_at']);
    }
}
