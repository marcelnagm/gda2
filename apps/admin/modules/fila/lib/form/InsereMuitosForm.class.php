<?php

class InsereMuitosForm extends sfForm {

    public function configure() {

        $this->widgetSchema['matriculas'] = new sfWidgetFormTextarea();
        $this->validatorSchema['matriculas'] = new sfvalidatorRegex(array('pattern' => '/^[0-9]+(,[0-9]+)*$/'));

        $criteria = new Criteria();
        $criteria->addJoin(TbofertaPeer::ID_PERIODO, TbperiodoPeer::ID_PERIODO);
        $criteria->add(TbperiodoPeer::ANO, date('Y') - 2, Criteria::GREATER_EQUAL);
        $this->widgetSchema['id_oferta'] = new sfWidgetFormPropelChoice(array('model' => 'Tboferta', 'add_empty' => false, 'criteria' => $criteria));
        $this->validatorSchema['id_oferta'] = new sfValidatorPropelChoice(array('model' => 'Tboferta', 'column' => 'id_oferta'));

        $this->widgetSchema->setNameFormat('insereMuitos[%s]');
    }

    function save() {
        $criteria = new Criteria();
        $errors = '';
        $values = $this->getValues();
        $oferta = TbofertaPeer::retrieveByPK($values['id_oferta']);
        try {
            $list = (explode(',', $values['matriculas']));
            foreach ($list as $matricula) {
                $criteria->clear();
                $criteria->add(TbalunoPeer::MATRICULA, $matricula, Criteria::EQUAL);
                if (TbalunoPeer::doCount($criteria) > 0) {
                    $criteria->clear();
                    $criteria->add(TbfilaPeer::ID_OFERTA, $values['id_oferta'], Criteria::EQUAL);
                    $criteria->add(TbfilaPeer::MATRICULA, $matricula, Criteria::EQUAL);
                    if (TbfilaPeer::doCount($criteria) < 1) {
                        $criteria->clear();
                        $criteria->add(TbhistoricoPeer::COD_DISCIPLINA, $oferta->getCodDisciplina(), Criteria::EQUAL);
                        $criteria->add(TbhistoricoPeer::MATRICULA, $matricula, Criteria::EQUAL);
                        $criteria->add(TbhistoricoPeer::ID_CONCEITO, array(1, 4, 6, 7, 8, 11, 13), Criteria::IN);
                        if (TbhistoricoPeer::doCount($criteria) < 1) {
                            $fila = new Tbfila();
                            $fila->setIdOferta($values['id_oferta']);
                            $fila->setMatricula($matricula);
                            $fila->setIdSituacao(1);
                            $fila->save();
                        } else {
                            $errors .= '<br>Já possui no histórico: ' . $matricula;
                        }
                    } else {
                        $errors .= '<br>Já possui na fila: ' . $matricula;
                    }
                } else {
                    $errors .= '<br>Matrícula inexistente: ' . $matricula;
                }
            }
        } catch (Exception $exc) {
            sfContext::getInstance()->getUser()->setFlash('error', 'Erro ao executar: ' . $exc->getMessage());
            return;
        }
        if ($errors != '') {
            sfContext::getInstance()->getUser()->setFlash('error', 'Erros: ' . $errors);
        } else {
            sfContext::getInstance()->getUser()->setFlash('error', 'Filas adicionadas!');
        }
    }

    public function getFields() {
        return array(
            'id_oferta' => 'ForeignKey',
            'matriculas' => 'NormalKey',
        );
    }

}