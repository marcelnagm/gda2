<?php

class CadastroSenhaForm extends sfForm {
    public function configure() {

        # Campos

        $widgets['matricula'] = new sfWidgetFormInput();
        $widgets['cpf'] = new sfWidgetFormInput();
        $widgets['email'] = new sfWidgetFormInput();
        $widgets['senha_nova']   = new sfWidgetFormInputPassword();
        $widgets['senha_nova_2'] = new sfWidgetFormInputPassword();
        $widgets['captcha'] = new sfWidgetCaptchaGD();

        # Validadores
        $validators['matricula'] = new sfValidatorString(array('required' => true));
        $validators['cpf'] = new sfValidatorString(array('required' => true));
        $validators['email'] = new sfValidatorString(array('required' => false));
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

    public function save() {

        $form_values = $this->getValues();

        try {

            $aluno_senha = TbalunosenhaPeer::retrieveByMatricula($form_values['matricula']);

            if($aluno_senha instanceof Tbalunosenha){
                throw new Exception('Senha já foi cadastrada. Entre em contato com o DERCA para recadastramento');
            }

            $aluno = TbalunoPeer::retrieveByPK($form_values['matricula']);
            $aluno->setEmail($form_values['email']);
            $aluno->save();

            $aluno_senha = new Tbalunosenha();
            $aluno_senha->setMatricula($form_values['matricula']);
            $aluno_senha->setSenha($form_values['senha_nova']);

            if( !$aluno_senha->save() ) {
                //notifica quando tentam criar uma senha e ocorre erro.
                $message = sfContext::getInstance()->getMailer()->compose('log2mail@www.derca.ufrr.br', 'marcel@derca.ufrr.br', 'Erro de cadastro de senha',
                        'Tentativa de cadastrar a senha com a matricula'.$form_values['matricula'].
                        'Com o IP '.@$_SERVER['REMOTE_ADDR']
                        );
                sfContext::getInstance()->getMailer()->send($message);
                throw new Exception('Erro ao salvar senha. Entre em contato com o DERCA: ');
            }

        } catch (PropelException $exc) {
//            $this->getUser()->setFlash('error', utf8_decode($exc->getMessage()), false );
            die('Erro no cadastro de senha');
        } catch (Exception $exc) {
//            $this->getUser()->setFlash('error', $exc->getMessage(), false);
            die('Erro no cadastro de senha');
        }
    }
}
