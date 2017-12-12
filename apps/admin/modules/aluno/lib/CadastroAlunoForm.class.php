<?php

/**
 * Tbaluno form.
 *
 * @package    derca
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class CadastroAlunoForm extends BaseTbalunoForm {

    private $titulo = 'Matricula de Novos Alunos';

    public function configure() {

        unset($this['id_pessoa']);
        unset($this['foto']);
        unset($this['media_geral']);
        unset($this['ch_eletiva_cursada']);
        unset($this['ch_eletiva_solicitada']);
        unset($this['ch_obrig_cursada']);
        unset($this['ch_obrig_solicitada']);
        unset($this['ch_total']);
        unset($this['id_antigo']);

        //vestibular
        unset($this['id_tipo_ingresso']);
        unset($this['dt_ingresso']);
        //aluno regular
        unset($this['dt_situacao']);
        unset($this['id_situacao']);

        unset($this['id_destino']);

        //local de trabalho
        unset($this['id_trabalho']);
        unset($this['ramal_trabalho']);
        unset($this['fone_trabalho']);
        unset($this['cep_trabalho']);


        unset($this['id_3grau']);
        unset($this['ano_concl_3grau']);




        $this->widgetSchema['matricula'] = new sfWidgetFormInput(array(), array('size' => 10));
        $this->validatorSchema['matricula'] = new sfValidatorRegex(array('pattern' => '/^[0-9]+$/', 'required' => true));

        if (!$this->isNew())
            $this->widgetSchema['matricula']->setAttribute('readonly', 'readonly');



        $this->widgetSchema['nome']->setAttribute('size', 50);

        $this->widgetSchema['celular']->setAttribute('size', 12);

        $this->widgetSchema['fone_residencial']->setAttribute('size', 12);

        $years = range(date('Y') - 10, date('Y') - 100);
        $this->widgetSchema['dt_nascimento'] = new sfWidgetFormDate(array(
                    'format' => '%day%/%month%/%year%',
                    'years' => array_combine($years, $years)
                ));

        $siglaEstados = array('', 'AC', 'AL', 'AP', 'AM', 'BA', 'CE', 'DF', 'ES', 'GO', 'MA', 'MT', 'MS', 'MG', 'PA', 'PB', 'PR', 'PE', 'PI', 'RJ', 'RN', 'RS', 'RO', 'RR', 'SC', 'SP', 'SE', 'TO');
        $this->widgetSchema['uf_nascimento'] = new sfWidgetFormChoice(array(
                    'choices' => array_combine($siglaEstados, $siglaEstados)
                ));

        $this->widgetSchema['sexo'] = new sfWidgetFormChoice(array(
                    'choices' => array(
                        'M' => 'Masculino',
                        'F' => 'Feminino'
                    ),
                    'expanded' => true,
                    'multiple' => false
                ));


        $years = range(date('Y'), date('Y') - 100);
        $this->widgetSchema['rg_dt_exped'] = new sfWidgetFormDate(array(
                    'format' => '%day%/%month%/%year%',
                    'years' => array_combine($years, $years)
                ));

        $this->widgetSchema['cpf']->setAttribute('size', 11);
        $this->widgetSchema['cpf']->setAttribute('maxlength', 11);

        $this->validatorSchema['cpf'] = new sfValidatorRegex(array('pattern' => '/^[0-9]+$/'));

        $this->widgetSchema['titulo_zona']->setAttribute('size', 4);

        $this->widgetSchema['titulo_secao']->setAttribute('size', 4);

        $this->widgetSchema['pai']->setAttribute('size', 50);

        $this->widgetSchema['mae']->setAttribute('size', 50);

        $this->widgetSchema['numero']->setAttribute('size', 4);

        $this->widgetSchema['ano_concl_2grau']->setAttribute('size', 4);

        $this->widgetSchema['id_2grau'] = new sfWidgetFormPropelChoice(array(
                    'model' => 'Tbinstexterna',
                    'add_empty' => false,
                    'order_by' => array('Descricao', 'DES'),
                    'expanded' => false,
                    'multiple' => false,
                ));
//        $this->widgetSchema['ano_concl_2grau']
        // valores padrão com form em branco

        $this->widgetSchema->setHelp('id_2grau', 'Caso não há sua ,peça ao funcionário responsavel para inclui-la');
    }

    function getTitulo() {
        return $this->titulo;
    }

}
