<?php

/**
 * Skeleton subclass for performing query and update operations on the 'radcheck' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.4.0 on:
 *
 * Fri Feb  4 09:39:55 2011
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model
 */
class HotSpotRadcheckPeer extends BaseHotSpotRadcheckPeer {

    public static function retrieveByUsername($pk, $con) {

        if ($con == null)
            throw new PropelException('HotSpot: Conexão indefinida para o objeto.');

        $criteria = new Criteria();
        $criteria->add(self::USERNAME, $pk);
        return self::doSelectOne($criteria, $con);
    }

    public static function getHotSpotConnection($auth) {

        try {
            if ($auth instanceof Tbalunosenha) {
                return Propel::getConnection('hotspot_aluno');
            } else if ($auth instanceof Tbprofessorsenha) {
                return Propel::getConnection('hotspot_professor');
            } else {
                throw new PropelException('Conexão indefinida para o objeto.');
            }
        } catch (Exception $exc) {
            sfContext::getInstance()->getLogger()->warning('HotSpot: erro na conexão. ' . $exc->getMessage());
        }
    }

    public static function trocaSenha($auth) {

        $con = self::getHotSpotConnection($auth);

        try {
            $hs_radcheck = HotSpotRadcheckPeer::retrieveByUsername($auth->getNomeUsuario(), $con);

            if ($hs_radcheck instanceof HotSpotRadcheck) {
                $hs_radcheck->setValue($auth->getSenha());
                $hs_radcheck->save($con);
            }
        } catch (Exception $exc) {
            sfContext::getInstance()->getLogger()->warning('HotSpot: Erro ao trocar senha. ' . $exc->getMessage());
        }
    }

    public static function apagaSenha($auth) {

        $con = self::getHotSpotConnection($auth);

        try {
            $hs_radcheck = HotSpotRadcheckPeer::retrieveByUsername($auth->getNomeUsuario(), $con);

            if ($hs_radcheck instanceof HotSpotRadcheck) {
                $hs_radcheck->delete($con);
            }
        } catch (Exception $exc) {
            sfContext::getInstance()->getLogger()->warning('HotSpot: Erro ao apagar senha. ' . $exc->getMessage());
        }
    }

    public static function salvaSenha($auth) {

        $con = self::getHotSpotConnection($auth);

        try {
            $hs_radcheck = new HotSpotRadcheck();
            $hs_radcheck->setUsername($auth->getNomeUsuario());
            $hs_radcheck->setValue($auth->getSenha());
            $hs_radcheck->save($con);
        } catch (Exception $exc) {
            sfContext::getInstance()->getLogger()->warning('HotSpot: Erro ao salvar senha. ' . $exc->getMessage());
        }
    }

}

// HotSpotRadcheckPeer
