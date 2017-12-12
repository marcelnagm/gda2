<?php

/**
 * Tbalunobackup form.
 *
 * @package    derca
 * @subpackage form
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class TbalunobackupForm extends BaseTbalunobackupForm
{
  public function configure()
  {

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

//        if( ! $this->isNew() ) $this->widgetSchema['matricula']->setAttribute('readonly','readonly');

        $this->widgetSchema['nome']->setAttribute('size',50);

        $this->widgetSchema['celular']->setAttribute('size',12);

        $this->widgetSchema['fone_residencial']->setAttribute('size',12);

        $criteria = new Criteria();
        $criteria->addJoin(TbcursoPeer::COD_CURSO, TbcursoversaoPeer::COD_CURSO);
        $criteria->add(TbcursoPeer::ID_NIVEL, array(12,13), Criteria::IN);
        $criteria->addDescendingOrderByColumn(TbcursoPeer::DESCRICAO);
        $criteria->addAscendingOrderByColumn(TbcursoversaoPeer::DESCRICAO);

        $this->widgetSchema['id_versao_curso'] = new sfWidgetFormPropelChoice(
                array('model' => 'Tbcursoversao',
                    'add_empty' => false,
                    'criteria' => $criteria));

        $years = range(date('Y'), date('Y') - 100);
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

        $this->validatorSchema['cpf'] = new sfValidatorRegex(array('pattern'=>'/^[0-9]+$/', 'required' => false));
        $this->validatorSchema['numero']->setOption('required', false);

        $this->widgetSchema['titulo_zona']->setAttribute('size',4);

        $this->widgetSchema['titulo_secao']->setAttribute('size',4);

        $this->widgetSchema['pai']->setAttribute('size',50);

        $this->widgetSchema['mae']->setAttribute('size',50);

        $this->widgetSchema['numero']->setAttribute('size',4);

        $this->widgetSchema['ano_concl_2grau']->setAttribute('size',4);

        $this->widgetSchema['ano_concl_3grau']->setAttribute('size',4);

        $this->widgetSchema['ramal_trabalho']->setAttribute('size',4);

        $criteria2 = new Criteria();
        $criteria2->add(TbtipoingressoPeer::ID_TIPO_INGRESSO, array(23,26,27), Criteria::IN);

        $this->widgetSchema['id_tipo_ingresso']->setOption('criteria', $criteria2);

        // valores padrão com form em branco
        if( $this->isNew() ) {
            $this->widgetSchema['id_situacao']->setDefault(0); //Situacao: aluno regular
            $this->widgetSchema['id_tipo_ingresso']->setDefault(23); //Ingresso: processo seletivo
        }

    }
}
