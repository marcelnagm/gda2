<?php

/**
 * Tbdisciplina form.
 *
 * @package    derca
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class TbdisciplinaForm extends BaseTbdisciplinaForm {
    public function configure() {

        unset($this['tbgrade_equivalente_list']);

        $this->getWidget('descricao')->setAttribute('size', 50);
        $this->getWidget('ch')->setAttribute('size', 5);
        $this->getWidget('ch_teorica')->setAttribute('size', 5);
        $this->getWidget('ch_pratica')->setAttribute('size', 5);
        $this->getWidget('cred_teorico')->setAttribute('size', 5);
        $this->getWidget('cred_pratico')->setAttribute('size', 5);

        $this->widgetSchema['cod_disciplina'] = new sfWidgetFormInput(array(),array('size' => 7));
        if( ! $this->isNew() ) $this->widgetSchema['cod_disciplina']->setAttribute('readonly','readonly');
        $this->validatorSchema['cod_disciplina'] = new sfValidatorRegex(array('pattern'=>'/^[a-z]+[0-9]+[a-z]?(\.+([0-9]|[a-z]))?$/i'));
        if( $this->isNew() ) {
            $this->widgetSchema['cred_teorico']->setDefault(0);
            $this->widgetSchema['cred_pratico']->setDefault(0);
        }

        
    }
}
