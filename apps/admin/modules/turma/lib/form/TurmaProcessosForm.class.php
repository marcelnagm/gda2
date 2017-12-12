<?php

class FilaProcessosForm extends sfForm {

    public function configure() {

        $criteria = new Criteria();
//        $criteria->addJoin(TbperiodoPeer::ID_PERIODO,TbofertaPeer::ID_PERIODO);
//        $criteria->addJoin(TbofertaPeer::ID_OFERTA,TbfilaPeer::ID_OFERTA);
        $criteria->add(TbperiodoPeer::ANO,date('Y'));
        $this->widgetSchema['id_periodo'] = new sfWidgetFormPropelChoice(array('model' => 'Tbperiodo','criteria' => $criteria,  'add_empty' => true));
        $this->validatorSchema['id_periodo'] = new sfValidatorPropelChoice(array('model' => 'Tbperiodo', 'column' => 'id_periodo', 'required' => true));

        $processos = array(
                5  => 'Calcular Carga Horária',
                2  => 'Verificar Pré-requisitos',
                3  => 'Verificar Excesso de C.H. Eletiva',
                4  => 'Verificar Choque de horário',
                6  => 'Verificar Disciplina cursada',
                9  => 'Verificar formandos',
                12 => 'Calcular Médias',
                10 => 'Calcular Pontos',
                11 => 'Calcular Reprovações',
                1  => 'Alocar vagas',
                14 => 'Criar turmas a partir do resultado da fila',
//                7  => 'Verificar Disciplina duplicada',
        );

        $this->widgetSchema['executar_processos'] = new sfWidgetFormChoice(array(
                        'choices'  => $processos,
                        'expanded' => true,
                        'multiple' => true,
        ));
        $this->widgetSchema['fase'] = new sfWidgetFormChoice(array(
                        'choices'  => array('1' =>'1' ,'2' => '2'),
                        'expanded' => false,
                        'multiple' => false,
        ));

        $this->validatorSchema['fase'] = new sfValidatorString();

        $this->validatorSchema['executar_processos'] = new sfValidatorChoice(array(
                        'choices'  => array_keys($processos),
                        'multiple' => true,
                        'required' => false
        ));

        $this->widgetSchema->setNameFormat('filaProcessos[%s]');

    }

//    function getFields(){
//        return array(
//            'id_periodo' => 'ForeignKey',
//            'executar_processos' => 'List'
//        );
//    }
//
//    function render() {
//
//        $html = null;
//        foreach($this->getFields() as $field=>$type){
//            $html .= '<div>'.$this[$field]->renderLabel().' '.$this[$field]->render().'</div>';
//        }
//        return $html;
//    }

}