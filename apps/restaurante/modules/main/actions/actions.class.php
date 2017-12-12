<?php

/**
 * main actions.
 *
 * @package    derca
 * @subpackage main
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class mainActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {
        $this->forward('main', 'Status');
    }

    function executeStatus(sfWebRequest $request) {
        $form = new VerificaAlunoForm();
        if ($request->isMethod(sfRequest::POST) && $request->hasParameter($form->getName())) {
            $form->bind($request->getParameter($form->getName()));

            if ($form->isValid()) {
                try {
//                    $form->save();
                    $values = $form->getValues();

                    $aluno = TbalunoPeer::retrieveByPK(($values['matricula'] - 1)/19);
                    if (isset($aluno)) {
                        if ($aluno->getIdSituacao() == 0) {
                            $this->status = 'ok';
                        } else {
                            $this->status = 'not';
                        }
                        $this->nome = $aluno->getNome();
                        $this->matricula = $values['matricula'];
                    } else {
                        $this->status = 'not';
                    }
                    $this->form = new VerificaAlunoForm();
                } catch (Exception $exc) {
                    $this->status = 'not';
                    $this->form = new VerificaAlunoForm();
                }
            }
        } else {
//            $this->setTemplate('Form');
            $this->form = $form;
        }
    }

}
