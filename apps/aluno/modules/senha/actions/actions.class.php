<?php

/**
 * senha actions.
 *
 * @package    derca
 * @subpackage senha
 * @author     George Soon Ho <george@derca.ufrr.br>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class senhaActions extends sfActions {

    function selection_sort($array) {
        for ($i = 0; $i < count($array); $i++) {
            $copiado = $array[$i];
            $j = $i;
            while (($j > 0 ) && ($copiado > $array[$j - 1])) {
                $array[$j] = $array[$j - 1];
                $j--;
            }
            $array[$j] = $copiado;
        }
        return $array;
    }

    public function executeAtualizaSenha(sfWebRequest $request) {
        $user = $this->getUser();
        if ($user->isAuthenticated()) {
            return $this->redirect('@homepage');
        }

        $this->form = new AtualizaSenhaForm();

        if ($request->isMethod('post') && $request->hasParameter($this->form->getName())) {
            $this->form->bind($request->getParameter($this->form->getName()));
            if ($this->form->isValid()) {
                $form_values = $this->form->getValues();
                    $aluno_senha = TbalunosenhaPeer::retrieveByMatricula($request->getPostParameter('resetpass[matricula]'));
                    $aluno_senha->setSenha($request->getPostParameter('resetpass[senha_nova]'));
                if ( $aluno_senha->save() ) {
                    $user->setFlash('notice', 'Senha salva com sucesso!');
                } else {
                    $user->setFlash('error', 'Erro ao salvar senha!');
                }
                $this->redirect('@homepage');
            }
        } else {
            $matricula = $request->getPostParameter('recuperacaoNome[matricula]');
            $nome = $user->getAttribute('nomes');
            $nome = $nome[$request->getPostParameter('recuperacaoNome[nome]')];

            if (TbalunoPeer::retrieveByPK($matricula)->getNome() != $nome) {
                $user->setFlash('error', 'Valores inválidos!');
                $this->redirect('@homepage');
            }
            $this->form->setWidget('matricula', new sfWidgetFormInputHidden(array(), array('value' => $matricula)));
        }
    }

    public function executeRecuperacaoNome(sfWebRequest $request) {
        $user = $this->getUser();
        if ($user->isAuthenticated()) {
            $this->redirect('@homepage');
        }

        $this->form = new RecuperacaoNomeForm();

        if ($request->isMethod('post')) {
            $matricula = $request->getPostParameter('recuperacaoCPF[matricula]');
            $cpf = $request->getPostParameter('recuperacaoCPF[cpf]');

            if ($user->hasAttribute('nomes')) {
                $nomes = $user->getAttribute('nomes');
            } else {
                $nomes = array();
                $aluno = TbalunoPeer::retrieveByPK($matricula);

                if ($aluno->getCpf() == $cpf) {
                    $nomes[] = $aluno->getNome();
                } else {
                    $user->setFlash('error', 'Valores inválidos!');
                    $this->redirect('@homepage');
                }

                $con = Propel::getConnection();
                $stmt = $con->prepare('SELECT nome FROM tbaluno ORDER BY random() LIMIT 7');
                $stmt->execute();
                for ($i = 0; $i < $stmt->rowCount(); $i++) {
                    $line = $stmt->fetch();
                    $nomes[] = $line[0];
                }
                $nomes = $this->selection_sort($nomes);
                $user->setAttribute('nomes', $nomes);
            }

            $this->form->setWidget('matricula', new sfWidgetFormInputHidden(array(), array('value' => $matricula)));
            $this->form->setWidget('cpf', new sfWidgetFormInputHidden(array(), array('value' => $cpf)));
            $this->form->setWidget('nome', new sfWidgetFormChoice(array(
                        'choices' => $nomes,
                        'expanded' => true,
                        'multiple' => false,
                        'label' => 'Selecione seu Nome'
                    )));
        } else {
            return $this->redirect('@homepage');
        }
    }

    public function executeRecuperacaoCPF(sfWebRequest $request) {
        $user = $this->getUser();
        if ($user->isAuthenticated()) {
            return $this->redirect('@homepage');
        }

        $this->form = new RecuperacaoCPFForm();

        if ($request->isMethod('post')) {
            $matricula = $request->getPostParameter('recuperaSenha[matricula]');
            if (TbalunosenhaPeer::retrieveByMatricula($matricula) == null) {
                $user->setFlash('error', 'Você não possui senha! Utilize o botão "Cadastre sua senha aqui" para cadastrá-la');
                $this->redirect('@homepage');
            }
            $this->form->setWidget('matricula', new sfWidgetFormInputHidden(array(), array('value' => $matricula)));
            if ($user->hasAttribute('repairPass')) {
                if ($user->getAttribute('repairPass') != $matricula) {
                    $user->offsetUnset('nomes');
                }
            }
            $user->setAttribute('repairPass', $matricula);
        } else {
            return $this->redirect('@homepage');
        }
    }

    public function executeRecuperaSenha(sfWebRequest $request) {
        $user = $this->getUser();
        if ($user->isAuthenticated()) {
            return $this->redirect('@homepage');
        }

        $this->form = new RecuperaSenhaForm();

        if ($request->isMethod('post')) {
            $this->form->bind($request->getParameter($this->form->getName()));
            if ($this->form->isValid()) {
                $user->setAttribute('levelone', true);
                $this->forward('senha', 'recuperacaoCPF');
            }
        }
    }

}
