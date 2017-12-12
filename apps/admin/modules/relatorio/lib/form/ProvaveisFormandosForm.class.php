<?php

/**
 * Description of ProvaveisFormandosForm
 *
 * Validates a report form.
 *
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 */
class ProvaveisFormandosForm extends RelatorioForm {

    protected $tipo = 'Lista';
    protected $titulo = 'Lista de prováveis formandos';
    protected $descricao = 'Alunos que estão com a carga horária igual ou maior à da versão do curso correspondente<br>Forma de Proceder:<br>
                            Selecione o semestre Corrente (Periodo de Aulas), que Grau você deseja que o sistema calcule ,se deseja verificar a fila e quais campos irão aparecer no relatório<br>
                            Marcando Não verificar fila, o sistema verifica APENAS o histórico, Marcando Sim o sistema verifica a Fila eletronica do perido e o Histórico do aluno'
    ;

    public function configure() {

        $criteria = new Criteria();
        $criteria->addDescendingOrderByColumn(TbperiodoPeer::ANO);
        $criteria->addDescendingOrderByColumn(TbperiodoPeer::SEMESTRE);
        $criteria->addDescendingOrderByColumn(TbperiodoPeer::PERIODO);

        $widgets['id_periodo'] = new sfWidgetFormPropelChoice(
                        array(
                            'model' => 'Tbperiodo',
                            'add_empty' => false,
                            'criteria' => $criteria,
                ));
//        $widgets['cod_curso'] = new sfWidgetFormPropelChoice(array(
//                    'label' => 'Curso(s)',
//                    'model' => 'Tbcurso',
//                    'add_empty' => false,
//                    'order_by' => array('Descricao', 'ASC'),
//                    'expanded' => false,
//                    'multiple' => true,
//                ));
        $widgets['id_nivel'] = new sfWidgetFormPropelChoice(
                        array(
                            'model' => 'Tbcursonivel',
                            'add_empty' => true
                ));

        $widgets['show_fields'] = new sfWidgetFormChoice(
                        array(
                            'choices' => $this->getModelFields(),
                            'expanded' => true,
                            'multiple' => true,
                ));

        $widgets['com_fila'] = new sfWidgetFormChoice(array('choices' => array(
                        'true' => 'Sim',
                        'false' => 'Não')
                        )

        );

        $widgets['only_formandos'] = new sfWidgetFormChoice(array('choices' => array(
                        'true' => 'Sim',
                        'false' => 'Não')
                        )

        );

        $widgets['com_fila']->setLabel('Verificar Fila?');
        $widgets['only_formandos']->setLabel('Apenas Formandos?');
        

# Validadores
        $validators['com_fila'] = new sfValidatorString();
        $validators['only_formandos'] = new sfValidatorString();
        
        //        'help', 'Marcando Não, o sistema verifica APENAS o histórico, Marcando Sim o sistema verifica a Fila eletronica do perido e o Histórico'

        $validators['id_nivel'] = new sfValidatorPropelChoice(array('model' => 'Tbcursonivel', 'column' => 'id_nivel', 'required' => false));
        $validators['id_periodo'] = new sfValidatorPropelChoice(array('model' => 'Tbperiodo', 'column' => 'id_periodo', 'required' => true));
        $validators['show_fields'] = new sfValidatorChoice(array(
                    'choices' => array_keys($this->getModelFields()),
                    'multiple' => true,
                    'required' => true
                ));
//        $validators['cod_curso'] = new sfValidatorPropelChoice(array(
//                    'model' => 'Tbcurso',
//                    'column' => 'cod_curso',
//                    'required' => true,
//                    'multiple' => true
//                ));

        $this->setWidgets($widgets);
        $this->setValidators($validators);

        $this->widgetSchema->setNameFormat('relatorio[%s]');
    }

    public function getFields() {
        return array(
            'id_periodo' => 'ForeignKey',
            'id_nivel' => 'ForeignKey',
            'com_fila' => 'Boolean',
            'only_formandos' => 'Boolean',
            'show_fields' => 'Number'
        );
    }

    /**
     * Constroi lista com campos a serem mostrados no relatorio
     *
     */
    function getModelFields() {

        $model_fields = TbalunoPeer::getFieldNames(BasePeer::TYPE_PHPNAME);

        unset(
                $model_fields[0], #IdPessoa
                $model_fields[6], #Foto
                $model_fields[47] #IdAntigo
        );
        $model_fields[7] = 'Tbcursoversao';
        $model_fields[27] = 'Tbnecesespecial';
        $model_fields[9] = 'Tbcidade';
        $model_fields[11] = 'Tbpais';
        $model_fields[24] = 'TblogradouroRelatedByCep';

        $model_fields[28] = 'Tbtipoingresso';
        $model_fields[30] = 'Tbalunosituacao';
        $model_fields[32] = 'TbinstexternaRelatedByIdDestino';
        $model_fields[33] = 'TbinstexternaRelatedById2grau';
        $model_fields[35] = 'TbinstexternaRelatedById3grau';
        $model_fields[37] = 'TbinstexternaRelatedByIdTrabalho';
        $model_fields[38] = 'TblogradouroRelatedByCepTrabalho';

        return $model_fields;
    }

    function executaRelatorio() {
        try {

            $form_values = $this->getValues();

            $result['show_fields'] = $form_values['show_fields'];
            $result['data_fields'] = $this->getModelFields();
//            TbalunoPeer::Inject();
            $result['list'] = TbalunoPeer::getProvaveisFormandos($form_values['id_periodo'], $form_values['id_nivel'],$form_values['com_fila'],$form_values['cod_curso'],$form_values['only_formandos']);
        } catch (PropelException $exc) {
#throw new Exception( utf8_decode($exc->getMessage())." SQL: ".$criteria->toString() );
            throw new Exception(utf8_decode($exc->getMessage()));
        }

        return $result;
    }

}

?>