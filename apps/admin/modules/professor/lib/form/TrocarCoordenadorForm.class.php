<?php

class TrocarCoordenadorForm extends sfForm {

    private $descricao = 'Selecione o novo coordenador do curso e clique em Trocar';
    private $matricula_prof;

    function configure() {
        $criteria = new Criteria();
//        $criteria->add(TbprofessorPeer::ID_SETOR, TbprofessorPeer::retrieveByPK($this->getMatriculaProf())->getIdSetor());
      
        
        $widgets['matricula_prof'] = new sfWidgetFormPropelChoice(array(
                    'model' => 'Tbprofessor',                    
                    'order_by' => array('Nome', 'ASC'),
                    'expanded' => false,
                    'multiple' => false,
                    'criteria' => $criteria,
                    'label' => 'qual professor?',
                ));

        $validators['matricula_prof'] = new sfValidatorString();

        $widgets['matricula_prof_antigo'] = new sfWidgetFormInputHidden(array('default' => $this->matricula_prof));

        $validators['matricula_prof_antigo'] = new sfValidatorString();

        $this->setWidgets($widgets);
        $this->setValidators($validators);
        $this->getValidatorSchema()->setPostValidator(new sfTrocaCoordenadorValidator());
    }

    public function getDescricao(){
        return $this->descricao;
    }

  public function setMatriculaProf($v){
      $this->matricula_prof = $v;
  }

  public function getMatriculaProf(){
      return $this->matricula_prof;
  }

}

?>
