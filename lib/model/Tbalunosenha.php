<?php

/**
 * Skeleton subclass for representing a row from the 'tbalunosenha' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.4.0 on:
 *
 * Tue May  4 12:14:30 2010
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model
 */

require_once 'Log.class.php';

class Tbalunosenha extends BaseTbalunosenha {

    public function setSenha($v) {
        parent::setSenha(md5($v));
    }

    public function getNomeUsuario(){
        return $this->getMatricula();
    }

    public function save(PropelPDO $con = null) {
        try {
            HotSpotRadcheckPeer::trocaSenha($this);
        } catch (Exception $exc) {
            sfContext::getInstance()->getLogger()->warning('Erro ao salvar senha do aluno no Hotspot. ' . $exc->getMessage());
        }       
        return parent::save($con);
    }

    public function delete(PropelPDO $con = null) {
        try {
            HotSpotRadcheckPeer::apagaSenha($this);
        } catch (Exception $exc) {
            sfContext::getInstance()->getLogger()->warning('Erro ao apagar senha do aluno no Hotspot. ' . $exc->getMessage());
        }
        return parent::delete($con);
    }

}

// Tbalunosenha
