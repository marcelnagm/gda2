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

        $this->form = new ProfessorSigninForm();

        if ($request->isMethod('post')) {

            if($request->hasParameter($this->form->getName())) $this->form->bind($request->getParameter($this->form->getName()));

            if ($this->form->isValid()) {

                // sign in
                $values = $this->form->getValues();
                $this->getUser()->setAuthenticated(true);
                #$this->getUser()->addCredential('professor');
                $this->getUser()->setAttribute('professor',$values['professor']);
                $this->getUser()->setCulture('pt_BR');                
                $professor = new Tbprofessor();
                $professor = sfContext::getInstance()->getUser()->getAttribute('professor');
                if($professor->getCoordenador() == true) $this->getUser()->addCredential('coordenador');
                // log
                sfContext::getInstance()->getLogger()->info('Login: '.$values['professor']->getSiape());
                
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
        $this->getUser()->setAttribute('matricula_prof',null);
        $this->getUser()->setAttribute('professor',null);
        $this->getUser()->clearCredentials();
        #$this->redirect('@homepage');
        $this->redirect('/professor/index.php');
    }

    public function executeSecure() {
        $this->getResponse()->setStatusCode(403);
    }

    public function executeCadastroSenha(sfWebRequest $request) {
        $this->form = new CadastroSenhaForm();

        if($request->isMethod('post')) {

            $this->form->bind( $request->getParameter($this->form->getName()) );

            if( $this->form->isValid() ) {

                $form_values = $this->form->getValues();
                
                try {

                    $professor = TbprofessorPeer::retrieveByPK($form_values['codigo']);
                    $professor->setEmail($form_values['email']);
                    $professor->save();

                    $prof_senha = new Tbprofessorsenha();
                    $prof_senha->setMatriculaProf($form_values['codigo']);
                    $prof_senha->setSenha($form_values['senha_nova']);
                    
                    if( $prof_senha->save() ) {
                        $this->getUser()->setFlash('notice', 'Senha salva com sucesso');
                        $this->redirect('@auth_signin');
                    } else {
                        throw new Exception('Erro ao salvar senha. Entre em contato com o DERCA');
                    }
                    
                } catch (PropelException $exc) {
                    $this->getUser()->setFlash('error', utf8_decode($exc->getMessage()), false );
                } catch (Exception $exc) {
                    $this->getUser()->setFlash('error', $exc->getMessage(), false);
                }
            }
        }
    }
}
