<?php
require '../../apps/admin/modules/fila/lib/validator/sfFilaValidator.php';

/**
 * Tbfila form.
 *
 * @package    derca
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class TbfilaForm extends BaseTbfilaForm {

    public function configure() {
        unset($this['pontos']);
        unset($this['reprovacoes']);
        unset($this['formando']);

        $this->widgetSchema['matricula'] = new sfWidgetFormInput(array(), array('size' => 10));
        if (!$this->isNew())
            $this->widgetSchema['matricula']->setAttribute('readonly', 'readonly');
        

        $criteria = new Criteria();
        $criteria->addJoin(TbofertaPeer::ID_PERIODO, TbperiodoPeer::ID_PERIODO);
        $criteria->add(TbperiodoPeer::ANO, date('Y') - 1, Criteria::GREATER_EQUAL);
//        $criteria->add(TbperiodoPeer::ANO, date('Y'), Criteria::LESS_EQUAL);
        $this->widgetSchema['id_oferta']->setOption('criteria', $criteria);

        $this->validatorSchema->setPostValidator(new sfFilaValidator() );
        
    }


}

