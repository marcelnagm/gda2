<?php

/**
 * exportar actions.
 *
 * @package    derca
 * @subpackage exportar
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class exportarActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeExportar(sfWebRequest $request) {
        $this->setLayout('relatorio');
        $this->list = $request->getAttribute('list');
        $this->show_fields = $request->getAttribute('show_fields');

        $request->setAttribute('list', null);
        $request->setAttribute('show_fields', null);
    }

    public function executeProfessorDeclaracao(sfWebRequest $request) {
        $form = new ProfessorDeclaracaoForm();
        $form->bind($request->getParameter($form->getName()));
        if ($form->isValid()) {
            $form_values = $form->getValues();
            $prof = sfContext::getInstance()->getUser()->getAttribute('professor');
            $this->forward404Unless($prof, 'Professor não encontrado');
            $this->professor = $prof->getNome();
            $this->departamento = TbsetorPeer::retrieveByPK($prof->getIdSetor());
            $this->template = $form_values['Tipo_Declaração'];
            if (empty($this->departamento)) {
                $this->departamento = "Setor não definido";
            } else {
                $this->departamento = $this->departamento->getDescricao();
            }
            $this->disciplinas = $prof->getDisciplinasMinistradas();
        } else {
            $this->setTemplate('ProfessorDeclaracaoForm');
        }
    }

}
