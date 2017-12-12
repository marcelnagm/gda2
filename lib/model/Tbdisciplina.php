<?php


/**
 * Skeleton subclass for representing a row from the 'tbdisciplina' table.
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
class Tbdisciplina extends BaseTbdisciplina {

    public function __toString() {
        if (sfContext::getInstance()->getUser()->hasAttribute('professor') ||
                sfContext::getInstance()->getUser()->hasAttribute('aluno')) {
            return $this->getCodDisciplinaMasked() . " - " . $this->getDescricao();
        }
        return $this->getCodDisciplina() . " - " . $this->getDescricao();
    }

    public function save(PropelPDO $con = null) {
        Log::save($this);
        parent::save($con);
    }
    
    public function getCodDisciplinaMasked() {
        $criteria = new Criteria();
        $criteria->add(TbdisciplinaMaskPeer::COD_DISCIPLINA, parent::getCodDisciplina());
        if (TbdisciplinaMaskPeer::doCount($criteria) > 0) {
            return TbdisciplinaMaskPeer::doSelectOne($criteria)->getCodDisciplinaMask();
        }
        return parent::getCodDisciplina();
    }

} // Tbdisciplina
