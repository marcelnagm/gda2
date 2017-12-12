<?php

class myUser extends sfBasicSecurityUser
{
    public function getUsername() {
        $usuario = sfContext::getInstance()->getUser()->getAttribute('professor');
        return ($usuario instanceof Tbprofessor) ? $usuario->getSiape() : null;
    }


}
