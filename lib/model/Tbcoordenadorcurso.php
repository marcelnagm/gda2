<?php


/**
 * Skeleton subclass for representing a row from the 'tbcoordenadorcurso' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.0 on:
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model
 */
class Tbcoordenadorcurso extends BaseTbcoordenadorcurso {

        public function save(PropelPDO $con = null) {
        Log::save($this);
        parent::save($con);
    }

} // Tbcoordenadorcurso
