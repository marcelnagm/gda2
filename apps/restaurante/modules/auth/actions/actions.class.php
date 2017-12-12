<?php

/**
 * auth actions.
 *
 * @package    derca
 * @subpackage auth
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class authActions extends sfActions {

    public function executeSignin(sfWebRequest $request) {

        $user = $this->getUser();
        if ($user->isAuthenticated()) {
            return $this->redirect('@homepage');
        }

        $this->form = new RestauranteSigninForm();

        if ($request->isMethod('post')) {

            if($request->hasParameter($this->form->getName())) $this->form->bind($request->getParameter($this->form->getName()));

            if ($this->form->isValid()) {

                // sign in
                $values = $this->form->getValues();
                $this->getUser()->setAuthenticated(true);
                #$this->getUser()->addCredential('aluno');
                $this->getUser()->setAttribute('aluno',$values['aluno']);
                $this->getUser()->setCulture('pt_BR');

                // log
                sfContext::getInstance()->getLogger()->info('Login: '.$values['aluno']->getMatricula());
                
                // always redirect to a URL set in app.yml
                // or to the referer
                // or to the homepage
                $referer = $request->getReferer();
                return $this->redirect( $referer!='' ? $referer : '@homepage');

            }

        }

    }

    public function executeSignout(sfWebRequest $request) {
        $this->getUser()->setAuthenticated(false);
        $this->getUser()->setAttribute('aluno',null);
        $this->getUser()->clearCredentials();
        #$this->redirect('@homepage');
        $this->redirect('/aluno/index.php');
    }

    public function executeSecure() {
        $this->getResponse()->setStatusCode(403);
    }

    public function executeCadastroSenha(sfWebRequest $request) {
        $this->form = new CadastroSenhaForm();

        if($request->isMethod('post')) {

            $this->form->bind( $request->getParameter($this->form->getName()) );

            if( $this->form->isValid() ) {

                try{
                $this->form->save();
                sfContext::getInstance()->getUser()->setFlash('notice', 'Senha salva com sucesso');
                $this->redirect('@homepage');
                }  catch (Exception $ex){
                    throw new Exception('Erro ao salvar senha. Entre em contato com o DERCA');
                }

            }
        }
    }
}
