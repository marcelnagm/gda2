<?php

/**
 * Tbaluno form.
 *
 * @package    derca
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class LoadAlunoForm extends BaseTbalunoForm {

    private $titulo = 'Matricula de Novos Alunos';
    private $URLPost = 'matricula/NovoAluno';

    public function configure() {

//        $criteria = new Criteria();

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
        //aluno regular
        unset($this['dt_situacao']);
        unset($this['id_situacao']);
        //
        unset($this['id_destino']);
        //
        unset($this->widgetSchema['matricula']);
        unset($this['uf_nascimento']);


//        $this->widgetSchema['matricula']->setAttribute('readonly','readonly');
        //local de trabalho
        unset($this['id_trabalho']);
        unset($this['ramal_trabalho']);
        unset($this['fone_trabalho']);
        unset($this['cep_trabalho']);
        unset($this['cod_curso']);
// $this->widgetSchema['cod_curso'] = new sfWidgetFormPropelChoice(array(
//                    'model' => 'Tbcurso',
//                    'add_empty' => false,
//                    'order_by' => array('Descricao', 'ASC'),
//                    'expanded' => false,
//                    'multiple' => false,
//                    'label' => 'Codigo do Curso',
//                    'criteria' => $criteria
//                ));
//        $this->getValidator('cod_curso')->setOption('required', false);


        unset($this['id_3grau']);
        unset($this['ano_concl_3grau']);

        $pos = array();
        for ($index = 1; $index <= 50; $index++) {
            $pos[$index < 10 ? '0'.$index : ''.$index] = $index;
        }
        // ------------  Parte superior para matricula -----------
        $this->widgetSchema['ano_ingresso'] = new sfWidgetFormChoice(array('choices' => array('2011' => '2011')));
        $this->widgetSchema['semestre'] = new sfWidgetFormChoice(array('choices' => array('1' => '1', '2' => '2')));
        $this->widgetSchema['posicao'] = new sfWidgetFormChoice(array('choices' => $pos));       



        $this->validatorSchema['ano_ingresso'] = new sfValidatorString(array('required' => true));
        $this->validatorSchema['semestre'] = new sfValidatorString(array('required' => true));
        $this->validatorSchema['cod_curso'] = new sfValidatorString(array('required' => false));
        $this->validatorSchema['posicao'] = new sfValidatorString(array('required' => true));
        // --------------   fim da parte de matricula ------------------

        $this->widgetSchema['nome']->setAttribute('size', 50);

        $this->widgetSchema['celular']->setAttribute('size', 12);

        $this->widgetSchema['fone_residencial']->setAttribute('size', 12);

        $years = range(date('Y') - 10, date('Y') - 100);
        $this->widgetSchema['dt_nascimento'] = new sfWidgetFormDate(array(
                    'format' => '%day%/%month%/%year%',
                    'years' => array_combine($years, $years)
                ));
        $criteria = new Criteria();
        $criteria->addJoin(TbcursoversaoPeer::COD_CURSO, TbcursoPeer::COD_CURSO);
        $criteria->add(TbcursoversaoPeer::SITUACAO, 'ATIVO');
        $criteria->addOr(TbcursoversaoPeer::SITUACAO, 'ATIVA');
        $versoes = array(
            '12', //ADMINISTRAÇÃO
            '114', //ANTROPOLOGIA
            '28', //ARQ E URBANISMO
            '59', //BIOLOGIA (B)
            '23', //CIENCIAS SOCIAIS
            '18',// COMUNICAÇÃO SOCIAL
            '47', //DIREITO
            '60', //ECONOMIA MATUTINO
            '38', //ECONOMIA VESP/NOTURNO
            '50', //FISICA
            '56', //GEOGRAFIA
            '78', //GEOLOGIA
            '116', //GESTÃO TERRITORIAL INDIGENA
            '63', //HISTORIA MATUTINO
            '64', //HISTORIA NOTURNO
            '90', // INTERCULTURAL
            '110', //LITERATURA
            '111',  //ESPANHOL
            '112', //FRANCES
            '113', //INGLES
            '55', //MATEMATICA (B)
            '51', //MATEMATICA (L)
            '62', //MEDICINA
            '95', //PEDAGOGIA
            '29', //PSICOLOGIA
            '61', //QUIMICA
            '66', //RELAÇÕES INTERNACIONAIS
            '108', //SECRETARIADO
            '62', //MEDICINA
            '30', //ZOOTECNIA
            '58', // BIOLOGIA (L)
            '34', //AGRONOMIA
            '96', // COMPUTAÇÃO
            '37', // ENG. CIVIL
            '109' //CONTABILIDADE
        );

        //versões de cursos onde irá aparecer a descricao da VERSÂO não a do curso
        $cursos_diff = array('51', '55',
            '113', '112', '111',
            '110', '63', '64',
            '60', '38', '56', '58', '59'
        );
        $criteria->addAnd(TbcursoversaoPeer::ID_VERSAO_CURSO, $versoes, Criteria::IN);
        $criteria->addAscendingOrderByColumn(TbcursoversaoPeer::DESCRICAO);
        $result = TbcursoversaoPeer::retrieveByPKs($versoes);

        $cursos = array();
        $curso = new Tbcursoversao();
        foreach ($result as $curso) {
            if (in_array($curso->getIdVersaoCurso(), $cursos_diff)) {
                   $cursos[$curso->getIdVersaoCurso()] = $curso->getDescricao();
            } else {
                $cursos[$curso->getIdVersaoCurso()] = $curso->getTbcurso()->getDescricao();
            }
        }


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

        $this->widgetSchema->setHelp('id_2grau', 'Caso não haja a sua Instituição ,peça ao funcionário responsavel para inclui-la/Cadastra-la');
        $this->widgetSchema->setHelp('cep', 'Caso não haja o seu endereço ,peça ao funcionário responsavel para inclui-lo/Cadastra-lo');
        $this->widgetSchema->setHelp('id_versao_curso', 'Em Caso de dúvida pergunte ao funcionário do DERCA, (L) = Licenciatura <br> (B) = Bacharelado ');

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

        $criteria = new Criteria();
        $criteria->add(TbtipoingressoPeer::ID_TIPO_INGRESSO,array(2,24),  Criteria::IN);
        $this->widgetSchema['id_tipo_ingresso']->setOption('criteria', $criteria);


        $this->widgetSchema['semestre']->setDefault(sfContext::getInstance()->getUser()->getAttribute('semestre'));
        $this->widgetSchema['ano_ingresso']->setDefault(sfContext::getInstance()->getUser()->getAttribute('ano_ingresso'));
        $this->widgetSchema['posicao']->setDefault(sfContext::getInstance()->getUser()->getAttribute('posicao'));
        

    }

    function getURLPost() {
        return $this->URLPost;
    }

    function setURLPost($v) {
        $this->URLPost = $v;
    }

}
