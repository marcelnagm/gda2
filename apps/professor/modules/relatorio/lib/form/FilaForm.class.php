<?php

/**
 * Declaração de disciplinas ministradas por professor
 * Está baseada na lista de disciplinas ofertadas
 *
 * TODO: Fazer baseada na lista de turmas
 *
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 */
class FilaForm extends RelatorioForm {

    protected $tipo = '';
    protected $titulo = 'Filas';
    protected $descricao = 'Lista de Disciplinas solicitadas';
    protected $url = 'relatorio/ListFila';

    /**
     * Variaveis para o template do ODTPHP
     * @var array
     */
    public function configure() {


//    $widgets['matricula'] = new sfWidgetFormInput();
//
//      $validators['matricula'] = new sfValidatorPropelChoice(array(
//                        'model' => 'Tbaluno',
//                        'column' => 'matricula',
//                        'required' => false,
//      ));


        $model_fields = $this->getModelFields();

        $widgets['show_fields'] = new sfWidgetFormChoice(
                        array(
                            'choices' => $model_fields,
                            'expanded' => true,
                            'multiple' => true,
                ));


        $validators['show_fields'] = new sfValidatorChoice(array(
                    'choices' => array_keys($model_fields),
                    'multiple' => true,
                    'required' => true
                ));

//        $criteria = new Criteria();
//        $criteria->add(TbperiodoPeer::SUCINTO, '%Graduação%', Criteria::LIKE);
        $widgets['periodo'] = new sfWidgetFormPropelChoice(array(
                    'model' => 'Tbperiodo',
                    'add_empty' => true,
                    'order_by' => array('Ano', 'DES'),
                    'expanded' => false,
                    'multiple' => false,
                    'label' => 'qual periodo?',
//                    'criteria' => $criteria
                ));

        $validators['periodo'] = new sfValidatorString();





        $this->setWidgets($widgets);
        $this->setValidators($validators);

        $this->widgetSchema->setNameFormat('relatorio[%s]');
    }

    function getModelFields() {
        $model_fields = array();
        $model_fields[] = 'IdFila';
        $model_fields[] = 'tboferta';
        $model_fields[] = 'Tbfilasituacao';


        return $model_fields;
    }

    public function getFields() {
        $fields = array();
//        $fields['matricula'] = 'ForeignKey';
        $fields['periodo'] = 'NormalKey';
        $fields['show_fields'] = 'Number';

        return $fields;
    }

    public function executaRelatorio() {

        $form_values = $this->getValues();
        try {

            $result['show_fields'] = $form_values['show_fields'];
            $result['data_fields'] = $this->getModelFields();


            # curso
            $criteria = new Criteria();
            $criteria->addJoin(TbfilaPeer::ID_OFERTA, TbofertaPeer::ID_OFERTA);
            $criteria->add(TbfilaPeer::MATRICULA, sfContext::getInstance()->getUser()->getAttribute("matricula"));
            $criteria->add(TbofertaPeer::ID_PERIODO, $form_values['periodo']);
            $result['aluno'] = TbalunoPeer::retrieveByPK(sfContext::getInstance()->getUser()->getAttribute("matricula"));
            $result['list'] = TbfilaPeer::doSelect($criteria);
        } catch (PropelException $exc) {
            #throw new Exception( utf8_decode($exc->getMessage())." SQL: ".$criteria->toString() );
            throw new Exception(utf8_decode($exc->getMessage()));
            sfContext::getInstance()->getUser()->setAttribute('matricula', null);
        }

        return $result;
    }

    function getLayout() {
        return false;
    }

    function getURLPost() {
        return $this->url;
    }

    function setURLPost($url) {
        $this->url = $url;
    }

}

