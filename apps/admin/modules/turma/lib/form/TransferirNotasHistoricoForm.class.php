<?php


class TransferirNotasHistoricoForm extends sfForm {

    function configure() {
        $criteria = new Criteria();
        $criteria->addJoin(TbturmaPeer::ID_PERIODO,TbperiodoPeer::ID_PERIODO);
        $criteria->add(TbturmaPeer::NOTAS_NO_HISTORICO,false);
        $this->widgetSchema['id_periodo'] = new sfWidgetFormPropelChoice(
                array(
                        'model' => 'Tbperiodo',
                        'criteria' => $criteria,
                        'add_empty' => true,
                )
        );

        $this->validatorSchema['id_periodo'] = new sfValidatorPropelChoice(
                array(
                        'model' => 'Tbperiodo',
                        'criteria' => $criteria,
                        'required' => true,
                )
        );


        $this->widgetSchema->setNameFormat('transfereNotas[%s]');

    }

    function getFields() {
        return array(
                'id_periodo' => 'ForeignKey',
        );
    }

//    public function render() {
//
//        foreach($this->getFields() as $field=>$type) {
//            $html .= $this->widgetSchema[$field]->render();
//        }
//
//        return $html;
//
//    }
    
}
