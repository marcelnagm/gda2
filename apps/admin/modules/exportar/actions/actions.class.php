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

}
