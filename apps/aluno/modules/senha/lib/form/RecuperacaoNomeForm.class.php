<?php

class RecuperacaoNomeForm extends sfForm {

    public function configure() {

        # Campos
        $widgets['nome'] = new sfWidgetFormChoice(array(
                        'choices' => array(),
                        'expanded' => true,
                        'multiple' => false
                    ));

        # Validadores

        $this->setWidgets($widgets);
//        $this->setValidators($validators);
        
        $this->getWidget('nome')->setLabel('<p align="top">Escolha seu nome</p>');

        $this->validatorSchema->setPostValidator(new RecuperacaoNomeValidator());

        $this->widgetSchema->setNameFormat('recuperacaoNome[%s]');
    }

    public function getFields() {

        return array(
            'nome' => 'Text',
            'matricula' => 'Text',
        );
    }

}
