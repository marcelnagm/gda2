<?php

class AlterarSenhaForm extends sfForm {
    public function configure() {

        # Campos
        $widgets['senha_atual'] = new sfWidgetFormInputPassword();
        $widgets['senha_nova']   = new sfWidgetFormInputPassword();
        $widgets['senha_nova_2'] = new sfWidgetFormInputPassword();

        # Validadores
        $validators['senha_atual'] = new sfValidatorString(array('required' => true));
        $validators['senha_nova']   = new sfValidatorString(array('required' => true));
        $validators['senha_nova_2'] = new sfValidatorString(array('required' => true));

        $this->setWidgets($widgets);
        $this->setValidators($validators);

        $this->validatorSchema->setPostValidator(new AlterarSenhaValidator());

        $this->widgetSchema->setNameFormat('chgpass[%s]');
    }
}
