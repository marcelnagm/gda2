<?php

require_once dirname(__FILE__) . '/../lib/vestibularGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/vestibularGeneratorHelper.class.php';
require_once dirname(__FILE__) . '/../lib/form/NovoAlunoForm.class.php';

/**
 * vestibular actions.
 *
 * @package    derca
 * @subpackage vestibular
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class vestibularActions extends autoVestibularActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {

    }

    public function executeMatricula(sfWebRequest $request) {

        if ($request->isMethod('POST')) {
            $criteria = new Criteria();
            $criteria->add(TbalunoPeer::CPF, $request->getParameter('CPF'));
            $criteria->add(TbalunoPeer::ID_SITUACAO, array(1, 2, 3, 4, 6, 15, 18, 16), Criteria::NOT_IN);
            $criteria->addJoin(TbalunoPeer::ID_VERSAO_CURSO, TbcursoversaoPeer::ID_VERSAO_CURSO);
            $criteria->addJoin(TbcursoversaoPeer::COD_CURSO, TbcursoPeer::COD_CURSO);
            $criteria->add(TbcursoPeer::ID_NIVEL, 1, Criteria::EQUAL);
            if (TbalunoPeer::doCount($criteria) == 0) {
                $criteria->clear();
                $criteria->add(TbloadalunoPeer::CPF, $request->getParameter('CPF'));
                $criteria->add(TbloadalunoPeer::OPCAO, '%MATRICULA%', Criteria::LIKE);
                if (TbloadalunoPeer::doCount($criteria) == 1) {
                    $temp = TbloadalunoPeer::doSelectOne($criteria);
                    $aluno = new Tbaluno();
                    $aluno->setNome($temp->getNome());
                    $aluno->setCpf($temp->getCpf());
                    $aluno->setIdTipoIngresso($temp->getIdTipoIngresso());
                    $aluno->setIdSituacao($temp->getIdSituacao());
                    $aluno->setIdVersaoCurso($temp->getIdVersaoCurso());
                    $aluno->setMatricula($temp->getMatricula());
                    $aluno->setRg($temp->getRg());
                    $aluno->setRgOrgExped($temp->getRgOrgExped());
                    $aluno->setSexo($temp->getSexo());
                    sfContext::getInstance()->getUser()->setAttribute('novo_aluno', $aluno);
                    sfContext::getInstance()->getUser()->setAttribute('import', true);
                    $this->redirect('vestibular/NovoAluno');
                } else if (TbloadalunoPeer::doCount($criteria) == 0) {
                    $this->message = 'ERRO: O CPF '. $request->getParameter('CPF') . ' não está cadastrado.';
                } else {
                    $this->message = 'ERRO: O CPF '. $request->getParameter('CPF') . ' está duplicado.';
                }
            } else {
                $this->message = 'ERRO: O CPF '. $request->getParameter('CPF') . ' já possui matrícula na UFRR.';
            }
        }
    }

    public function executeNovoAluno(sfWebRequest $request) {

        if (sfContext::getInstance()->getUser()->hasAttribute('novo_aluno')) {
            $form = new NovoAlunoForm(sfContext::getInstance()->getUser()->getAttribute('novo_aluno'));
        }
        if (!sfContext::getInstance()->getUser()->hasAttribute('import'))
            $form->getValidatorSchema()->setPostValidator(new sfMatriculaValidator());

        if ($request->isMethod(sfRequest::POST)) {
            //verifca se esta sendo acessado ou postado
            if ($request->hasParameter($form->getName())) {
                $form->bind($request->getParameter($form->getName()));
                if ($form->isValid()) {
                    //valida o formulário
                    try {
                        $aluno = new tbaluno();
                        $form_values = $form->getValues();
                        $aluno = sfContext::getInstance()->getUser()->hasAttribute('novo_aluno') ? sfContext::getInstance()->getUser()->getAttribute('novo_aluno') : new Tbaluno();
                        $aluno->fromArray($form_values, BasePeer::TYPE_FIELDNAME);
                        $aluno = new NovoAlunoForm($aluno);
                        if (!sfContext::getInstance()->getUser()->getAttribute('import')) {
                            sfContext::getInstance()->getUser()->setAttribute('novo_aluno', $aluno);
                        }
                    } catch (Exception $exc) {
                        //erro que aparece dentro do template
                        $this->message = 'Erro ao Cadastrar o Aluno - ' . $exc->getMessage();
                    }
                } else {
                    //erro que aparece dentro do template
                    $this->message = $form->getErrorSchema()->getMessage();
                }
            }
        } else {
            //insere form caso seja só acessado
            $this->form = $form;
            sfContext::getInstance()->getUser()->setAttribute('matricula', null);
        }
    }

    public function executeFinalizarMatricula(sfWebRequest $request) {
        if (sfContext::getInstance()->getUser()->getAttribute('novo_aluno')) {
            $aluno = new Tbaluno();
            $aluno = sfContext::getInstance()->getUser()->getAttribute('novo_aluno');
            $aluno->save();
            TbfilaPeer::MatriculaCalouros($aluno);
            sfContext::getInstance()->getUser()->setAttribute('matricula', $aluno->getMatricula());
        }
        sfContext::getInstance()->getUser()->setAttribute('novo_aluno', null);
    }

    public function executeGerarFicha(sfWebRequest $request) {
        $aluno = new tbaluno();

        if (sfContext::getInstance()->getUser()->hasAttribute('novo_aluno')) {
            $aluno = sfContext::getInstance()->getUser()->getAttribute('novo_aluno');
        } else {
            $aluno = TbalunoPeer::retrieveByPK(sfContext::getInstance()->getUser()->getAttribute('matricula'));
        }

        $cursos_diff = array('51', '55',
            '113', '112', '111',
            '110', '63', '64',
            '60', '38', '56', '21'
        );

        $values['nome'] = $aluno->getNome();
        $values['sexo'] = $aluno->getSexo() == 'M' ? 'Masculino' : 'Feminino';
        $values['data_nascimento'] = $aluno->getDtNascimento('d/m/Y');
        $values['municipio_nas'] = $aluno->getTbcidade() ? $aluno->getTbcidade()->getDescricao() : '';
        $values['uf'] = $aluno->getUfNascimento(); //UF de nascimento
        $values['email'] = $aluno->getEmail();
        $values['estado_civil'] = $aluno->getEstadoCivil();
        $values['deficiencia'] = $aluno->getTbnecesespecial() ? $aluno->getTbnecesespecial()->getDescricao() : 'Nenhuma';
        $values['pai'] = $aluno->getPai();
        $values['mae'] = $aluno->getMae();
        $values['celular'] = $aluno->getCelular() . '/' . $aluno->getFoneResidencial();
        $values['cep'] = $aluno->getTblogradouroRelatedByCep() ? $aluno->getTblogradouroRelatedByCep()->getCep() : '';
        $values['endereco'] = $aluno->getTblogradouroRelatedByCep() ? $aluno->getTblogradouroRelatedByCep()->getDescricao() . "|" . $aluno->getComplemento() : '';
        $values['num'] = $aluno->getNumero();
        $values['bairro'] = $aluno->getTblogradouroRelatedByCep() ? $aluno->getTblogradouroRelatedByCep()->getTbbairro()->getDescricao() : '';
        $values['cidade'] = $aluno->getTblogradouroRelatedByCep() ? $aluno->getTblogradouroRelatedByCep()->getTbcidade()->getDescricao() : '';

        //parte de Dados Curriculares
        $curso = $aluno->gettbcurso();
        $values['curso'] = !in_array($aluno->getIdVersaoCurso(), $cursos_diff) ? $curso->getDescricao() : $aluno->getTbcursoversao()->getDescricao();
        $values['centro'] = $curso->getCentro();
        $values['matricula'] = $aluno->getMatricula();
        $values['tipo_ingresso'] = $aluno->getTbtipoingresso()->getDescricao();
        $values['data_ingresso'] = $aluno->getDtIngresso('d/m/Y');
        $values['turno'] = $aluno->getTbcursoversao()->getTbturno()->getDescricao();

        $values['inst_2'] = $aluno->getTbinstexternaRelatedById2grau() ? $aluno->getTbinstexternaRelatedById2grau()->getDescricao() : '';
        $values['uf_2'] = $aluno->getTbinstexternaRelatedById2grau() ? $aluno->getTbinstexternaRelatedById2grau()->getUf() : '';
        $values['ano_2'] = $aluno->getAnoConcl2grau();

        $values['inst_3'] = $aluno->getTbinstexternaRelatedById3grau() ? $aluno->getTbinstexternaRelatedById3grau()->getDescricao() : '';
        $values['uf_3'] = $aluno->getTbinstexternaRelatedById3grau() ? $aluno->getTbinstexternaRelatedById3grau()->getUf() : '';
        $values['ano_3'] = $aluno->getAnoConcl3grau() ? $aluno->getAnoConcl3grau() : '';

        //parte de Documentos
        $values['rg'] = $aluno->getRg();
        $values['rg_exp'] = $aluno->getRgOrgExped();
        $values['dt_exp'] = $aluno->getRgDtExped('d/m/Y');
        $values['cpf'] = $aluno->getCpf();
        $values['titulo'] = $aluno->getTitulo();
        $values['zon'] = $aluno->getTituloZona();
        $values['sec'] = $aluno->getTituloSecao();
        $values['reservista'] = $aluno->getReservista() ? $aluno->getReservista() : '';
        $this->values = $values;
        $this->template = 'ficha';
    }

    public function executeImprimir(sfWebRequest $request) {
        $this->setLayout(false);
        if ($request->hasParameter('matricula')) {
            sfContext::getInstance()->getUser()->setAttribute('matricula', $request->getParameter('matricula'));
        }
        $this->aluno = TbalunoPeer::retrieveByPK(sfContext::getInstance()->getUser()->getAttribute('matricula'));
        $this->periodo = TbperiodoPeer::getSemestreAtual($this->aluno);


        $criteria = new Criteria();
        $criteria->add(TbfilaPeer::MATRICULA, sfContext::getInstance()->getUser()->getAttribute('matricula'));
        $criteria->add(TbofertaPeer::ID_PERIODO, $this->periodo->getIdPeriodo());
        $criteria->addOr(TbofertaPeer::ID_PERIODO, 203);
        $this->filas = TbfilaPeer::doSelect($criteria);
    }

    public function executeExportar(sfWebRequest $request) {
        $sf_user = sfContext::getInstance()->getUser();
        $sf_user->getAttribute('aluno.filters', array(), 'admin_module');
        $this->filters = $this->configuration->getFilterForm($this->getFilters());
        $criteria = $this->filters->buildCriteria($this->getFilters());
        $alunos = TbalunoPeer::doSelect($criteria);
        $request->setAttribute('list', $alunos);

        $request->setAttribute('show_fields', $this->getModelFields());

        $this->forward('exportar', 'Exportar');
    }

    public function getModelFields() {
        $fields = array('Nome', 'Matricula', 'Cpf', 'tbcursoversao', 'tbtipoingresso', 'Tbalunosituacao');
        return $fields;
    }

}
