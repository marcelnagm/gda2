<?php


/**
 * Skeleton subclass for performing query and update operations on the 'tbprofessorsenha' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.4.0 on:
 *
 * Tue May  4 12:14:43 2010
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model
 */
class TbprofessorsenhaPeer extends BaseTbprofessorsenhaPeer {
    /**
     * Retrieve a single object by matricula.
     *
     * @param      int $pk the matricula.
     * @param      PropelPDO $con the connection to use
     * @return     Tbprofessorsenha
     */
    static function retrieveByMatricula($matricula, PropelPDO $con = null) {

        $criteria = new Criteria(TbprofessorsenhaPeer::DATABASE_NAME);
        $criteria->add(TbprofessorsenhaPeer::MATRICULA_PROF, $matricula);

        $v = TbprofessorsenhaPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve a single object by matricula.
     *
     * @param      int $pk the matricula.
     * @param      PropelPDO $con the connection to use
     * @return     Tbprofessorsenha
     */
    static function retrieveBySiape($siape, PropelPDO $con = null) {

        $criteria = new Criteria(TbprofessorsenhaPeer::DATABASE_NAME);

        $criteria->addJoin(TbprofessorsenhaPeer::MATRICULA_PROF, TbprofessorPeer::MATRICULA_PROF);
        $criteria->add(TbprofessorPeer::SIAPE, $siape);

        $v = TbprofessorsenhaPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

} // TbprofessorsenhaPeer