<?php

/**
 * Tbaluno form.
 *
 * @package    derca
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class TbalunoForm extends BaseTbalunoForm {
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

        $this->widgetSchema['matricula'] = new sfWidgetFormInput(array(),array('size' => 10));
        $this->validatorSchema['matricula'] = new sfValidatorRegex(array('pattern'=>'/^[0-9]+$/', 'required' => true));
        
        if( ! $this->isNew() ) $this->widgetSchema['matricula']->setAttribute('readonly','readonly');

        $this->widgetSchema['nome']->setAttribute('size',50);

        $this->widgetSchema['celular']->setAttribute('size',12);

        $this->widgetSchema['fone_residencial']->setAttribute('size',12);

        $years = range(date('Y') - 10, date('Y') - 100);
        $this->widgetSchema['dt_nascimento'] = new sfWidgetFormDate(array(
                        'format'=>'%day%/%month%/%year%',
                        'years' => array_combine($years, $years)
        ));

        $siglaEstados = array('','AC', 'AL', 'AP', 'AM', 'BA', 'CE', 'DF', 'ES', 'GO', 'MA', 'MT', 'MS', 'MG', 'PA', 'PB', 'PR', 'PE', 'PI', 'RJ', 'RN', 'RS', 'RO', 'RR', 'SC', 'SP', 'SE', 'TO');
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

        $this->widgetSchema['estado_civil'] = new sfWidgetFormChoice(array(
                        'choices' => array(
                                'Solteiro' => 'Solteiro',
                                'Casado' => 'Casado',
                                'Divorciado' => 'Divorciado',
                                'Viuvo' => 'Viúvo',
                                'União Estável' => 'União Estável'
                        ),
                        'expanded' => false,
                        'multiple' => false
        ));


        $years = range(date('Y'), date('Y') - 100);
        $this->widgetSchema['rg_dt_exped'] = new sfWidgetFormDate(array(
                        'format'=>'%day%/%month%/%year%',
                        'years' => array_combine($years, $years)
        ));

        $this->widgetSchema['cpf']->setAttribute('size',11);
        $this->widgetSchema['cpf']->setAttribute('maxlength',11);

        $this->validatorSchema['cpf'] = new sfValidatorRegex(array('pattern'=>'/^[0-9]+$/'));

        $this->widgetSchema['titulo_zona']->setAttribute('size',4);

        $this->widgetSchema['titulo_secao']->setAttribute('size',4);

        $this->widgetSchema['pai']->setAttribute('size',50);

        $this->widgetSchema['mae']->setAttribute('size',50);

        $this->widgetSchema['numero']->setAttribute('size',4);

        $this->widgetSchema['ano_concl_2grau']->setAttribute('size',4);

        $this->widgetSchema['ano_concl_3grau']->setAttribute('size',4);

        $this->widgetSchema['ramal_trabalho']->setAttribute('size',4);
        
        $this->widgetSchema['enade']->setLabel('Fez o ENADE?');
        $this->widgetSchema['pai']->setLabel('Nome do Pai');
        $this->widgetSchema['mae']->setLabel('Nome da Mãe');
        $this->widgetSchema['id_polo']->setLabel('Pólo');
        $this->widgetSchema['id_neces_especial']->setLabel('Necessidade Especial');
        $this->widgetSchema['fone_residencial']->setLabel('Telefone Residencial');
        $this->widgetSchema['celular']->setLabel('Telefone Celular');
        $this->widgetSchema['id_neces_especial']->setLabel('Necessidade Especial');
        $this->widgetSchema['id_raca']->setLabel('Raça/Cor');
        $this->widgetSchema['rg']->setLabel('RG');
        $this->widgetSchema['rg_org_exped']->setLabel('Órgão Emissor do RG');
        $this->widgetSchema['email']->setLabel('E-mail');
        $this->widgetSchema['titulo_zona']->setLabel('Zona Eleitoral');
        $this->widgetSchema['titulo_secao']->setLabel('Seção Eleitoral');
        
        $this->widgetSchema['rg_org_exped']->setAttribute('size',20);
        $this->validatorSchema['rg_org_exped'] = new sfValidatorString(array('max_length' => 20, 'required' => false));

        // valores padrão com form em branco
        if( $this->isNew() ) {
            $this->widgetSchema['id_situacao']->setDefault(0); //Situacao: aluno regular
            $this->widgetSchema['id_tipo_ingresso']->setDefault(2); //Ingresso: vestibular
        }

    }
}
