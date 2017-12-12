<?php

class RecuperacaoCPFForm extends sfForm {

    public function configure() {


        # Validadores

        # Campos
        $widgets['cpf'] = new sfWidgetFormInput();

        # Validadores
        $validators['cpf'] = new sfValidatorRegex(
		array('pattern' => '/^[0-9]+$/', 'required' => true),
		array('invalid'=>'CPF inválido')
	);

        $this->setWidgets($widgets);
        $this->setValidators($validators);

        $this->getWidget('cpf')->setLabel('<p align="top">Digite seu CPF</p>');
        $this->widgetSchema->setHelp('cpf', '<i><small style="color: grey">Apenas números</small></i>');

        $this->validatorSchema->setPostValidator(new RecuperacaoCPFValidator());

        $this->widgetSchema->setNameFormat('recuperacaoCPF[%s]');
    }

}
