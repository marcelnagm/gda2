<?php

/**
 * Tbfilacalouros filter form.
 *
 * @package    derca
 * @subpackage filter
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 * @version    SVN: $Id: sfPropelFormFilterTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class TbfilacalourosFormFilter extends BaseTbfilacalourosFormFilter {

    public function configure() {
//        $criteria = new Criteria();
//        $criteria->addJoin(TbofertaPeer::ID_PERIODO, TbperiodoPeer::ID_PERIODO);
//        $criteria->add(TbperiodoPeer::ANO, date('Y') - 1, Criteria::GREATER_EQUAL);
//        $criteria->add(TbperiodoPeer::ANO, date('Y'), Criteria::LESS_EQUAL);
//        $this->widgetSchema['id_oferta']->setOption('criteria', $criteria);
    }

}
