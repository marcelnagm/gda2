<?php

class CadastroSenhaForm extends sfForm {
    public function configure() {

        # Campos
        $widgets['codigo'] = new sfWidgetFormInput();
        $widgets['siape'] = new sfWidgetFormInput();
        $widgets['email'] = new sfWidgetFormInput();
        $widgets['senha_nova']   = new sfWidgetFormInputPassword();
        $widgets['senha_nova_2'] = new sfWidgetFormInputPassword();
        $widgets['captcha'] = new sfWidgetCaptchaGD();

        # Validadores
        $validators['codigo'] = new sfValidatorString(array('required' => true));
        $validators['siape'] = new sfValidatorString(array('required' => true));
        $validators['email'] = new sfValidatorString(array('required' => true));
        $validators['senha_nova'] = new sfValidatorString(array('required' => true));
        $validators['senha_nova_2'] = new sfValidatorString(array('required' => true));
        $validators['senha_nova_2']->setMessage('invalid', 'Repita a senha nova neste campo');
        $validators['captcha'] = new sfCaptchaGDValidator(array('required' => true,'length' => 4));
        $validators['captcha']->setMessage('invalid', 'Digite o código que aparece na imagem. Clique nela para trocar.');

        $this->setWidgets($widgets);
        $this->setValidators($validators);

        $this->validatorSchema->setPostValidator(new CadastroSenhaValidator());

        $this->widgetSchema->setNameFormat('chgpass[%s]');

    }
}
