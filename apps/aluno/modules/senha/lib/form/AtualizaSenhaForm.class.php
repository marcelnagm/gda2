<?php

class AtualizaSenhaForm extends sfForm {
    public function configure() {

        # Campos

        $widgets['matricula']   = new sfWidgetFormInputHidden();
        $widgets['senha_nova']   = new sfWidgetFormInputPassword();
        $widgets['senha_nova_2'] = new sfWidgetFormInputPassword();

        # Validadores
        $validators['matricula'] = new sfValidatorString(array('required' => true));
        $validators['senha_nova'] = new sfValidatorString(array('required' => true));
        $validators['senha_nova_2'] = new sfValidatorString(array('required' => true));
        $validators['senha_nova_2']->setMessage('invalid', 'Repita a senha nova neste campo');

        $this->setWidgets($widgets);
        $this->setValidators($validators);

        $this->validatorSchema->setPostValidator(new AtualizaSenhaValidator());

        $this->widgetSchema->setNameFormat('resetpass[%s]');

    }
}
