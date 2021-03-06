<?php


/**
 * Skeleton subclass for representing a row from the 'tbcurso' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.4.0 on:
 *
 * Tue May  4 12:14:33 2010
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model
 */
class Tbcurso extends BaseTbcurso {
    public function __toString() {
        return $this->getCodCurso()." - ".$this->getSucinto();
    }
    
       public function save(PropelPDO $con = null) {
        Log::save($this);
        parent::save($con);
    }

} // Tbcurso
