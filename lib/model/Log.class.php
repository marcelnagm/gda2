<?php

class Log {

    public static function  save($object){
        if($object->isNew()){

            $object->setCreatedBy(sfContext::getInstance()->getUser()->getUserName());
        }else{
            $object->setUpdatedBy(sfContext::getInstance()->getUser()->getUserName());

        }
    }


}

?>
