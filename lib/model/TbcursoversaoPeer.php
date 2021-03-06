<?php


/**
 * Skeleton subclass for performing query and update operations on the 'tbcursoversao' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.0 on:
 *
 * Tue May  4 12:14:34 2010
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model
 */
class TbcursoversaoPeer extends BaseTbcursoversaoPeer {
    public static function doSelect(Criteria $criteria, PropelPDO $con = null) {
        $criteria->addAscendingOrderByColumn(self::DESCRICAO);
        return parent::doSelect($criteria, $con);
    }

    public static function getCriteriaJoinCursoGraduacao() {
        $criteria = new Criteria();                
        $criteria->addJoin(TbcursoversaoPeer::COD_CURSO, TbcursoPeer::COD_CURSO);
        $criteria->add(TbcursoPeer::DESCRICAO, '%MESTRADO%', Criteria::LIKE); // \
        return $criteria;
    }

    public static function getCriteriaJoinCursoEspecializacao() {
        $criteria = new Criteria();        
        $criteria->add(TbcursoversaoPeer::COD_CURSO, 55, Criteria::EQUAL); //especialização
        return $criteria;
    }

    public static function getCriteriaJoinCursoMestrado() {
        $criteria = new Criteria();        
        $criteria->add(TbcursoversaoPeer::DESCRICAO, "MESTRADO%", Criteria::LIKE); // \
        $criteria->addAnd(TbcursoversaoPeer::COD_CURSO, 46); // \
        $criteria->addAnd(TbcursoversaoPeer::COD_CURSO, 23); //  \
        $criteria->addAnd(TbcursoversaoPeer::COD_CURSO, 53); //   \__ Mestrado
        $criteria->addAnd(TbcursoversaoPeer::COD_CURSO, 54); //   /
        $criteria->addAnd(TbcursoversaoPeer::COD_CURSO, 82); //  /
        return $criteria;
    }


} // TbcursoversaoPeer
