<?php
/**
 * aviso components.
 *
 * @package    derca
 * @subpackage aviso
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class historicoComponents extends sfComponents {

    public function executeLegenda(sfWebRequest $request) {

        $criteria = new Criteria();
        $criteria->addAscendingOrderByColumn(TbconceitoPeer::DESCRICAO);
        $this->conceitos = TbconceitoPeer::doSelect($criteria);

    }

}
