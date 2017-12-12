<?php

class RestauranteSigninForm extends sfForm {

    public function configure() {

        # Campos
        $widgets['matricula'] = new sfWidgetFormInput();
        $widgets['senha'] = new sfWidgetFormInputPassword();

        # Validadores
        $validators['matricula'] = new sfValidatorRegex(
		array('pattern' => '/^[1-9]?(19|20)[0-9]+$/', 'required' => true),
		array('invalid'=>'Formato da matrícula inválido')
	);
        $validators['senha'] = new sfValidatorString(array('required' => true));

        $this->setWidgets($widgets);
        $this->setValidators($validators);

        $this->validatorSchema->setPostValidator(new RestauranteSigninValidator());

        $this->widgetSchema->setNameFormat('signin[%s]');
    }

}
