<?php

class OfertaAnterioresForm extends sfForm {

    private $descricao = 'Selecione o semestre e clique em buscar para listar as ofertas do periodo.<br>Esta ferramenta é util para saber se alguma outra disciplina ja foi cadastrada com mesmo código ,turma ou horário.<br>Atenção ferramenta apenas para efeito de consulta das ofertas';

    function configure() {
        $criteria = new Criteria();
        $criteria->add(TbperiodoPeer::DESCRICAO, '%Graduação%', Criteria::LIKE);
        $criteria->add(TbperiodoPeer::ANO, 2008, Criteria::GREATER_EQUAL);


        $widgets['id_periodo'] = new sfWidgetFormPropelChoice(array(
                    'model' => 'Tbperiodo',
                    'add_empty' => true,
                    'order_by' => array('Ano', 'DES'),
                    'expanded' => false,
                    'multiple' => false,
                    'criteria' => $criteria,
                    'label' => 'qual periodo?',
                ));

        $validators['id_periodo'] = new sfValidatorString();

        
        $widgets['id_setor'] = new sfWidgetFormPropelChoice(array(
                    'model' => 'Tbsetor',
                    'add_empty' => true,
//                    'order_by' => array('descricao', 'ASC'),
                    'expanded' => false,
                    'multiple' => false,
                    'label' => 'qual departamento?',
                ));

        $validators['id_setor'] = new sfValidatorString();

        
        



        $this->setWidgets($widgets);
        $this->setValidators($validators);
    }

    public function getDescricao(){
        return $this->descricao;
    }

}

?>
