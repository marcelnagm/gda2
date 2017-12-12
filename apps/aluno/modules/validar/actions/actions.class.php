<?php

/**
 * verificar actions.
 *
 * @package    derca
 * @subpackage verificar
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class validarActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {
        $this->form = new ValidarForm();
        $this->setLayout('noheader');
    }

    public function executePesquisa(sfWebRequest $request) {
        $this->form = new ValidarForm();
        if ($request->isMethod('post') && $request->hasParameter($this->form->getName())) {
            $this->form->bind($request->getParameter($this->form->getName()));
            if ($this->form->isValid()) {
                $values = $this->form->getValues();
                $criteria = new Criteria();
                $criteria->add(TbvalidacaoPeer::MATRICULA, $values['matricula']);
                $criteria->add(TbvalidacaoPeer::NUM_AUTH, $values['num_auth']);
                $criteria->add(TbvalidacaoPeer::DATA, $values['data']);
                $criteria->add(TbvalidacaoPeer::HORA, $values['hora']);
                $criteria->add(TbvalidacaoPeer::ATIVO, 1);
                $criteria->add(TbvalidacaoPeer::ID_TIPO, $values['id_tipo']);
                if (TbvalidacaoPeer::doCount($criteria) == 1) {
                    $this->valido = true;
                    $this->dados = TbvalidacaoPeer::doSelectOne($criteria);
                } else {
                    $this->valido = false;
                }
                $this->setLayout('noheader');
            } else {
                $this->forward('validar', 'index');
            }
        } else {
            $this->forward('validar', 'index');
        }
    }

}
