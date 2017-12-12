<?php
/**
 * aviso components.
 *
 * @package    derca
 * @subpackage aviso
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class turmaComponents extends sfComponents {

    public function executeInfo(sfWebRequest $request) {
        if($request->getParameter('id_turma') != null) {
            $this->tbturma = TbturmaPeer::retrieveByPK($request->getParameter('id_turma') );
        }

        if($request->getParameter('id_turma') == null) throw new Exception('Componente turma/info: Não foi possível buscar informações da turma');

    }

     public function executeLegendaConceito(sfWebRequest $request) {

        $this->Conceitos = array();

        if(is_array($this->pks)) {
            $c = new Criteria();
            $c->addAscendingOrderByColumn('id_conceito');

            $c->add(TbconceitoPeer::ID_CONCEITO, $this->pks, Criteria::IN);

            $this->Conceitos = TbconceitoPeer::doSelectOne($c);
            #if($this->Conceitos == null) throw new Exception('Não foi possível buscar legenda de conceitinformações');
        }
    }

    public function executeSignin(sfWebRequest $request) {

       if(sfContext::getInstance()->getUser()->getAttribute('professor'));

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
                $professor = sfContext::getInstance()->getUser()->getAttribute('professor');
                if($professor->getCoordenador())$this->getUser()->addCredential('coordenador');
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

}
