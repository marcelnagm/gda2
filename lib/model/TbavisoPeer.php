<?php


/**
 * Skeleton subclass for performing query and update operations on the 'tbaviso' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.0 on:
 *
 * Sun May 16 23:16:40 2010
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model
 */
class TbavisoPeer extends BaseTbavisoPeer {
    
    public static function isEnabled($pk) {
        return TbavisoPeer::retrieveByPK($pk)->getPublicado();
    }
    
    public static function getText($pk) {
        return TbavisoPeer::retrieveByPK($pk)->getTexto();
    }
} // TbavisoPeer
