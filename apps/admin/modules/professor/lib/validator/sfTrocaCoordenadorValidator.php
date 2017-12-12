<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class sfTrocaCoordenadorValidator extends sfValidatorBase {

    protected function configure($options = array(), $messages = array()) {
        parent::configure($options, $messages);
    }

    protected function doClean($value) {

        $prof_antigo = TbprofessorPeer::retrieveByPK($value['matricula_prof_antigo']);
        $prof_novo = TbprofessorPeer::retrieveByPK($value['matricula_prof']);

        if(!isset ($prof_antigo))throw new sfValidatorError($this, "Professores " );

        if($prof_antigo->getIdSetor() != $prof_novo->getIdSetor()){
            throw new sfValidatorError($this, "Professores de Setores diferentes, Altere-os se necessário" );
        }

        return $value;
    }

}

?>
