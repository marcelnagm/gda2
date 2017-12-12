<?php

/**
 * aluno actions.
 *
 * @package    hotspot-ufrr
 * @subpackage aluno
 * @author     Marcelo Matos
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class hotspotActions extends sfActions {

    public function preExecute() {
        $this->usuario = $this->getUser()->getAttribute('aluno');
    }

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {

        $this->forward404Unless($this->usuario instanceof Tbaluno);

        # situacao do aluno
        switch ($this->usuario->getIdSituacao()) {
            case 0: break; # aluno regular
            case 13: break; # aluno regular segundo semestre
            default:
                $this->getUser()->setFlash('hotspot_error', 'A matrícula ' . $this->usuario->getMatricula() . ' não tem autorização para acesso à internet. Situação do aluno: ' . $this->usuario->getTbalunosituacao());
                $this->forward('hotspot', 'erro');
        }

        $auth = current($this->usuario->getTbalunosenhas());

        # acessar conta no servidor de autenticacao
        try {
            $hs_radcheck = HotSpotRadcheckPeer::retrieveByUsername($auth->getNomeUsuario(), Propel::getConnection('hotspot_aluno'));
        } catch (Exception $exc) {
            $this->getUser()->setFlash('hotspot_error', 'Não foi possível acessar o servidor de autenticação. Tente mais tarde.');
            $this->forward('hotspot', 'erro');
        }


        # conta previamente autorizada
        if ($hs_radcheck instanceof HotSpotRadcheck)
            $this->forward('hotspot', 'autorizado');


        $this->form = new DeclaracaoAtivacaoHotspotForm();

        if ($request->isMethod('post')) {

            if ($request->hasParameter($this->form->getName()))
                $this->form->bind($request->getParameter($this->form->getName()));

            if ($this->form->isValid()) {

//                try {

                HotSpotRadcheckPeer::salvaSenha($auth);

                $this->forward('hotspot', 'autorizado');

//                } catch (Exception $exc) {
//                    $this->getUser()->setFlash('error', 'Não foi possível cadastrar autenticação da matrícula ' . $aluno->getMatricula());
//                }
            }
        }
    }

    /**
     * Executes cadastro action
     *
     * @param sfRequest $request A request object
     */
    public function executeAutorizado(sfWebRequest $request) {
        
    }

    /**
     * Executes cadastro action
     *
     * @param sfRequest $request A request object
     */
    public function executeCancelar(sfWebRequest $request) {

        $this->form = new CancelamentoForm();

        if ($request->isMethod('post')) {

            if ($request->hasParameter($this->form->getName()))
                $this->form->bind($request->getParameter($this->form->getName()));

            if ($this->form->isValid()) {

                try {

                    $auth = current($this->usuario->getTbalunosenhas());

                    HotSpotRadcheckPeer::apagaSenha($auth);

                    $this->redirect('hotspot/cancelado');
                    
                } catch (Exception $exc) {
                    $this->getUser()->setFlash('hotspot_error', 'Não foi possível fazer o cancelamento. Tente mais tarde.');
                    $this->forward('hotspot', 'erro');
                }
            }
        }
    }

    public function executeCancelado(sfWebRequest $request) {

    }

    public function executeErro(sfWebRequest $request) {

    }

}
