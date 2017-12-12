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
        $professor = $this->getUser()->getAttribute('professor');
        $this->Tbprofessor = TbprofessorPeer::retrieveByPk($professor->getMatriculaProf());
        $this->forward404Unless($this->Tbprofessor);
    }

    public function executeEdit(sfWebRequest $request) {
        $this->professor = $this->getUser()->getAttribute('professor');
        $this->forward404Unless($this->professor, sprintf('Object Tbprofessor does not exist (%s).', $this->professor->getMatriculaProf()));

        $this->form = new ProfessorDadosPessoaisForm();
        $values['celular'] = $this->professor->getCelular();
        $values['fone_residencial'] = $this->professor->getFoneResidencial();
        $values['email'] = $this->professor->getEmail();
        $this->form->setDefaults($values);


        #unset($this->form['id_pessoa']);
    }

    public function executeUpdate(sfWebRequest $request) {
        $this->professor = $this->getUser()->getAttribute('professor');
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->form = new ProfessorDadosPessoaisForm();

        $this->form->bind($request->getParameter($this->form->getName()));

        if ($this->form->isValid()) {
            $values = $this->form->getValues();
            $this->professor->setCelular($values['celular']);
            $this->professor->setFoneResidencial($values['fone_residencial']);
            $this->professor->setEmail($values['email']);
            $this->professor->save();
            $this->getUser()->setFlash('notice', 'Dados pessoais salvos com sucesso');

            $message = sfContext::getInstance()->getMailer()->compose('Tentativa@www.derca.ufrr.br', 'marcel@derca.ufrr.br', 'Erro ao acessar a fila',
                            'Mudar dados da mat - ' . $aluno->getMatricula() .
                            ' Com o IP ' . @$_SERVER['REMOTE_ADDR']
            );
            sfContext::getInstance()->getMailer()->send($message);

            $this->redirect('dadospessoais/index');
        }

        $this->setTemplate('edit');
    }

    public function executeAlterarSenha(sfWebRequest $request) {
        $this->form = new AlterarSenhaForm();

        if ($request->isMethod('post')) {
            $this->form->bind($request->getParameter($this->form->getName()));
            if ($this->form->isValid()) {
                $form_values = $this->form->getValues();
                $professor = $this->getUser()->getAttribute('professor');
                try {
                    $prof_senha = TbprofessorsenhaPeer::retrieveByMatricula($professor->getMatriculaprof());
                    $prof_senha->setSenha($form_values['senha_nova']);
                    if ($prof_senha->save()) {
                        $this->getUser()->setFlash('notice', 'Senha alterada com sucesso');
                        $this->redirect('dadospessoais/index');
                    } else {
                        throw new Exception('Senha não foi trocada');
                    }
                } catch (PropelException $exc) {
                    $this->getUser()->setFlash('error', utf8_decode($exc->getMessage()), false);
                } catch (Exception $exc) {
                    $this->getUser()->setFlash('error', $exc->getMessage(), false);
                }
            }
        }
    }

}
