<?php

/**
 * auth actions.
 *
 * @package    derca
 * @subpackage auth
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class loginActions extends sfActions {

    public function executeSignin(sfWebRequest $request) {

      
        $this->form = new ProfessorSigninForm();

        if ($request->isMethod('post')) {

            if($request->hasParameter($this->form->getName())) $this->form->bind($request->getParameter($this->form->getName()));

            if ($this->form->isValid()) {

                // sign in
                $values = $this->form->getValues();                
                #$this->getUser()->addCredential('professor');
                $this->getUser()->setAttribute('professor_turma',$values['professor']);
                $this->getUser()->setCulture('pt_BR');                
                $professor = sfContext::getInstance()->getUser()->getAttribute('professor_turma');
                
                // log
                sfContext::getInstance()->getLogger()->info('Login: '.$values['professor']->getSiape());
                
                // always redirect to a URL set in app.yml
                // or to the referer
                // or to the homepage                
                return $this->redirect($request->getReferer());

            }

        }

    }

    public function executeSignout(sfWebRequest $request) {        
        $this->getUser()->setAttribute('matricula_prof',null);
        $this->getUser()->setAttribute('professor_turma',null);
        sfContext::getInstance()->getUser()->setAttribute('id_turma',null);

        $this->redirect('turma/index');
        
    }

    public function executeSecure() {
        $this->getResponse()->setStatusCode(403);
    }

  }
