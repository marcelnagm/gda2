<?php

/**
 * dadospessoais actions.
 *
 * @package    derca
 * @subpackage dadospessoais
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class dadospessoaisActions extends sfActions {

    public function executeIndex(sfWebRequest $request) {
        $aluno = $this->getUser()->getAttribute('aluno');
        $this->aluno = TbalunoPeer::retrieveByPk($aluno->getMatricula());
        $this->forward404Unless($this->aluno);
    }

    public function executeEdit(sfWebRequest $request) {
        $this->aluno = $this->getUser()->getAttribute('aluno');
        $this->forward404Unless($this->aluno, sprintf('Object Tbaluno does not exist (%s).', $this->aluno->getMatricula()));

        $this->form = new AlunoDadosPessoaisForm();
        $values['celular'] = $this->aluno->getCelular();
        $values['fone_residencial'] = $this->aluno->getFoneResidencial();
        $values['email'] = $this->aluno->getEmail();
        $this->form->setDefaults($values);


        #unset($this->form['id_pessoa']);
    }

    public function executeUpdate(sfWebRequest $request) {
        $aluno = TbalunoPeer::retrieveByPK($this->getUser()->getAttribute('aluno')->getMatricula());
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->form = new AlunoDadosPessoaisForm();

        $this->form->bind( $request->getParameter($this->form->getName()) );

        if($this->form->isValid()) {
            $values = $this->form->getValues();
            $aluno->setCelular($values['celular']);
            $aluno->setFoneResidencial($values['fone_residencial']);
            $aluno->setEmail($values['email']);
            $aluno->save();
            $this->getUser()->setFlash('notice', 'Dados pessoais salvos com sucesso');
            $this->redirect('dadospessoais/index');
        } else {
            $this->aluno = $aluno;
        }

        $this->setTemplate('edit');
    }

    public function executeAlterarSenha(sfWebRequest $request) {
        $this->form = new AlterarSenhaForm();

        if($request->isMethod('post')) {
            $this->form->bind( $request->getParameter($this->form->getName()) );
            if( $this->form->isValid() ) {
                $form_values = $this->form->getValues();
                $aluno = $this->getUser()->getAttribute('aluno');
                try {
                    $prof_senha = TbalunosenhaPeer::retrieveByMatricula($aluno->getMatricula());
                    $prof_senha->setSenha($form_values['senha_nova']);
                    if( $prof_senha->save() ) {
                        $this->getUser()->setFlash('notice', 'Senha alterada com sucesso');
                        $this->redirect('dadospessoais/index');
                    } else {
                        throw new Exception('Senha não foi trocada');
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
