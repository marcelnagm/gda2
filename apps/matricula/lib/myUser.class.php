<?php

class myUser extends sfBasicSecurityUser {

    public function getUsername() {
        $usuario = sfContext::getInstance()->getUser()->getAttribute('novo_aluno');
        return ($usuario instanceof Tbaluno) ? $usuario->getMatricula() : null;
    }

}
