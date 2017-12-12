<?php

require_once dirname(__FILE__).'/../lib/avisoGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/avisoGeneratorHelper.class.php';

/**
 * aviso actions.
 *
 * @package    derca
 * @subpackage aviso
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class avisoActions extends autoAvisoActions
{

    public function executeOut(sfWebRequest $request){
        $this->message = $request->getParameter('message');
    }

    public function executeContato(sfWebRequest $request){
        
    }
}
