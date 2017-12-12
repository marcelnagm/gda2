<?php


/**
 * Skeleton subclass for performing query and update operations on the 'tbhistorico' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.4.0 on:
 *
 * Tue May  4 12:14:37 2010
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model
 */
class TbhistoricoPeer extends BaseTbhistoricoPeer {

    /** the column name for the CARATER field */
//    const CARATER = 'carater_desc(cod_disciplina,matricula) as carater';


    /**
     * Method to do selects.
     *
     * @param Criteria $criteria
     * @param PropelPDO $con
     * @return <type> 
     */
    public static function doSelect(Criteria $criteria, PropelPDO $con = null) {
        $criteria->addJoin(self::ID_PERIODO,TbperiodoPeer::ID_PERIODO);
        $criteria->addDescendingOrderByColumn(TbperiodoPeer::ANO);
        $criteria->addDescendingOrderByColumn(TbperiodoPeer::SEMESTRE);
        $criteria->addDescendingOrderByColumn(TbperiodoPeer::PERIODO);
        $criteria->addAscendingOrderByColumn(self::COD_DISCIPLINA);
        return parent::doSelect($criteria, $con);
    }
} // TbhistoricoPeer
