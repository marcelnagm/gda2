<?php

/**
 * Tbfilacalouros form.
 *
 * @package    derca
 * @subpackage form
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class TbfilacalourosForm extends BaseTbfilacalourosForm {

    public function configure() {
        $fields = array(
            'created_at',
            'updated_at',
            'usuario',
            'ip'
        );
        foreach ($fields as $field) {
            unset($this[$field]);
        }

//        $criteria = new Criteria();
//        $criteria->addJoin(TbofertaPeer::ID_PERIODO, TbperiodoPeer::ID_PERIODO);
//        $criteria->add(TbperiodoPeer::ANO, date('Y') - 1, Criteria::GREATER_EQUAL);
//        $criteria->add(TbperiodoPeer::ANO, date('Y'), Criteria::LESS_EQUAL);
//        $this->widgetSchema['id_oferta']->setOption('criteria', $criteria);
    }

}
