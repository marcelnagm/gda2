<?php

class ProfessorSigninForm extends sfForm {
    public function configure() {

        # Campos
        #$widgets['codigo'] = new sfWidgetFormInput();
        $widgets['siape'] = new sfWidgetFormInput();
        $widgets['senha'] = new sfWidgetFormInputPassword();

        # Validadores
        #$validators['codigo'] = new sfValidatorInteger();
        #$validators['codigo']->setMessage('invalid', 'Invalid Codigo');
        $validators['siape'] = new sfValidatorInteger();
        $validators['siape']->setMessage('invalid', 'Invalid Siape');
        $validators['senha'] = new sfValidatorString();

        $this->setWidgets($widgets);
        $this->setValidators($validators);

        $this->validatorSchema->setPostValidator(new ProfessorSigninValidator());

        $this->widgetSchema->setNameFormat('signin[%s]');
    }
}
