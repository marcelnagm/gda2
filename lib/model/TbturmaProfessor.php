<?php

/**
 * Skeleton subclass for representing a row from the 'tbturma_professor' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.0 on:
 *
 * Wed May 12 08:42:50 2010
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model
 */
class TbturmaProfessor extends BaseTbturmaProfessor {

    /**
     * Sobrescreve o metodo __toString para retornar o nome do professor
     * <br>
     * @return string
     */
    function __toString() {
        return (string) TbprofessorPeer::retrieveByPK($this->getMatriculaProf());
    }

}

// TbturmaProfessor
