<?php
/**
 * aviso components.
 *
 * @package    derca
 * @subpackage aviso
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class avisoComponents extends sfComponents {
    public function executeShow(sfWebRequest $request) {
        $c = new Criteria();
        $c->add(TbavisoPeer::LOCAL,$this->local);
        $c->add(TbavisoPeer::PUBLICADO,true);
        $this->avisos = TbavisoPeer::doSelect($c);
    }
}
