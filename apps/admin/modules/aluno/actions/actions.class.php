<?php

require_once dirname(__FILE__) . '/../lib/alunoGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/alunoGeneratorHelper.class.php';
require_once dirname(__FILE__) . '/../lib/form/NovoAlunoForm.class.php';

/**
 * aluno actions.
 *
 * @package    derca
 * @subpackage aluno
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class alunoActions extends autoAlunoActions {

    function executeSelecionaCPF(sfWebRequest $request) {

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
                    $this->redirect('matricula/NovoAluno');
                } else {
                    $this->message = 'Erro ao Selecionar ' . $request->getParameter('CPF');
                }
            } else {
                $this->message = 'Erro, Você ja é cadastrado ';
            }
        }
    }

    function executeListLimpaTurmas(sfWebRequest $request) {


        if ($request->isMethod('POST')) {

            $obj = new Tbaluno();
            $obj = TbalunoPeer::retrieveByPK($request->getParameter('matricula'));
            try {
                $obj->removeTurmas($request->getParameter('id_periodo'));
                $this->getUser()->setFlash('notice', 'Aluno removido das turmas do semestre - ' . TbperiodoPeer::retrieveByPK($request->getParameter('id_periodo')));
                $this->redirect('aluno/index');
            } catch (Exception $ex) {
                sfContext::getInstance()->getUser()->setFlash('erro', ' Houve um erro ao remove-lo das turmas');
                $this->erro = $ex->getMessage();
            }
        } else {
            $this->matricula = $request->getParameter('matricula');
            $this->form = new RemoveTurmaForm();
            ;
        }
    }

    function executeAutocompleteList(sfWebRequest $request) {
//        $a = new tbaluno();
//        $a->getEmail();
    }

    function executeListGeraFicha(sfWebRequest $request) {
        $request->setParameter('matricula', $request->getParameter('matricula'));
        $this->forward('aluno', 'GerarFicha');
    }

    function executeListGeraFila(sfWebRequest $request) {
        $request->setParameter('matricula', $request->getParameter('matricula'));
        $this->forward('aluno', 'anteriores');
    }

    function executeBatchMudarVersaoCurso(sfWebRequest $request) {

        $request->setAttribute('ids', $request->getParameter('ids'));
        $this->forward('aluno', 'mudarVersaoCursoForm');
    }

    function executeBatchRemoverDaFila(sfWebRequest $request) {

        $request->setAttribute('ids', $request->getParameter('ids'));
        $this->forward('aluno', 'RemoverDaFila');
    }

    function executeRemoverDaFila(sfWebRequest $request) {

        $this->ids = $request->getAttribute('ids');
        $form = new RemoveDaFilaForm();
        if ($request->isMethod(sfRequest::POST) && $request->hasParameter($form->getName())) {
            $form->bind($request->getParameter($form->getName()));
            if ($form->isValid()) {
                try {
                    $values = $form->getValues();

                    try {
                        $obj = new Tbaluno();
                        $list = TbalunoPeer::retrieveByPKs(explode(',', $values['ids']));
                        foreach ($list as $obj) {
                            $criteria = new Criteria();
                            $criteria->addJoin(TbfilaPeer::ID_OFERTA, TbofertaPeer::ID_OFERTA);
                            $criteria->add(TbofertaPeer::ID_PERIODO, $values['id_periodo']);
                            foreach ($obj->getTbfilas() as $fila) {
                                $fila->delete();
                            }
                        }
                    } catch (Exception $exc) {
                        sfContext::getInstance()->getUser()->setFlash('error', 'Erro ao salvar versão de curso');
                    }
                    $this->getUser()->setFlash('notice', 'Versão de curso trocada');
                } catch (Exception $exc) {
                    $this->getUser()->setFlash('error', 'Erro ao trocar Versão de curso');
                }
            }
            $this->redirect('aluno/index');
        }
        $this->setTemplate('FormSuccess');
        $this->form = $form;
    }

    function executeBatchEnviarEmail(sfWebRequest $request) {
        $request->setAttribute('ids', $request->getParameter('ids'));
        $request->setMethod('GET');
        $this->forward('aluno', 'EnviarEmail');
    }

    function executeEnviarEmail(sfWebRequest $request) {

        $this->ids = $request->getAttribute('ids');
        $form = new EnviarEmailForm();
        if ($request->isMethod(sfRequest::POST)) {
            if ($request->hasParameter($form->getName())) {
                $form->bind($request->getParameter($form->getName()));
                if ($form->isValid()) {
                    $values = $form->getValues();
//                    try {
                    $obj = new Tbaluno();
                    $list = TbalunoPeer::retrieveByPKs(explode(',', $values['ids']));
                    foreach ($list as $obj) {
                        $message = sfContext::getInstance()->getMailer()->compose('derca@ufrr.br', $obj->getEmail(), $values['subject'], $values['mensagem']);
                        if (sfContext::getInstance()->getMailer()->send($message) == false) {
                            sfContext::getInstance()->getUser()->setFlash('error', 'Nao foi possivel enviar');
                            sfContext::getInstance()->getLogger()->alert('falha!');
                        } else {
                            sfContext::getInstance()->getLogger()->alert('ok!');
                            sfContext::getInstance()->getUser()->setFlash('error', 'Enviado');
                        }
                    }
//                    } catch (Exception $exc) {
//                        sfContext::getInstance()->getUser()->setFlash('error', 'Erro ao salvar versão de curso');
//                    }
                    $this->getUser()->setFlash('notice', 'Versão de curso trocada');
                } else {
                    $this->getUser()->setFlash('error', 'Form Invalido');
                }
                $this->redirect('aluno/index');
            }
            $this->getUser()->setFlash('error', 'Nao Possui form');
            $this->redirect('aluno/index');
        } else {
            $this->setTemplate('Form');
            $this->form = $form;
        }
    }

    function executeMudarVersaoCursoForm(sfWebRequest $request) {

        $this->ids = $request->getAttribute('ids');
        $form = new MudarVersaoCursoForm();
        if ($request->isMethod(sfRequest::POST) && $request->hasParameter($form->getName())) {
            $form->bind($request->getParameter($form->getName()));

            if ($form->isValid()) {
                try {
                    $form->save();
                    $this->getUser()->setFlash('notice', 'Versão de curso trocada');
                } catch (Exception $exc) {
                    $this->getUser()->setFlash('error', 'Erro ao trocar Versão de curso');
                }
                $this->redirect('aluno/index');
            }
        }
        $this->setTemplate('Form');
        $this->form = $form;
    }

    function executeBatchMudarSituacaoAluno(sfWebRequest $request) {

        $request->setAttribute('ids', $request->getParameter('ids'));
        $this->forward('aluno', 'MudarSituacaoAlunoForm');
    }

    function executeBatchMatricularAlunos(sfWebRequest $request) {
        $request->setAttribute('ids', $request->getParameter('ids'));
        $this->forward('aluno', 'MatricularNoSemestreForm');
    }

    function executeMatricularNoSemestreForm(sfWebRequest $request) {

        $this->ids = $request->getAttribute('ids');
        $form = new MatricularNoSemestreForm();
        if ($request->isMethod(sfRequest::POST) && $request->hasParameter($form->getName())) {
            $form->bind($request->getParameter($form->getName()));

            if ($form->isValid()) {
                try {
                    $form->save();
                    $this->getUser()->setFlash('notice', 'Matriculados no semetre');
                } catch (Exception $exc) {
                    $this->getUser()->setFlash('error', 'Erro ao matricular');
                }
                $this->redirect('aluno/index');
            }
        } else {
            $this->setTemplate('Form');
            $this->form = $form;
        }
    }

    function executeMudarSituacaoAlunoForm(sfWebRequest $request) {

        $this->ids = $request->getAttribute('ids');
        $form = new MudarSituacaoAlunoForm();
        if ($request->isMethod(sfRequest::POST) && $request->hasParameter($form->getName())) {

            $form->bind($request->getParameter($form->getName()));

            if ($form->isValid()) {
                try {
                    $form->save();
                    $this->getUser()->setFlash('notice', 'Situacao do Aluno trocada');
                } catch (Exception $exc) {
                    $this->getUser()->setFlash('error', 'Erro ao trocar a Situacao do Aluno');
                }
                $this->redirect('aluno/index');
            }
        }
        $this->setTemplate('Form');
        $this->form = $form;
    }

    function executeNovoAluno(sfWebRequest $request) {

        if (sfContext::getInstance()->getUser()->hasAttribute('novo_aluno')) {
            $form = new NovoAlunoForm(sfContext::getInstance()->getUser()->getAttribute('novo_aluno'));
        } else {
            $form = new NovoAlunoForm(new Tbaluno());
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
//                        $aluno = new tbaluno();
                        $form_values = $form->getValues();
                        $curso = TbcursoversaoPeer::retrieveByPK($form_values['id_versao_curso'])->getCodCurso();
                        $aluno = sfContext::getInstance()->getUser()->hasAttribute('novo_aluno') ? sfContext::getInstance()->getUser()->getAttribute('novo_aluno') : new Tbaluno();
                        $aluno->fromArray($form_values, BasePeer::TYPE_FIELDNAME);
                        $aluno->setUfNascimento($aluno->getTbcidade()->getTbestado()->getUf());
                        if (!sfContext::getInstance()->getUser()->getAttribute('import')) {
                            $aluno->setMatricula($form_values['ano_ingresso'] . $form_values['semestre'] . $curso . $form_values['posicao']);
                            $aluno = TbalunoPeer::MatriculaCorrige($aluno);
                        } else {
                            $aluno->setMatricula($form_values['matricula']);
                        }
//                        $aluno = new NovoAlunoForm($aluno);
//                        $aluno->set($form_values['semestre'],$form_values['ano_ingresso'],$form_values['posicao']);
                        if (!sfContext::getInstance()->getUser()->getAttribute('import')) {
                            sfContext::getInstance()->getUser()->setAttribute('novo_aluno', $aluno);
                            sfContext::getInstance()->getUser()->setAttribute('semestre', $form_values['semestre']);
                            sfContext::getInstance()->getUser()->setAttribute('ano_ingresso', $form_values['ano_ingresso']);
                            sfContext::getInstance()->getUser()->setAttribute('posicao', $form_values['posicao']);
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

    function executeFinalizarMatricula(sfWebRequest $request) {
        if (sfContext::getInstance()->getUser()->getAttribute('novo_aluno')) {
            $aluno = new Tbaluno();
            $aluno = sfContext::getInstance()->getUser()->getAttribute('novo_aluno');
            $aluno->save();
//            TbfilaPeer::MatriculaCalouros($aluno);
            sfContext::getInstance()->getUser()->setAttribute('matricula', $aluno->getMatricula());
        }

        if (!sfContext::getInstance()->getUser()->getAttribute('import')) {
            sfContext::getInstance()->getUser()->setAttribute('semestre', null);
            sfContext::getInstance()->getUser()->setAttribute('ano_ingresso', null);
            sfContext::getInstance()->getUser()->setAttribute('posicao', null);
        }
        sfContext::getInstance()->getUser()->setAttribute('novo_aluno', null);
    }

    function executeGerarFicha(sfWebRequest $request) {
        $aluno = new tbaluno();

        if (sfContext::getInstance()->getUser()->hasAttribute('novo_aluno')) {
            
        }
        $aluno = sfContext::getInstance()->getUser()->getAttribute('novo_aluno');
        if ($request->hasParameter('matricula'))
            $aluno = TbalunoPeer::retrieveByPK($request->getParameter('matricula'));
        $cursos_diff = array('51', '55',
            '113', '112', '111',
            '110', '63', '64',
            '60', '38', '56', '21'
        );
        //

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

    function executeAnteriores(sfWebRequest $request) {
        $periodo = new Tbperiodo();
        if ($request->hasParameter('matricula')){
            sfContext::getInstance()->getUser()->setAttribute('matricula', $request->getParameter('matricula'));
        }
        $this->aluno = TbalunoPeer::retrieveByPK(sfContext::getInstance()->getUser()->getAttribute('matricula'));
        $this->com_delete = false;
        $criteria = new Criteria();
        $criteria->addJoin(TbofertaPeer::ID_PERIODO, TbperiodoPeer::ID_PERIODO);
        $criteria->addDescendingOrderByColumn(TbperiodoPeer::ID_PERIODO);
        $criteria->add(TbofertaPeer::ID_PERIODO, TbperiodoPeer::getLastSemestreAtual($this->aluno)->getIdPeriodo(), Criteria::LESS_EQUAL);

        $this->Tbfilas = $this->aluno->getTbfilasJoinTboferta($criteria);
    }
        
    function executeImprimir(sfWebRequest $request) {   
        $this->setLayout(false);
        if ($request->hasParameter('matricula')
            )sfContext::getInstance()->getUser()->setAttribute('matricula', $request->getParameter('matricula'));
        if ($request->hasParameter('periodo')
            )sfContext::getInstance()->getUser()->setAttribute('periodo', $request->getParameter('periodo'));
        $this->aluno = TbalunoPeer::retrieveByPK(sfContext::getInstance()->getUser()->getAttribute('matricula'));
        $this->periodo = TbperiodoPeer::retrieveByPK(sfContext::getInstance()->getUser()->getAttribute('periodo'));


        $criteria = new Criteria();
        $criteria->add(TbfilaPeer::MATRICULA, sfContext::getInstance()->getUser()->getAttribute('matricula'));
        $criteria->add(TbofertaPeer::ID_PERIODO, $this->periodo->getIdPeriodo());
//        $criteria->addOr(TbofertaPeer::ID_PERIODO, 203);
        $this->filas = TbfilaPeer::doSelect($criteria);
    }

    function executeExportar(sfWebRequest $request) {
        $sf_user = sfContext::getInstance()->getUser();
        $sf_user->getAttribute('aluno.filters', array(), 'admin_module');
        $this->filters = $this->configuration->getFilterForm($this->getFilters());
        $criteria = $this->filters->buildCriteria($this->getFilters());
        $alunos = TbalunoPeer::doSelect($criteria);
        $request->setAttribute('list', $alunos);

        $request->setAttribute('show_fields', $this->getModelFields());

        $this->forward('exportar', 'Exportar');
    }

    function getModelFields() {
        $fields = array('Nome', 'Matricula', 'Cpf', 'tbcursoversao', 'tbtipoingresso', 'Tbalunosituacao');
        return $fields;
    }

    function executeChamaLista(sfWebRequest $request) {
        $criteria = new Criteria();
        $criteria = $this->getUser()->getAttribute('loadaluno.criteria');
        if ($this->getUser()->getAttribute('listaespera.chamado') != 'yes') {
            foreach (TbloadalunoPeer::doSelect($criteria) as $loadaluno) {
                if ($loadaluno->getOpcao() == '1') {
                    $crit = new Criteria();
                    $crit->add(TbloadalunoPeer::CPF, $loadaluno->getCpf());
                    $crit->addAnd(TbloadalunoPeer::OPCAO, '1', Criteria::ALT_NOT_EQUAL);
                    foreach (TbloadalunoPeer::doSelect($crit) as $noob) {
                        $noob->setOpcao('ELIMINADO-' . $noob->getOpcao());
                        $noob->save();
                    }
                }
                $loadaluno->setOpcao('CHAMADO-' . $loadaluno->getOpcao());
                $loadaluno->save();
            }
        }
        $this->getUser()->setAttribute('listaespera.chamado', 'no');
        $this->list = TbloadalunoPeer::doSelect($criteria);
        $this->show_fields = array('Nome', 'Matricula', 'Cpf', 'tbcursoversao', 'Classificacao', 'Opcao');
        $this->setLayout("relatorio");

        $this->getUser()->setAttribute('loadaluno.criteria', null);
//        $this->redirect('@tbloadaluno');
    }

    function executeListaEspera(sfWebRequest $request) {

//        if ($request->getMethod() == 'POST') {
        //$sec_opt: false = 1a opcao, true, 2a opcao
        $sec_opt = $request->getParameter('flag') == null ? 999 : $request->getParameter('flag');
        $vagas = $request->getParameter('vagas') == null ? 999 : $request->getParameter('vagas');
        $curso = $request->getParameter('curso');

        $criteria = new Criteria();
//        if ($curso == null) {
        $criteria->add(TbloadalunoPeer::ID_VERSAO_CURSO, $curso);
//        }
//        $criteria->addAnd(TbloadalunoPeer::OPCAO, array('2', '1'), Criteria::IN);
        $criteria->addAscendingOrderByColumn(TbloadalunoPeer::CLASSIFICACAO);
        $results = TbloadalunoPeer::doSelect($criteria);

        $retorno = array();
        $count = 0;

        for ($i = 0; $i < count($results); $i++) {
            //verifica qual o tipo de requisicao e filtra
            if ($request->getParameter('tipo') == '0') {
                if ($results[$i]->getOpcao() != '1' && $results[$i]->getOpcao() != '2') {
                    continue;
                }
            } else if ($request->getParameter('tipo') == '1') {
                if ($results[$i]->getOpcao() != 'CHAMADO-1' && $results[$i]->getOpcao() != 'CHAMADO-2') {
                    continue;
                }
            } else if ($request->getParameter('tipo') == '2') {
                if ($results[$i]->getOpcao() != 'SISU') {
                    continue;
                }
            } else if ($request->getParameter('tipo') == '3') {
                if ($results[$i]->getOpcao() != 'CHAMADO-SISU') {
                    continue;
                }
            }
            //enquanto tiver vagas, continua, senao da break
            if ($vagas > 0) {
                $crit = new Criteria();
                if ($results[$i]->getOpcao() == '2') {
                    $crit->add(TbalunoPeer::CPF, $results[$i]->getCpf());
                    $crit->add(TbalunoPeer::DT_INGRESSO, '1/3/2011', Criteria::GREATER_EQUAL);
                    $crit->add(TbalunoPeer::DT_INGRESSO, '11/3/2011', Criteria::LESS_EQUAL);
                    $crit->addAnd(TbalunoPeer::ID_SITUACAO, array('0', '13'), Criteria::IN);
                    if (TbalunoPeer::doCount($crit) > 0) {
                        continue;
                    }
                }
                //verifica se e de primeira ou segunda opcao
                if ($sec_opt > 0) {
                    if ($results[$i]->getOpcao() == '2') {
                        $sec_opt--;
                    }
                    $retorno[$count] = $results[$i]->getMatricula();
                    $count++;
                    $vagas--;
                } else {
                    if ($results[$i]->getOpcao() == '1') {
                        $retorno[$count] = $results[$i]->getMatricula();
                        $count++;
                        $vagas--;
                    }
                }
            } else {
                break;
            }
        }

        $criteria->addAnd(TbloadalunoPeer::MATRICULA, $retorno, Criteria::IN);

        $this->getUser()->setAttribute('loadaluno.criteria', $criteria);

        $this->list = TbloadalunoPeer::doSelect($criteria);
        $this->show_fields = array('Nome', 'Matricula', 'Cpf', 'tbcursoversao', 'Classificacao', 'Opcao', 'Tbalunosituacao');
        if ($request->getParameter('tipo') == '1' || $request->getParameter('tipo') == '3') {
            $this->getUser()->setAttribute('listaespera.chamado', 'yes');
            $this->redirect("aluno/ChamaLista");
        }
//        }
    }

    function executeBatchAlteraDtIngresso(sfWebRequest $request) {
        $request->setAttribute('ids', $request->getParameter('ids'));
        $this->forward('aluno', 'AlteraDtIngresso');
    }

    function executeAlteraDtIngresso(sfWebRequest $request) {
        $this->ids = $request->getAttribute('ids');
        $form = new AlteraDtIngressoAlunoForm();
        if ($request->isMethod(sfRequest::POST) && $request->hasParameter($form->getName())) {

            $form->bind($request->getParameter($form->getName()));

            if ($form->isValid()) {
                try {
                    $form->save();
                    $this->getUser()->setFlash('notice', 'Situacao do Aluno trocada');
                } catch (Exception $exc) {
                    $this->getUser()->setFlash('error', 'Erro ao trocar a Situacao do Aluno');
                }
                $this->redirect('aluno/index');
            }
        }

        $this->form = $form;
    }

    function executeAlteraMatricula(sfWebRequest $request) {
        $this->id = $request->getAttribute('id');
        $form = new AlteraMatriculaForm();
        if ($request->isMethod(sfRequest::POST) && $request->hasParameter($form->getName())) {

            $form->bind($request->getParameter($form->getName()));

            if ($form->isValid()) {
                try {
                    $form->save();
                    $this->getUser()->setFlash('notice', 'Matrícula trocada');
                } catch (Exception $exc) {
                    $this->getUser()->setFlash('error', 'Erro ao trocar a Situacao do Aluno');
                }
                $this->redirect('aluno/index');
            }
        }

        $this->form = $form;
    }

    function executeListAlteraMatricula(sfWebRequest $request) {
        $request->setAttribute('id', $request->getParameter('matricula'));
        $this->forward('aluno', 'AlteraMatricula');
    }

    function executeAproveitamento(sfWebRequest $request) {
        $this->id = $request->getAttribute('id');
        $form = new AproveitamentoForm();
        if ($request->isMethod(sfRequest::POST) && $request->hasParameter($form->getName())) {

            $form->bind($request->getParameter($form->getName()));

            if ($form->isValid()) {
                try {
                    $form->save();
                    $this->getUser()->setFlash('notice', 'Histórico Transferido');
                } catch (Exception $exc) {
                    $this->getUser()->setFlash('error', 'Erro ao transferir histórico');
                }
                $this->redirect('aluno/index');
            }
        }

        $this->form = $form;
    }

    function executeListAproveitamento(sfWebRequest $request) {
        $request->setAttribute('id', $request->getParameter('matricula'));
        $this->forward('aluno', 'Aproveitamento');
    }

    function executeListAbandonoDeCurso(sfWebRequest $request) {
        $form = new AbandonoDeCursoForm();
        
        $this->setTemplate('AdvancedForm');
        $this->form = $form;
        
        if ($request->isMethod(sfRequest::POST) && $request->hasParameter($form->getName())) {
            $form->bind($request->getParameter($form->getName()));
            if ($form->isValid()) {
                $data = $form->executaRelatorio();
                $this->list = $data['result']['list'];
                $this->list1 = $data['result']['trancamento'];
                $this->list2 = $data['result']['reprovacoes'];
                $this->list3 = $data['result']['abandono'];
                $this->list4 = $data['result']['prazomaximo'];
                $this->show_fields = $data['show_fields'];
                $this->setTemplate('Abandono');
                $this->setLayout('relatorio');
            }
        }
    }

    public function executeAbandono(sfWebRequest $request) {
        $form = new AbandonoDeCursoForm();

        if ($request->isMethod(sfRequest::POST) && $request->hasParameter($form->getName())) {
            $form->bind($request->getParameter($form->getName()));
            if ($form->isValid()) {
                $values = $form->executaRelatorio();

                $this->setLayout($form->getLayout());
                $this->setTemplate($form->getTemplate());

                foreach ($values as $k => $v) {
                    $this->$k = $v;
                }
            }
        }

        $this->form = $form;

        $this->setTemplate('AdvancedForm');
    }

    function executeBatchMudarPolo(sfWebRequest $request) {

        $request->setAttribute('ids', $request->getParameter('ids'));
        $this->forward('aluno', 'mudarPoloForm');
    }
    
    function executeMudarPoloForm(sfWebRequest $request) {

        $this->ids = $request->getAttribute('ids');
        $form = new MudarPoloForm();
        if ($request->isMethod(sfRequest::POST) && $request->hasParameter($form->getName())) {
            $form->bind($request->getParameter($form->getName()));

            if ($form->isValid()) {
                try {
                    $form->save();
                    $this->getUser()->setFlash('notice', 'Pólos trocados');
                } catch (Exception $exc) {
                    $this->getUser()->setFlash('error', 'Erro ao trocar pólo');
                }
                $this->redirect('aluno/index');
            }
        }
        $this->setTemplate('Form');
        $this->form = $form;
    }

    function executeListPendencia(sfWebRequest $request) {
        $request->setAttribute('id', $request->getParameter('id'));
        $this->forward('pendencia', 'Adicionar');
    }

    function executeEnade(sfWebRequest $request) {
        if ($request->hasParameter('matricula'))
            $aluno = TbalunoPeer::retrieveByPK($request->getParameter('matricula'));
        if ($aluno->getEnade()) {
            $aluno->setEnade(false);
        } else {
            $aluno->setEnade(true);
        }
        $aluno->save();
        $this->redirect('aluno/index');
    }
}