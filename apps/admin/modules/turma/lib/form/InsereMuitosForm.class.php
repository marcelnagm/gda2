<?php

class InsereMuitosForm extends sfForm {

    public function configure() {

        $this->widgetSchema['matriculas'] = new sfWidgetFormTextarea();
        $this->validatorSchema['matriculas'] = new sfvalidatorRegex(array('pattern' => '/^[0-9]+(,[0-9]+)*$/'));

        $criteria = new Criteria();
        $criteria->addJoin(TbturmaPeer::ID_PERIODO, TbperiodoPeer::ID_PERIODO);
        $criteria->add(TbperiodoPeer::ANO, 2011, Criteria::GREATER_EQUAL);
        $this->widgetSchema['id_turma'] = new sfWidgetFormPropelChoice(array('model' => 'Tbturma', 'add_empty' => false, 'criteria' => $criteria));
        $this->validatorSchema['id_turma'] = new sfValidatorPropelChoice(array('model' => 'Tbturma', 'column' => 'id_turma'));

        $this->widgetSchema->setNameFormat('insereMuitos[%s]');
    }

    function save() {
        $criteria = new Criteria();
        $errors = '';
        $values = $this->getValues();
        $oferta = TbturmaPeer::retrieveByPK($values['id_turma']);
        try {
            $list = (explode(',', $values['matriculas']));
            foreach ($list as $matricula) {
                $turma_aluno = new TbturmaAluno();
                $turma_aluno->setIdTurma($values['id_turma']);
                $turma_aluno->setMatricula($matricula);
                $turma_aluno->save();
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
            'id_turma' => 'ForeignKey',
            'matriculas' => 'NormalKey',
        );
    }

}