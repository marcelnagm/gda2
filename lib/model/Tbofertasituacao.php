<?php


/**
 * Skeleton subclass for representing a row from the 'tbofertasituacao' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.0 on:
 *
 * Thu Oct  7 10:08:50 2010
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model
 */
class Tbofertasituacao extends BaseTbofertasituacao {

    public function __toString() {
        return $this->getDescricao();
    }

          public function save(PropelPDO $con = null) {
        Log::save($this);
        parent::save($con);
    }

} // Tbofertasituacao
