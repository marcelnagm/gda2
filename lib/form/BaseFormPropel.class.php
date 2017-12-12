<?php

/**
 * Project form base class.
 *
 * @package    derca
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormBaseTemplate.php 9304 2008-05-27 03:49:32Z dwhittle $
 */
abstract class BaseFormPropel extends sfFormPropel {
    public function setup() {
//        unset(
//                $this['created_at'],
//                $this['updated_at'],
//                $this['usuario'],
//                $this['ip']
//        );
        # retirar campos dos forms
//        $fields[]='created_at';
//        $fields[]='updated_at';
//        $fields[]='usuario';
//        $fields[]='ip';
//        foreach($fields as $field) {
//            unset($this->widgetSchema[$field]);
//            unset($this->validatorSchema[$field]);
//        }

        if(isset ($this['created_at'])) unset($this['created_at']);
        if(isset ($this['created_by'])) unset($this['created_by']);
        if(isset ($this['updated_by'])) unset($this['updated_by']);
        if(isset ($this['updated_at'])) unset($this['updated_at']);
    }
}
