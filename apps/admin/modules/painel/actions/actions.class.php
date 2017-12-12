<?php

/**
 * painel actions.
 *
 * @package    derca
 * @subpackage painel
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class painelActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {
        if (sfContext::getInstance()->getUser()->getUsername() == 'matricula') {
            $this->redirect('matricula/SelecionaCPF');
        }
    }

}
