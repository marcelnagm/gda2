<?php

require_once dirname(__FILE__) . '/../lib/alunoGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/alunoGeneratorHelper.class.php';

/**
 * aluno actions.
 *
 * @package    derca
 * @subpackage aluno
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class alunoActions extends autoAlunoActions {

    function executeListAlunoFicha(sfWebRequest $request) {
        $request->setParameter('matricula', $request->getParameter('matricula'));
        $this->forward('relatorio', 'AlunoFicha');
    }

}
