<?php

class myUser extends sfGuardSecurityUser
{
    public function getUsername() {
//        parent::getUsername();
        $usuario = sfContext::getInstance()->getUser()->getAttribute('aluno');
        return ($usuario instanceof Tbaluno) ? $usuario->getMatricula() : null;
    }

}
