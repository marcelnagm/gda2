<?php

require_once dirname(__FILE__).'/../lib/usuarioGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/usuarioGeneratorHelper.class.php';

/**
 * usuario actions.
 *
 * @package    derca
 * @subpackage usuario
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class usuarioActions extends autoUsuarioActions {

    public function executeIndex(sfWebRequest $request) {
        $this->forward('usuario','edit');
    }

    public function executeDelete(sfWebRequest $request) {
        $this->redirect('usuario/index');
    }

    public function executeCreate(sfWebRequest $request) {
        $this->redirect('usuario/index');
    }

    public function executeEdit(sfWebRequest $request) {
//        $this->sfGuardUser = $this->getRoute()->getObject();
        $this->sfGuardUser = sfGuardUserPeer::retrieveByPK($this->getUser()->getGuardUser()->getId());
        $this->form = $this->configuration->getForm($this->sfGuardUser);
    }

    public function executeUpdate(sfWebRequest $request) {
//        $this->sfGuardUser = $this->getRoute()->getObject();
//        $this->forwardUnless($request->isMethod(sfRequest::POST));
        $this->sfGuardUser = sfGuardUserPeer::retrieveByPK($this->getUser()->getGuardUser()->getId());
        $this->form = $this->configuration->getForm($this->sfGuardUser);

        $this->processForm($request, $this->form);

        $this->setTemplate('edit');
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';

            $sfGuardUser = $form->save();

            $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $sfGuardUser)));

            $this->getUser()->setFlash('notice', $notice);

//            $this->redirect(array('sf_route' => 'usuario'));
            $this->redirect('usuario/index');
        } else {
            $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
        }
    }

}
