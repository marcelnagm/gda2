<?php

class RecuperaSenhaForm extends sfForm {

    public function configure() {

        # Campos
        $widgets['matricula'] = new sfWidgetFormInput();

        # Validadores
        $validators['matricula'] = new sfValidatorRegex(
		array('pattern' => '/^[1-9]?(19|20)[0-9]+$/', 'required' => true),
		array('invalid'=>'Formato da matrícula inválido')
	);

        $this->setWidgets($widgets);
        $this->setValidators($validators);

        $this->getWidget('matricula')->setLabel('<p align="top">Digite sua Matrícula</p>');

        $this->validatorSchema->setPostValidator(new RecuperaSenhaValidator());

        $this->widgetSchema->setNameFormat('recuperaSenha[%s]');
    }

}
