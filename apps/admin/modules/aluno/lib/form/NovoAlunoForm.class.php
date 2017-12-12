<?php

/**
 * Tbaluno form.
 *
 * @package    derca
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class NovoAlunoForm extends BaseTbalunoForm {

    private $title = 'Matrícula de Novos Alunos';
    private $URLPost = 'matricula/NovoAluno';

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
        //unset($this['id_tipo_ingresso']);
        unset($this['dt_ingresso']);
        unset($this['dt_situacao']);
        unset($this['id_situacao']);
        unset($this['id_destino']);
//        unset($this->widgetSchema['matricula']);
        unset($this['uf_nascimento']);
//        $this->widgetSchema['matricula']->setAttribute('readonly','readonly');
        //local de trabalho
        unset($this['id_trabalho']);
        unset($this['ramal_trabalho']);
        unset($this['fone_trabalho']);
        unset($this['cep_trabalho']);
        unset($this['cod_curso']);
        unset($this['id_3grau']);
        unset($this['ano_concl_3grau']);

        $tipos = array(
            '2' => 'VESTIBULAR',
            '24' => 'ENEM SISU',
            '5' => 'GRADUAÇÃO',
            '13' => 'TRANSFERÊNCIA'
        );

        $cursos = array(
            '162' => 'MATEMÁTICA',
            '163' => 'INFORMÁTICA',
            '12' => 'ADMINISTRAÇÃO',
            '114' => 'ANTROPOLOGIA',
            '28' => 'ARQ E URBANISMO',
            '59' => 'BIOLOGIA (B)',
            '23' => 'CIENCIAS SOCIAIS',
            '18' => 'COMUNICAÇÃO SOCIAL',
            '47' => 'DIREITO',
            '60' => 'ECONOMIA MATUTINO',
            '38' => 'ECONOMIA VESP/NOTURNO',
            '50' => 'FISICA',
            '56' => 'GEOGRAFIA',
            '78' => 'GEOLOGIA',
            '116' => 'GESTÃO TERRITORIAL INDIGENA',
            '63' => 'HISTORIA MATUTINO',
            '64' => 'HISTORIA NOTURNO',
            '79' => 'INTERCULTURAL',
            '110' => 'LITERATURA',
            '111' => 'ESPANHOL',
            '112' => 'FRANCES',
            '113' => 'INGLES',
            '55' => 'MATEMATICA (B)',
            '51' => 'MATEMATICA (L)',
            '62' => 'MEDICINA',
            '95' => 'PEDAGOGIA',
            '29' => 'PSICOLOGIA',
            '61' => 'QUIMICA',
            '66' => 'RELAÇÕES INTERNACIONAIS',
            '108' => 'SECRETARIADO',
            '62' => 'MEDICINA',
            '30' => 'ZOOTECNIA',
            '58' => 'BIOLOGIA (L)',
            '34' => 'AGRONOMIA',
            '96' => 'COMPUTAÇÃO',
            '37' => 'ENG. CIVIL',
            '109' => 'CONTABILIDADE',
'122' => 'ARTES VISUAIS',
'149' => 'ENG. ELETRICA'
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
                        'choices' => array($aluno->getIdTipoIngresso() => $tipos[$aluno->getIdTipoIngresso()])
                    ));

            $wids = array('matricula');
            foreach ($wids as $wid) {
                $this->widgetSchema[$wid]->setAttribute('readonly', 'readonly');
            }
        } else {
            // ------------  Parte superior para matricula -----------
            $pos = array();
            for ($index = 1; $index <= 50; $index++) {
                $pos[$index < 10 ? '0' . $index : '' . $index] = $index;
            }
            $this->widgetSchema['ano_ingresso'] = new sfWidgetFormChoice(array('choices' => array('2011' => '2011')));
            $this->widgetSchema['semestre'] = new sfWidgetFormChoice(array('choices' => array('1' => '1', '2' => '2')));
            $this->widgetSchema['posicao'] = new sfWidgetFormChoice(array('choices' => $pos));

            $this->validatorSchema['ano_ingresso'] = new sfValidatorString(array('required' => true));
            $this->validatorSchema['semestre'] = new sfValidatorString(array('required' => true));
            $this->validatorSchema['cod_curso'] = new sfValidatorString(array('required' => false));
            $this->validatorSchema['posicao'] = new sfValidatorString(array('required' => true));
            // --------------   fim da parte de matricula ------------------

            $this->widgetSchema['id_versao_curso'] = new sfWidgetFormChoice(array(
                        'expanded' => false,
                        'multiple' => false,
                        'label' => 'Curso',
                        'choices' => $cursos,
//                    'choices' => $result,
//                    'help' => 'Em Caso de dúvida pergunte ao funcionário do DERCA, (L) = Licenciatura <br> (B) = Bacharelado '
                    ));


            $this->widgetSchema['sexo'] = new sfWidgetFormChoice(array(
                        'choices' => array(
                            'M' => 'Masculino',
                            'F' => 'Feminino'
                        ),
                        'expanded' => true,
                        'multiple' => false
                    ));


            $this->widgetSchema['id_tipo_ingresso'] = new sfWidgetFormChoice(array(
                        'expanded' => false,
                        'multiple' => false,
                        'choices' => $tipos
                    ));

            $this->widgetSchema['semestre']->setDefault(sfContext::getInstance()->getUser()->getAttribute('semestre'));
            $this->widgetSchema['ano_ingresso']->setDefault(sfContext::getInstance()->getUser()->getAttribute('ano_ingresso'));
            $this->widgetSchema['posicao']->setDefault(sfContext::getInstance()->getUser()->getAttribute('posicao'));
        }

        $this->widgetSchema['nome']->setAttribute('size', 50);
        $this->widgetSchema['celular']->setAttribute('size', 12);
        $this->widgetSchema['fone_residencial']->setAttribute('size', 12);

        $years = range(date('Y') - 10, date('Y') - 100);
        $this->widgetSchema['dt_nascimento'] = new sfWidgetFormDate(array(
                    'format' => '%day%/%month%/%year%',
                    'years' => array_combine($years, $years)
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

        //        $this->widgetSchema['ano_concl_2grau']
        // valores padrão com form em branco

        $this->widgetSchema->setHelp('id_2grau', 'Para pesquisar, clique na lupa e digite parte do nome da sua escola em MAIUSCULA.<br>Caso não exista a sua Instituição, peça ao funcionário responsável para incluí-la.<BR> você pode tentar com acento,sem acento pois pode existir variações');
        $this->widgetSchema->setHelp('cep', 'Para pesquisar, clique na lupa e digite parte do seu endereço em MAIUSCULA.<br>Caso não exista , peça ao funcionário responsável para incluí-lo<BR> você pode tentar com acento,sem acento pois pode existir variações');
        $this->widgetSchema->setHelp('naturalidade', 'Para pesquisar, clique na lupa e digite parte do sua cidade natal em MAIUSCULA.<br>Caso não exista , peça ao funcionário responsável para incluí-lo<BR> você pode tentar com acento,sem acento pois pode existir variações');
        $this->widgetSchema->setHelp('email', 'Cadastre um email valido pois o DERCA poderá entrar em contato com você');
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
                    'multiple' => false
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

}
