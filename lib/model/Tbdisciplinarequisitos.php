<?php


/**
 * Skeleton subclass for representing a row from the 'tbdisciplinarequisitos' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.0 on:
 *
 * Tue May  4 12:14:35 2010
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model
 */
class Tbdisciplinarequisitos extends BaseTbdisciplinarequisitos {

    public function __toString() {
        return $this->getTbdisciplinaRelatedByCodDiscRequisito() ? $this->getTbdisciplinaRelatedByCodDiscRequisito()->__toString() : '';
    }

        public function save(PropelPDO $con = null) {
        Log::save($this);
        parent::save($con);
    }
    
} // Tbdisciplinarequisitos
