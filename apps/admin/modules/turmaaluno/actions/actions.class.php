<?php

require_once dirname(__FILE__).'/../lib/turmaalunoGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/turmaalunoGeneratorHelper.class.php';

/**
 * turmaaluno actions.
 *
 * @package    derca
 * @subpackage turmaaluno
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class turmaalunoActions extends autoTurmaalunoActions {

    protected function processForm(sfWebRequest $request, sfForm $form) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';

            $tbturmaaluno = $form->save();

            $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $tbturmaaluno)));

            $values = $form->getValues();

            if ($request->hasParameter('_save_and_add')) {
                $this->getUser()->setFlash('notice', $notice.' You can add another one below.');

                $this->redirect('@tbturmaaluno_new?id_turma='.$values['id_turma']);
            }
            else {
                $this->getUser()->setFlash('notice_alunos', $notice);

                #$this->redirect(array('sf_route' => 'tbturmaaluno_edit', 'sf_subject' => $tbturmaaluno));
                $this->redirect('@tbturma_edit?id_turma='.$values['id_turma'].'#alunos');
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

        $this->getUser()->setFlash('notice_alunos', 'The item was deleted successfully.');

        $this->redirect('@tbturma_edit?id_turma='.$this->getRoute()->getObject()->getIdTurma().'#alunos');
    }

}
