<?php

/**
 * Tbofertahorario form.
 *
 * @package    derca
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class TbofertahorarioForm extends BaseTbofertahorarioForm {
    public function configure() {

        $choices = sfConfig::get('app_dias_semana');

        $this->widgetSchema['dia'] = new sfWidgetFormChoice(array('choices' => $choices));

        $this->widgetSchema['hora_inicio']->setOption('format', '%hour%:%minute%');
        $this->widgetSchema['hora_fim']->setOption('format', '%hour%:%minute%');

        if( $this->isNew() ) {
           if(sfContext::hasInstance()) {
            if(sfContext::getInstance()->getRequest()->hasParameter('id_oferta')) {
                //$this->widgetSchema['id_oferta']->setDefault(intval(sfContext::getInstance()->getRequest()->getParameter('id_oferta')));
                $criteria = new Criteria();
                $criteria->add(TbofertaPeer::ID_OFERTA, sfContext::getInstance()->getRequest()->getParameter('id_oferta'));
                $this->widgetSchema['id_oferta'] = new sfWidgetFormPropelChoice(array('model' => 'Tboferta', 'add_empty' => false, 'criteria' => $criteria));
            }
           }
        } else {
            $this->widgetSchema['id_oferta'] = new sfWidgetFormInputHidden();
        }

    }
}
