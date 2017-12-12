<?php

/**
 * Tbaluno form.
 *
 * @package    derca
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class AlunoMatriculaForm extends BaseTbalunomatriculaForm {

    private $title = 'Matrícula de Novos Alunos';
    private $URLPost = 'vestibular2013/NovoAluno';

    public function configure() {

        unset($this['id_pessoa']);
        //vestibular
        //unset($this['id_tipo_ingresso']);
        unset($this['dt_ingresso']);
        unset($this['dt_situacao']);
        unset($this['id_situacao']);
//        unset($this->widgetSchema['matricula']);
        unset($this['uf_nascimento']);
//        $this->widgetSchema['matricula']->setAttribute('readonly','readonly');

        $tipos = array(
            '23' => 'PROCESSO SELETIVO',
            '2' => 'VESTIBULAR',
            '32' => 'VESTIBULAR (RENDA - AUTODECLARADO)',
            '31' => 'VESTIBULAR (RENDA - NÃO AUTODECLARADO)',
            '33' => 'VESTIBULAR (AUTODECLARADO)',
            '34' => 'VESTIBULAR (NÃO AUTODECLARADO)',
            '35' => 'VESTIBULAR (PNE)',
            '36' => 'VESTIBULAR (INDÍGENA)',
            '24' => 'ENEM SISU',
            '28' => 'ENEM SISU (PNE)',
            '29' => 'ENEM SISU (RENDA)',
            '30' => 'ENEM SISU (ESCOLA PÚBLICA)',
            '22' => 'PROCESSO SELETIVO INDÍGENA',
            '5' => 'GRADUAÇÃO',
            '6' => 'ALUNO ESPECIAL',
            '13' => 'TRANSFERÊNCIA'
        );

        $cursos = array(
            '194' => 'TECNÓLOGO EM AGROECOLOGIA',
            '162' => 'UAB - LICENCIATURA EM MATEMÁTICA',
            '163' => 'UAB - LICENCIATURA EM INFORMÁTICA',
            '12' => 'ADMINISTRAÇÃO',
            '34' => 'AGRONOMIA',
            '215' => 'ANTROPOLOGIA',
            '213' => 'ARQUITETURA E URBANISMO',
            '159' => 'ARTES VISUAIS',
            '173' => 'CIÊNCIAS BIOLÓGICAS - BACHARELADO',
            '174' => 'CIÊNCIAS BIOLÓGICAS - LICENCIATURA',
            '23' => 'CIÊNCIAS SOCIAIS',
            '175' => 'COMUNICAÇÃO SOCIAL',
            '47' => 'DIREITO',
            '228' => 'ECONOMIA - MATUTINO',
            '229' => 'ECONOMIA - VESPERTINO/NOTURNO',
            '232' => 'FÍSICA',
            '231' => 'GEOGRAFIA - BACHARELADO',
            '230' => 'GEOGRAFIA - LICENCIATURA',
            '78' => 'GEOLOGIA',
            '116' => 'GESTÃO TERRITORIAL INDÍGENA',
            '198' => 'GESTÃO EM SAÚDE COLETIVA INDÍGENA',
            '166' => 'HISTÓRIA - MATUTINO',
            '167' => 'HISTÓRIA - NOTURNO',
            '79' => 'INTERCULTURAL',
            '110' => 'LETRAS - LITERATURA',
            '111' => 'LETRAS - ESPANHOL',
            '112' => 'LETRAS - FRANCÊS',
            '113' => 'LETRAS - INGLÊS',
            '220' => 'LETRAS - LIBRAS',
            '182' => 'MATEMÁTICA - BACHARELADO',
            '183' => 'MATEMÁTICA - LICENCIATURA',
//            '62' => 'MEDICINA',
            '236' => 'MEDICINA',
            '197' => 'MEDICINA VETERINÁRIA',
            '214' => 'MÚSICA',
            '95' => 'PEDAGOGIA',
            '216' => 'PSICOLOGIA',
//            '61' => 'QUÍMICA',
            '179' => 'QUÍMICA',
            '66' => 'RELAÇÕES INTERNACIONAIS',
            '108' => 'SECRETARIADO',
            '62' => 'MEDICINA',
            '30' => 'ZOOTECNIA',
            '96' => 'CIÊNCIA DA COMPUTAÇÃO',
            '37' => 'ENGENHARIA CIVIL',
            '235' => 'CONTABILIDADE',
            '233' => 'ENGENHARIA ELÉTRICA',
            '177' => 'ENFERMAGEM',
            '185' => 'MESTRADO EM DESENVOLVIMENTO REGIONAL DA AMAZÔNIA',
            '180' => 'MESTRADO PROFISSIONAL EM MATEMÁTICA - PROFMAT',
            '187' => 'PROGRAMA DE PÓS-GRADUAÇÃO EM SOCIEDADE E FRONTEIRAS - PPGSOF'
        );

        if (sfContext::getInstance()->getUser()->getAttribute('import')) {
            $aluno = sfContext::getInstance()->getUser()->getAttribute('novo_aluno');
            $this->widgetSchema['matricula'] = new sfWidgetFormInput();
            $this->validatorSchema['matricula'] = new sfValidatorString();
            $this->widgetSchema['id_versao_curso'] = new sfWidgetFormChoice(array(
                        'expanded' => false,
                        'multiple' => false,
                        'label' => 'Curso',
                        'choices' => array($aluno->getIdVersaoCurso() => $cursos[$aluno->getIdVersaoCurso()])
                    ));
            $this->widgetSchema['id_tipo_ingresso'] = new sfWidgetFormChoice(array(
                        'expanded' => false,
                        'multiple' => false,
                        'choices' => array($aluno->getIdTipoIngresso() => $tipos[$aluno->getIdTipoIngresso()]),
                        'label' => 'Tipo de Ingresso',
                    ));

            $this->widgetSchema['id_polo'] = new sfWidgetFormChoice(array(
                        'choices' => array(
                            $aluno->getIdPolo() => TbpolosPeer::retrieveByPK($aluno->getIdPolo())
                        ),
                        'expanded' => false,
                        'multiple' => false,
                        'label' => 'Pólo'
                ));
            $this->widgetSchema['sexo'] = new sfWidgetFormChoice(array(
                        'choices' => array(
                            'M' => 'Masculino',
                            'F' => 'Feminino'
                        ),
                        'expanded' => true,
                        'multiple' => false
                    ));

            $wids = array('matricula');
            foreach ($wids as $wid) {
                $this->widgetSchema[$wid]->setAttribute('readonly', 'readonly');
            }
        }

        $this->widgetSchema['nome']->setAttribute('size', 50);
        $this->widgetSchema['celular']->setAttribute('size', 12);
        $this->widgetSchema['fone_residencial']->setAttribute('size', 12);

        $years = range(date('Y') - 10, date('Y') - 100);
        $this->widgetSchema['dt_nascimento'] = new sfWidgetFormDate(array(
                    'format' => '%day%/%month%/%year%',
                    'years' => array_combine($years, $years),
                    'label' => 'Data de Nascimento'
                ));

        $years = range(date('Y'), date('Y') - 100);
        $this->widgetSchema['rg_dt_exped'] = new sfWidgetFormDate(array(
                    'format' => '%day%/%month%/%year%',
                    'years' => array_combine($years, $years),
                    'label' => 'Data de Expedição do RG'
                ));

        $this->widgetSchema['cpf']->setLabel('CPF');
        $this->widgetSchema['cpf']->setAttribute('size', 11);
        $this->widgetSchema['cpf']->setAttribute('maxlength', 11);
        $this->widgetSchema['cpf']->setAttribute('readonly', 'readonly');
        $this->validatorSchema['cpf'] = new sfValidatorRegex(array('pattern' => '/^[0-9]+$/'));

        $this->widgetSchema['titulo_zona']->setAttribute('size', 4);
        $this->widgetSchema['titulo_zona']->setLabel('Zona Eleitoral');
        $this->widgetSchema['titulo_secao']->setAttribute('size', 4);
        $this->widgetSchema['titulo_secao']->setLabel('Seção Eleitoral');

        $this->widgetSchema['pai']->setAttribute('size', 50);
        $this->widgetSchema['pai']->setLabel('Nome do Pai');
        $this->widgetSchema['mae']->setAttribute('size', 50);
        $this->widgetSchema['mae']->setLabel('Nome da Mãe');

        $this->widgetSchema['numero']->setAttribute('size', 4);
        $this->widgetSchema['ano_concl_2grau']->setAttribute('size', 4);
        $this->widgetSchema['ano_concl_2grau']->setLabel('Ano de Conclusão do Ensino Médio');

        $crit_cidade = new Criteria();
        $crit_cidade->addAscendingOrderByColumn(TbcidadePeer::DESCRICAO);
        $this->widgetSchema['naturalidade'] = new sfWidgetFormPropelChoice(array('model' => 'Tbcidade', 'add_empty' => false, 'criteria' => $crit_cidade));

        $crit_cep = new Criteria();
        $crit_cep->addAscendingOrderByColumn(TblogradouroPeer::CEP);
        $this->widgetSchema['cep'] = new sfWidgetFormPropelChoice(array('model' => 'Tblogradouro', 'add_empty' => false, 'key_method' => 'getCep', 'criteria' => $crit_cep, 'label' => 'CEP'));

        $crit_escola = new Criteria();
        $crit_escola->addAscendingOrderByColumn(TbinstexternaPeer::DESCRICAO);
        $this->widgetSchema['id_2grau'] = new sfWidgetFormPropelChoice(array('model' => 'Tbinstexterna', 'add_empty' => true, 'criteria' => $crit_escola, 'label' => 'Instituição de Conclusão do 2ºGrau'));

        $this->widgetSchema['id_neces_especial']->setLabel('Necessidade Especial');
        $this->widgetSchema['fone_residencial']->setLabel('Telefone Residencial');
        $this->widgetSchema['celular']->setLabel('Telefone Celular');
        $this->widgetSchema['id_neces_especial']->setLabel('Necessidade Especial');
        $this->widgetSchema['id_raca']->setLabel('Raça/Cor');
        $this->widgetSchema['rg']->setLabel('RG');
        $this->widgetSchema['rg_org_exped']->setLabel('Órgão Emissor do RG');
        $this->widgetSchema['email']->setLabel('E-mail');
        //        $this->widgetSchema['ano_concl_2grau']
        // valores padrão com form em branco

        $this->widgetSchema->setHelp('id_2grau', 'Para pesquisar, clique na lupa, digite parte do nome da sua escola em letras MAIÚSCULAS, e aperte a tecla TAB.<br>Exemplos: ANA LIBÓRIA, MONTEIRO, CENTRO FEDERAL.<br>Caso não encontre, deixe em branco e informe o ocorrido na entrega dos documentos no DERCA.');
        $this->widgetSchema->setHelp('cep', 'Para pesquisar, clique na lupa, digite parte do seu endereço em letras MAIÚSCULAS, e aperte a tecla TAB.<br>Exemplos: VIA DAS FLORES, VILLE ROY, ACÁCIAS.<br>Caso não encontre, use o CEP 69000000, e informe o ocorrido na entrega dos documentos no DERCA.');
        $this->widgetSchema->setHelp('naturalidade', 'Para pesquisar, clique na lupa, digite parte do nome da sua cidade natal em letras MAIÚSCULAS, e aperte a tecla TAB.<br>Exemplos: BOA VISTA, RORAINÓPOLIS, AMAJARI.<br>Caso não encontre, informe o ocorrido na entrega dos documentos no DERCA.');
        $this->widgetSchema->setHelp('email', 'Cadastre um email valido pois o DERCA poderá entrar em contato com você.');
        //$this->widgetSchema->setHelp('id_versao_curso', '(L) = Licenciatura, (B) = Bacharelado ');

        $this->widgetSchema['estado_civil'] = new sfWidgetFormChoice(array(
                    'choices' => array(
                        'Solteiro' => 'Solteiro',
                        'Casado' => 'Casado',
                        'Divorciado' => 'Divorciado',
                        'Viuvo' => 'Viúvo',
                        'União Estável' => 'União Estável'
                    ),
                    'expanded' => false,
                    'multiple' => false,
                    'label' => 'Estado Civil'
                ));
    }

    function getURLPost() {
        return $this->URLPost;
    }

    function setURLPost($v) {
        $this->URLPost = $v;
    }

    function getTitle() {
        return $this->title;
    }

    function setTitle($t) {
        $this->title = $t;
    }

    function getFormFields() {
        return $this->formFields;
    }

}
