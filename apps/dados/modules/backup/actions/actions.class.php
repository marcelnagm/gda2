<?php

require_once dirname(__FILE__) . '/../lib/backupGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/backupGeneratorHelper.class.php';

/**
 * backup actions.
 *
 * @package    derca
 * @subpackage backup
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class backupActions extends autoBackupActions {

    function executeListAlunoFicha(sfWebRequest $request) {
        $request->setParameter('matricula', $request->getParameter('matricula'));
        $this->forward('relatorio', 'AlunoFicha');
    }

}
