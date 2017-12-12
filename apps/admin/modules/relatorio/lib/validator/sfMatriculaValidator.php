<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class sfMatriculaValidator extends sfValidatorBase {

    protected function configure($options = array(), $messages = array()) {
        parent::configure($options, $messages);
    }

    protected function doClean($value) {

        $matricula = $value ['matricula'];
        
        $criteria = new Criteria();
        $criteria->add(TbalunoPeer::MATRICULA,$matricula);
        if(TbalunoPeer::doCount($criteria) ==0){
            throw new sfValidatorError($this, "Matricula Invalida");
        }


        return $value;
    }

}

?>
