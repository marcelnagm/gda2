<?php

require_once dirname(__FILE__).'/../lib/ofertahorarioGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/ofertahorarioGeneratorHelper.class.php';

/**
 * ofertahorario actions.
 *
 * @package    derca
 * @subpackage ofertahorario
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class ofertahorarioActions extends autoOfertahorarioActions {

    protected function processForm(sfWebRequest $request, sfForm $form) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';

            $tbofertahorario = $form->save();

            $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $tbofertahorario)));

            $values = $form->getValues();

            if ($request->hasParameter('_save_and_add')) {
                $this->getUser()->setFlash('notice', $notice.' You can add another one below.');

                $this->redirect('@tbofertahorario_new?id_oferta='.$values['id_oferta']);
            }
            else {
                $this->getUser()->setFlash('notice_horario', $notice);

                #$this->redirect(array('sf_route' => 'tbofertahorario_edit', 'sf_subject' => $tbofertahorario));
                $this->redirect('@tboferta_edit?id_oferta='.$values['id_oferta'].'#horario');
            }
        }
        else {
            $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
        }
    }

    public function executeDelete(sfWebRequest $request) {
        $request->checkCSRFProtection();

        $this->dispatcher->notify(new sfEvent($this, 'admin.delete_object', array('object' => $this->getRoute()->getObject())));

        $this->getRoute()->getObject()->delete();

        $this->getUser()->setFlash('notice_horario', 'The item was deleted successfully.');

        $this->redirect('@tboferta_edit?id_oferta='.$this->getRoute()->getObject()->getIdOferta().'#horario');
    }

}
