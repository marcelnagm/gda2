<?php

class MonitoresProcessForm extends sfForm {

    public function configure() {

        $this->widgetSchema['cpf'] = new sfWidgetFormTextarea();
        $this->validatorSchema['cpf'] = new sfValidatorString();

        $this->widgetSchema['tipo'] = new sfWidgetFormInput();
        $this->validatorSchema['tipo'] = new sfValidatorString();

        $this->widgetSchema->setNameFormat('monitoresProcess[%s]');
    }

    function save() {
        $criteria = new Criteria();
        $errors = '';
        $values = $this->getValues();
        try {
            $list = (explode(',', $values['cpf']));
            foreach ($list as $matricula) {
                $criteria->clear();
                $criteria->add(Censo2009Peer::ALUNO_C1, 41);
                $criteria->addAnd(Censo2009Peer::CURSO_C1_TIPO_REG2, null);
                $criteria->addAnd(Censo2009Peer::ALUNO_C5_CPF, trim(str_replace(array('.', '-'), '', '' . $matricula . '')));

                if (Censo2009Peer::doCount($criteria) < 1) {
                    $errors .= '<br>CPF inexistente: ' . $matricula;
                    continue;
                }
                $censo = Censo2009Peer::doSelectOne($criteria);

                if ($values['tipo'] == 'perm') {
                    $censo->setCursoC33ApoioSocial(1);
                    $censo->setCursoC34TipoApoioSocial(0);
                    $censo->setCursoC35TipoApoioSocial(0);
                    $censo->setCursoC36TipoApoioSocial(0);
                    $censo->setCursoC37TipoApoioSocial(0);
                    $censo->setCursoC38TipoApoioSocial(0);
                    $censo->setCursoC39TipoApoioSocial(1);
                } else if ($values['tipo'] == 'trab') {
                    $censo->setCursoC33ApoioSocial(1);
                    $censo->setCursoC34TipoApoioSocial(0);
                    $censo->setCursoC35TipoApoioSocial(0);
                    $censo->setCursoC36TipoApoioSocial(0);
                    $censo->setCursoC37TipoApoioSocial(0);
                    $censo->setCursoC38TipoApoioSocial(1);
                    $censo->setCursoC39TipoApoioSocial(0);
                } else if ($values['tipo'] == 'alim') {
                    $censo->setCursoC33ApoioSocial(1);
                    $censo->setCursoC34TipoApoioSocial(1);
                    $censo->setCursoC35TipoApoioSocial(0);
                    $censo->setCursoC36TipoApoioSocial(0);
                    $censo->setCursoC37TipoApoioSocial(0);
                    $censo->setCursoC38TipoApoioSocial(0);
                    $censo->setCursoC39TipoApoioSocial(0);
                } else if ($values['tipo'] == 'trea') {
                    $censo->setCursoC33ApoioSocial(1);
                    $censo->setCursoC34TipoApoioSocial(1);
                    $censo->setCursoC35TipoApoioSocial(0);
                    $censo->setCursoC36TipoApoioSocial(1);
                    $censo->setCursoC37TipoApoioSocial(0);
                    $censo->setCursoC38TipoApoioSocial(0);
                    $censo->setCursoC39TipoApoioSocial(0);
                } else if ($values['tipo'] == 'tran') {
                    $censo->setCursoC33ApoioSocial(1);
                    $censo->setCursoC34TipoApoioSocial(0);
                    $censo->setCursoC35TipoApoioSocial(0);
                    $censo->setCursoC36TipoApoioSocial(1);
                    $censo->setCursoC37TipoApoioSocial(0);
                    $censo->setCursoC38TipoApoioSocial(0);
                    $censo->setCursoC39TipoApoioSocial(0);
                }
                $censo->save();
            }
        } catch (Exception $exc) {
            sfContext::getInstance()->getUser()->setFlash('error', 'Erro ao executar: ' . $exc->getMessage());
        }
        if ($errors != '') {
            sfContext::getInstance()->getUser()->setFlash('error', 'Erros: ' . $errors);
        } else {
            sfContext::getInstance()->getUser()->setFlash('error', 'Monitores adicionadas!');
        }
    }

}