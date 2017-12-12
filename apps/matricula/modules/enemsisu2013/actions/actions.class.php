<?php

require_once dirname(__FILE__) . '/../lib/enemsisu2013GeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/enemsisu2013GeneratorHelper.class.php';
require_once dirname(__FILE__) . '/../lib/form/AlunoMatriculaForm.class.php';

/**
 * enemsisu2013 actions.
 *
 * @package    derca
 * @subpackage enemsisu2013
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class enemsisu2013Actions extends autoEnemsisu2013Actions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */

    public function executeIndex(sfWebRequest $request) {
        if (!TbavisoPeer::isEnabled(8)) {
            sfContext::getInstance()->getUser()->setFlash('error', 'Matrículas encerradas!');
            $this->redirect('main/index');
        }
    }

    public function executeAskStatus(sfWebRequest $request) {

    }

    public function executeStatus(sfWebRequest $request) {
        if ($request->isMethod('POST')) {
            $codigo = $request->getParameter('codigo');
            $matricula = $request->getParameter('matricula');
            
            try {
                
                if (empty($codigo) || empty($matricula)) {
                    throw new Exception("Preencha todos os campos do formulário");
                }

                $criteria = new Criteria();
                $criteria->add(TbmatriculaComprovantePeer::CODIGO, $codigo);
                $criteria->add(TbmatriculaComprovantePeer::MATRICULA, $matricula);
                $comprovante = TbmatriculaComprovantePeer::doSelectOne($criteria);

                if ( ! $comprovante instanceof TbmatriculaComprovante ) {
                    throw new Exception("Dados inválidos");
                }
                
                $tipo_ingresso = $comprovante->getTbalunomatricula()->getIdTipoIngresso();
                if( ! in_array($tipo_ingresso, array(24,28,29,30,37,38,39)) ){
                    throw new Exception("Tipo de ingresso inválido para matrícula tipo ENEM/SISU");
                }
                
            } catch (Exception $exc) {
                sfContext::getInstance()->getUser()->setFlash('error', $exc->getMessage());
                $this->redirect('enemsisu2013/Status');
            }
            
            $this->comprovante = $comprovante;
            sfContext::getInstance()->getUser()->setAttribute('matricula', $comprovante->getMatricula());
            
        } else {
            $this->forward('enemsisu2013', 'AskStatus');
        }
    }

    public function executeMatricula(sfWebRequest $request) {
        if (strtotime(date('Y-m-d H:i:s')) < strtotime('2013-05-09 00:00:00')) {
            sfContext::getInstance()->getUser()->setFlash('error', 'Matrículas encerradas!');
            $this->redirect('enemsisu2013/index');
        }
        if ($request->isMethod('POST')) {
            $criteria = new Criteria();
            $criteria->add(TbalunomatriculaPeer::CPF, $request->getParameter('CPF'));
            $criteria->add(TbalunomatriculaPeer::ID_SITUACAO, array(0,13), Criteria::IN);
            $criteria->add(TbalunomatriculaPeer::ID_TIPO_INGRESSO, array(24,28,29,30,37,38,39), Criteria::IN);
            if (TbalunomatriculaPeer::doCount($criteria) == 1) {
                //selecionar aluno                
                          
                $criteria2 = new Criteria();
                $criteria2->add(TbalunomatriculaPeer::CPF, $request->getParameter('CPF'));
                $criteria2->add(TbalunomatriculaPeer::ID_SITUACAO, array(0, 13), Criteria::IN);
                if (TbalunomatriculaPeer::doCount($criteria2) > 1) {
                    $this->message = 'ERRO: O CPF ' . $request->getParameter('CPF') . ' está duplicado.';
                } else {
                    $aluno = TbalunomatriculaPeer::doSelectOne($criteria);
                    //verificar se existe algum comprovante do aluno
                    $criteria->clear();
                    $criteria->add(TbmatriculaComprovantePeer::MATRICULA, $aluno->getMatricula());
                    $criteria->add(TbmatriculaComprovantePeer::SITUACAO, '%MATRICULADO%', Criteria::ILIKE);
                    if (TbmatriculaComprovantePeer::doCount($criteria) > 0) {
                        $this->message = 'ERRO: O CPF ' . $request->getParameter('CPF') . ' já efetuou a matrícula.';
                    } else {
                        //inclui atributos e redireciona para o próximo passo
                        sfContext::getInstance()->getUser()->setAttribute('novo_aluno', $aluno);
                        sfContext::getInstance()->getUser()->setAttribute('import', true);
                        $this->redirect('enemsisu2013/NovoAluno');
                    }
                }
            } else if (TbalunomatriculaPeer::doCount($criteria) == 0) {
                $this->message = 'ERRO: O CPF ' . $request->getParameter('CPF') . ' não está cadastrado.';
            } else {
                $this->message = 'ERRO: O CPF ' . $request->getParameter('CPF') . ' está duplicado.';
            }
        }
    }

    public function executeShowAluno(sfWebRequest $request) {

        $aluno = new Tbalunomatricula();
        $aluno = sfContext::getInstance()->getUser()->getAttribute('novo_aluno');
        $special_fields = array('IdNecesEspecial' => $aluno->getTbnecesespecial()->getDescricao(),
            'Nacionalidade ' => TbpaisPeer::retrieveByPK($aluno->getNacionalidade())->getNacionalidade(),
            'IdVersaoCurso' => TbalunomatriculaPeer::getCursoLabel($aluno->getIdVersaoCurso()),
            'IdTipoIngresso' => $aluno->getTbtipoingresso()->getDescricao(),
            'IdPolo' => $aluno->getTbpolos()->getDescricao(),
            'IdSituacao' => $aluno->getTbalunosituacao()->getDescricao(),
            'DtNascimento' => $aluno->getDtNascimento('d/m/Y'),
            'Naturalidade' => $aluno->getTbcidade(),
            'Nacionalidade' => $aluno->getTbpais()->getDescricao(),
            'IdRaca' => $aluno->getTbalunoracacor()->getDescricao(),
            'Tbinstexterna' => $aluno->getTbinstexterna() ? $aluno->getTbinstexterna()->getDescricao() : '',
            'Id3grau' => $aluno->getTbinstexterna() ? $aluno->getTbinstexterna()->getDescricao() : ''
        );


        $aluno->getTbnecesespecial()->getDescricao();

        $this->tbaluno = $aluno;
        $this->fields = TbalunomatriculaPeer::getFieldNamesAlter();
        $this->special_fields = $special_fields;
        $this->title = 'Ficha do Aluno';
    }

    public function executeNovoAluno(sfWebRequest $request) {

        if (sfContext::getInstance()->getUser()->hasAttribute('novo_aluno')) {
            $form = new AlunoMatriculaForm(sfContext::getInstance()->getUser()->getAttribute('novo_aluno'));
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
                        $aluno = new Tbalunomatricula();
                        $form_values = $form->getValues();
                        $aluno = sfContext::getInstance()->getUser()->hasAttribute('novo_aluno') ? sfContext::getInstance()->getUser()->getAttribute('novo_aluno') : new Tbalunomatricula();
                        $aluno->fromArray($form_values, BasePeer::TYPE_FIELDNAME);
                        $aluno = new AlunoMatriculaForm($aluno);
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

            $aluno = new Tbalunomatricula();
            $aluno = sfContext::getInstance()->getUser()->getAttribute('novo_aluno');
            $aluno->save();

            $criteria = new Criteria();
            $criteria->add(TbmatriculaComprovantePeer::MATRICULA, $aluno->getMatricula());
            foreach (TbmatriculaComprovantePeer::doSelect($criteria) as $comp) {
                $comp->setSituacao('INVÁLIDO');
                $comp->save();
            }
            $comprovante = new TbmatriculaComprovante();
            $comprovante->setDataHora(strftime("%m/%d/%Y %H:%M:%S"));
            $comprovante->setMatricula($aluno->getMatricula());
            $comprovante->setSituacao('PRÉ-MATRICULADO');
            $comprovante->save();
            $comprovante->setCodigo($comprovante->getIdComprovante());
            $comprovante->save();
//            TbfilaPeer::MatriculaCalouros($aluno);
            sfContext::getInstance()->getUser()->setAttribute('matricula', $aluno->getMatricula());
        }
        sfContext::getInstance()->getUser()->setAttribute('novo_aluno', null);
    }

    public function executeGerarFicha(sfWebRequest $request) {
        $aluno = new tbalunomatricula();

        if (sfContext::getInstance()->getUser()->hasAttribute('novo_aluno')) {
            $aluno = sfContext::getInstance()->getUser()->getAttribute('novo_aluno');
        } else {
            $aluno = TbalunomatriculaPeer::retrieveByPK(sfContext::getInstance()->getUser()->getAttribute('matricula'));
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
        $values['uf'] = $aluno->getTbcidade() ? $aluno->getTbcidade()->getTbestado()->getUf() : '';
        $values['email'] = $aluno->getEmail();
        $values['estado_civil'] = $aluno->getEstadoCivil();
        $values['deficiencia'] = $aluno->getTbnecesespecial() ? $aluno->getTbnecesespecial()->getDescricao() : 'Nenhuma';
        $values['pai'] = $aluno->getPai();
        $values['mae'] = $aluno->getMae();
        $values['celular'] = $aluno->getCelular() . '/' . $aluno->getFoneResidencial();
        $values['cep'] = $aluno->getTblogradouro() ? $aluno->getTblogradouro()->getCep() : '';
        $values['endereco'] = $aluno->getTblogradouro() ? $aluno->getTblogradouro()->getDescricao() . "|" . $aluno->getComplemento() : '';
        $values['num'] = $aluno->getNumero();
        $values['bairro'] = $aluno->getTblogradouro() ? $aluno->getTblogradouro()->getTbbairro()->getDescricao() : '';
        $values['cidade'] = $aluno->getTblogradouro() ? $aluno->getTblogradouro()->getTbcidade()->getDescricao() : '';

        //parte de Dados Curriculares
        $curso = $aluno->getTbcursoversao()->getTbcurso();
        $values['curso'] = !in_array($aluno->getIdVersaoCurso(), $cursos_diff) ? $curso->getDescricao() : $aluno->getTbcursoversao()->getDescricao();
        $values['centro'] = $curso->getCentro();
        $values['matricula'] = $aluno->getMatricula();
        $values['tipo_ingresso'] = $aluno->getTbtipoingresso()->getDescricao();
        $values['data_ingresso'] = $aluno->getDtIngresso('d/m/Y');
        $values['turno'] = $aluno->getTbcursoversao()->getTbturno()->getDescricao();

        $values['inst_2'] = $aluno->getTbinstexterna() ? $aluno->getTbinstexterna()->getDescricao() : '';
        $values['uf_2'] = $aluno->getTbinstexterna() ? $aluno->getTbinstexterna()->getUf() : '';
        $values['ano_2'] = $aluno->getAnoConcl2grau();

        $values['inst_3'] = '';
        $values['uf_3'] = '';
        $values['ano_3'] = '';

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
        $this->aluno = TbalunomatriculaPeer::retrieveByPK(sfContext::getInstance()->getUser()->getAttribute('matricula'));

        $criteria = new Criteria();
        $criteria->add(TbmatriculaComprovantePeer::MATRICULA, sfContext::getInstance()->getUser()->getAttribute('matricula'));
        $criteria->add(TbmatriculaComprovantePeer::SITUACAO, '%MATRICULADO%', Criteria::ILIKE);
        $this->comprovante = TbmatriculaComprovantePeer::doSelectOne($criteria);
        
        if( ! $this->comprovante instanceof TbmatriculaComprovante ) {  
            throw new Exception('Não foi possível imprimir a matrícula ' . $matricula); 
        }
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
