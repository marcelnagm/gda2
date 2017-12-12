<?php

require_once dirname(__FILE__).'/../lib/tbdisciplinaignoradaGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/tbdisciplinaignoradaGeneratorHelper.class.php';

/**
 * tbdisciplinaignorada actions.
 *
 * @package    derca
 * @subpackage tbdisciplinaignorada
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class tbdisciplinaignoradaActions extends autoTbdisciplinaignoradaActions
{

    public function ha(){
        $tb = new TbdisciplinaIgnorada();
    }

}
