<?php


/**
 * Skeleton subclass for representing a row from the 'tbalunosolicitacao' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.0 on:
 *
 * Mon Feb 21 12:34:54 2011
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model
 */
class Tbalunosolicitacao extends BaseTbalunosolicitacao {


    public function save(PropelPDO $con = null) {
    Log::save($this);    
    $this->setDataSolicitacao(date('Y-m-d'));
    if($this->isNew()){
    $this->setSituacao('pendente');
    }
    if((sfContext::getInstance()->getUser()->hasAttribute('aluno')))$this->setMatricula(sfContext::getInstance()->getUser()->getAttribute('aluno')->getMatricula());
     parent::save($con);

    }

    public function setCancelado(){
    $this->setSituacao('cancelada');
    $this->setDataEncerrado(date('Y-m-d'));
    $this->save();
    }

    public function setConcluida(){
    $this->setSituacao('concluida');
    $this->setDataEncerrado(date('Y-m-d'));
    $this->save();
    }

    public function setFaltaInfo(){
    $this->setSituacao('falta-info');
    $this->setDataEncerrado(date('Y-m-d'));
    $this->save();
    }

    public function getTipoCompleto(){
       $choices = TbalunosolicitacaoPeer::getChoices();
       foreach ($choices as $choice => $value){
           if($choice == $this->getTipo()){
               return $value;
           }
       }
    }


} // Tbalunosolicitacao