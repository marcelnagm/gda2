<?php

/**
 * Project filter form base class.
 *
 * @package    derca
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterBaseTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
abstract class BaseFormFilterPropel extends sfFormFilterPropel {
    /**
     * Inclui no form Filter o campo para mudar o número de registros por
     * página. Ainda não está implementado.
     *
     */
//    public function setup() {
//
//        $per_page_choices = array(10,20,30,40,50,75,100,200);
//
//        $this->widgetSchema['max_per_page'] = new sfWidgetFormChoice(array(
//                        'choices'  => array_combine($per_page_choices,$per_page_choices)
//        ));
//        $this->widgetSchema['max_per_page']->setDefault(sfContext::getInstance()->getUser()->getAttribute('max_per_page', 20));
//
//        $this->validatorSchema['max_per_page'] = new sfValidatorPass(array('required' => false));
//
//        parent::setup();
//    }
//
//    protected function addMaxPerPageColumnCriteria(Criteria $criteria, $field, $value) {
//
//        if(!empty($value)) sfContext::getInstance()->getUser()->setAttribute('max_per_page', $value);
//
//        return $criteria;
//    }
}
