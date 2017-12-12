<?php

/**
 * Tbcurso form.
 *
 * @package    derca
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class TbcursoForm extends BaseTbcursoForm {
    public function configure() {
        
        $this->widgetSchema['cod_curso'] = new sfWidgetFormInput(array(),array('size' => 7));
        $this->validatorSchema['cod_curso'] = new sfValidatorRegex(array('pattern'=>'/^[A-Z0-9]+$/', 'required' => true));

        if( ! $this->isNew() ) $this->widgetSchema['cod_curso']->setAttribute('readonly','readonly');

    }
}
