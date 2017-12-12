<?php

#include(dirname(__FILE__).'/../lib/form/AlunosPorCursoForm.class.php');

/**
 * relatorio actions.
 *
 * @package    derca
 * @subpackage relatorio
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class relatorioActions extends sfActions {

    /**
     * Mostra o formulário para gerar o relatório.
     * O parâmetro tipo define qual formulário será instanciado,
     * valida as informações enviadas e encaminha para o método
     * de geração do relatório.
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {

        $this->forward404Unless($request->hasParameter('nome'));

        $nome = (string) $request->getParameter('nome');

        $formClassName = $nome . 'Form';

        if (class_exists($formClassName))
            $this->form = new $formClassName();
        else
            $this->forward404('Relatório não encontrado');

        if ($request->isMethod('post')) {
            $this->form->bind($request->getParameter($this->form->getName()));
            if ($this->form->isValid()) {
                $request->setAttribute('form', $this->form);
                $this->forward('relatorio', 'Processar');
            }
        }

        $this->setTemplate('Form');
    }

    /**
     * Mostra o relatorio
     *
     * @param sfRequest $request A request object
     */
    public function executeProcessar(sfWebRequest $request) {

        $this->forward404Unless($request->hasAttribute('form'));

        $this->form = $request->getAttribute('form');

        $values = $this->form->executaRelatorio();


        $this->setLayout($this->form->getLayout());
        $this->setTemplate($this->form->getTemplate());

        foreach ($values as $k => $v) {
            $this->$k = $v;
        }
    }

    public function executeAlunoDiploma(sfWebRequest $request) {

        if ($request->isMethod('POST')) {
            $form = new AlunoDiplomaForm();
            $form->bind($request->getParameter($form->getName()));
            if ($form->isValid()) {
                $form_values = $form->getValues();
                $template = $form_values['Tipo_Declaracao'];
                $matricula = $form_values['matricula'];
                $semestre = $form_values['periodo'];
                $aluno = TbalunoPeer::retrieveByPK($matricula);
                $versao = $aluno->getTbcursoversao();
                if ($semestre != "") {
                    $sem = TbperiodoPeer::retrieveByPK($semestre);
                }
                $values['diploma'] = 'diploma';

                
                $values['grau'] = ucwords(strtolower($versao->getTbformacao()->getDescricao()));
                if ($values['grau'] == 'Especialista') {
                    $formation = '';
                    foreach (explode(' ', strtolower($aluno->getTbcursoversao()->getDescricao())) as $str) {
                        if (in_array($str, array('de', 'para'))) {
                            $formation = $formation . " " . $str;
                        } else {
                            $formation = $formation . " " . ucwords($str);
                        }
                    }
                    $values['curso'] = $formation;
                    $values['nome_up'] = 'Profª. Drª. Rosângela Duarte';
                    $values['tipo_up'] = 'Pró-Reitora de Pesquisa e Pós-Graduação';
                    $values['diploma'] = 'certificado';
                } else {
                    $formation = '';
                    if ($aluno->getTbcurso()->getCodCurso() == 40 || $aluno->getTbcurso()->getCodCurso() == 39) {
                        $formation = 'Matemática';
                    } else {
                        foreach (explode(' ', strtolower($aluno->getTbcurso()->getDescricao())) as $str) {
                            if (in_array($str, array('de', 'para'))) {
                                $formation = $formation . " " . $str;
                            } else {
                                $formation = $formation . " " . ucwords($str);
                            }
                        }
                    }
                    $values['curso'] = $formation;
                    if ($values['grau'] == 'Mestre') {
                        $values['nome_up'] = 'Profª. Drª. Gioconda Santos e Souza Martinez';
                        $values['tipo_up'] = 'Reitora';
                    }
                }
                if ($template != 'diploma_verso') {

                    if ($template == 'diploma') {
                        $values['dt_colacao'] = date('d/m/Y', strtotime($form_values['data_colacao']));
                    }
                    if ($template == 'diploma_sequencial') {
                        $values['ch'] = $aluno->getTbcursoversao()->getChTotal();
                        $values['diploma'] = 'certificado de curso superior de complementação de estudos';
                    }
                    $values['dt_concl'] = ($template == 'diploma_mestrado' ? $aluno->getDtSituacao('d/m/Y') : $sem->getDtFim('d/m/Y'));
                    $values['nome'] = ucwords(strtolower($aluno->getNome()));
                    $this->nome = $values['nome'];
                    $values['nacionalidade'] = strtolower(TbpaisPeer::retrieveByPK($aluno->getNacionalidade())->getNacionalidade());
                    $values['estado'] = ucwords(strtolower($aluno->getTbcidade()->getTbestado()->getDescricao()));
                    $values['dt_nasc'] = $aluno->getDtNascimento('d/m/Y');
                    $values['data'] = strftime(" %d de %B de %Y");
                    $values['rg'] = $aluno->getRg();
                    $values['exp'] = $aluno->getRgOrgExped();
                } else {
                    $diploma = new Tbalunodiploma();
                    $diploma = $aluno->getTbalunodiplomas();
                    foreach ($diploma as $dip) {
                        $diploma = $dip;
                    }
                    $this->nome = 'verso';
                    $values['num'] = $diploma->getNRegistro();
                    $values['livro'] = $diploma->getLivro();
                    $values['folha'] = $diploma->getFolha();
                    $values['dt_registro'] = $diploma->getDtRegistro('d/m/Y');
                    $values['processo'] = $diploma->getNProcesso() ? $diploma->getNProcesso() : '';
                    $values['doc'] = $versao->getDocCriacao() ? $versao->getDocCriacao() : '';
                }
                $this->template = $template;
                $this->values = $values;
            } else {
                $this->message = $form->getErrorSchema()->getMessage();
            }
        } else {
            $form = new AlunoHistoricoForm();
            $this->form = $form;
        }
    }

    public function executeProfessorDeclaracao(sfWebRequest $request) {
        $form = new ProfessorDeclaracaoForm();
        if ($request->isMethod('post')) {
            $form->bind($request->getParameter($form->getName()));
            if ($form->isValid()) {
                $form_values = $form->getValues();
                $prof = TbprofessorPeer::retrieveByPK($form_values['professor']);
                $this->forward404Unless($prof, 'Professor não encontrado');
                $this->professor = $prof->getNome();
                $this->departamento = TbsetorPeer::retrieveByPK($prof->getIdSetor());
                $this->template = $form_values['Tipo_Declaração'];
                if (empty($this->departamento)) {
                    $this->departamento = "Setor não definido";
                } else {
                    $this->departamento = $this->departamento->getDescricao();
                }
                $this->disciplinas = $prof->getDisciplinasMinistradas();
            } else {
                $this->setTemplate('ProfessorDeclaracaoForm');
            }
        }
    }

    public function executeAlunoDeclaracao(sfWebRequest $request) {
        if ($request->isMethod('post')) {
            $form = new AlunoDeclaracaoForm();
            $form->bind($request->getParameter($form->getName()));
            if ($form->isValid()) {
                $template = $form->getValue('Tipo_Declaracao');
                $template = $form->getValue('Tipo_Declaracao');
                $matricula = $form->getValue('matricula');
                $semestre = $form->getValue('periodo');
                $aluno = TbalunoPeer::retrieveByPK($matricula);
                $versao = $aluno->getTbcursoversao();
                $sem = TbperiodoPeer::retrieveByPK($semestre);
                $values = array();
                $values['curso'] = $aluno->getTbcurso()->getDescricao();
                $values['nome'] = $aluno->getNome();

                if ($template == "conclusao_curso") {
                    $values['matricula'] = $matricula;
                    $values['cpf'] = $aluno->getCpf();
                    $values['periodo'] = $sem->getAno() . '.' . $sem->getSemestre();
                }

                if ($template == "abandono_curso") {
                    $values['matricula'] = $matricula;
                    $values['cpf'] = $aluno->getCpf();
                }

                if ($template == "cancelamento_curso") {
                    $values['turno'] = $aluno->getTbcursoversao()->getTbturno()->getDescricao();
                }
                if (in_array($template, array("aluno_regular_com", "aluno_regular_sem", "aluno_regular_sem_plus", "aluno_regular_porcentagem"))) {
//                    if ($aluno->getIdSituacao() != 0) {
//                        $this->message = "Não é um aluno regular!";
//                        return;
//                    }
                    $values['matricula'] = $matricula;
                    $values['cpf'] = $aluno->getCpf();
                    $values['nivel'] = $versao->getTbformacao()->getDescricao();
                    $values['turno'] = $versao->getTbturno()->getDescricao();
                    $values['dt_ingresso'] = $aluno->getDtIngresso('d/m/Y');
                    $values['tipo_ingresso'] = $aluno->getTbtipoingresso()->getDescricao();
                    $values['situacao'] = $aluno->getTbalunosituacao()->getDescricao();
                    $values['ano_min'] = $versao->getPrazoMin();
                    $values['ano_max'] = $versao->getPrazoMax();
                    if ($aluno->getTbcurso()->getDescricao() == "ESPECIALIZAÇÃO") {
                        $values['curso'] = $aluno->getTbcursoversao()->getDescricao();
                        $template = "aluno_regular_esp";
                    } else {
                        //informacoes do curso
                        $values['ch_curso'] = $versao->getChTotal();
                        $values['ch_curso_obrig'] = $versao->getChObr();
                        $values['ch_curso_ele'] = $versao->getChEletiva();
                        $values['ch_obr_cursada'] = $aluno->getChObrigCursada();
                        $values['ch_ele_cursada'] = $aluno->getChCursada(true);
                        $values['ch_total'] = $values['ch_obr_cursada'] + $values['ch_ele_cursada'];
                        $values['ch_restante_obr'] = ($values['ch_obr_cursada'] - $values['ch_curso_obrig'] );
                        $values['ch_restante_ele'] = ($values['ch_ele_cursada'] - $values['ch_curso_ele'] );
                        $values['ch_restante_total'] = $values['ch_restante_obr'] + $values['ch_restante_ele'];
                        //informações das disciplinas

                        if ($template == "aluno_regular_com" || $template == "aluno_regular_sem_plus") {
                            $this->disciplinas = $aluno->getDisciplinasPorSemestre($semestre);
                            $values['semestre'] = $sem->getAno() . "." . $sem->getSemestre();
                        }
                        if (in_array($template, array("aluno_regular_com", "aluno_regular_porcentagem", "aluno_regular_sem_plus"))) {
                            
                            $values['porc_obr'] = ($values['ch_curso_obrig'] == 0) ? 0 : $values['ch_obr_cursada']/$values['ch_curso_obrig'];
                            $values['porc_ele'] = ($values['ch_curso_ele'] == 0) ? 0 : $values['ch_ele_cursada']/$values['ch_curso_ele'];
                            $values['porc_total'] = ($values['ch_curso'] == 0) ? 0 : $values['ch_total']/$values['ch_curso'];

                            $values['porc_obr'] = ($values['porc_obr'] < 1 ? number_format($values['porc_obr'] * 100, 2, ',', '') : '100');
                            $values['porc_ele'] = ($values['porc_ele'] < 1 ? number_format($values['porc_ele'] * 100, 2, ',', '') : '100');
                            $values['porc_total'] = ($values['porc_total'] < 1 ? number_format($values['porc_total'] * 100, 2, ',', '') : '100');

                        }
                    }
                }
                if ($template == "aluno_regular_sem_plus") {
                    $template = "aluno_regular_com";
                }
                $this->template = $template;
                $this->values = $values;
            } else {
                $this->message = $form->getErrorSchema()->getMessage();
            }
        }
    }

    public function executeAlunoHistorico(sfWebRequest $request) {

        if ($request->isMethod('post')) {
            $form = new AlunoHistoricoForm();
            $form->bind($request->getParameter($form->getName()));
            if ($form->isValid()) {

                $template = $form->getValue('Tipo_Declaracao');
                $matricula = $form->getValue('matricula');
                $aluno = TbalunoPeer::retrieveByPK($matricula);
                $versao = $aluno->getTbcursoversao();
                $values = array();

                if ($template != 'diploma') {
                    $values['curso'] = $aluno->getTbcurso()->getDescricao();
                    $values['nome'] = $aluno->getNome();
                    $values['matricula'] = $matricula;
                    $values['dt_nascimento'] = $aluno->getDtNascimento('d/m/Y');
                    $values['pai'] = $aluno->getPai();
                    $values['mae'] = $aluno->getMae();
                    if ($template == "historico_final_mestrado_procisa" || $template == "historico_final_mestrado" || $template == "historico_final_esp") {
                        $values['seg_grau'] = $aluno->getTbinstexternaRelatedById3grau() ? $aluno->getTbinstexternaRelatedById3grau()->getDescricao() : "Sem informação";
                        $values['seg_ano'] = $aluno->getAnoConcl3grau();
                    } else {
                        $values['seg_grau'] = $aluno->getTbinstexternaRelatedById2grau() ? $aluno->getTbinstexternaRelatedById2grau()->getDescricao() : "Sem informação";
                        $values['seg_ano'] = $aluno->getAnoConcl2grau();
                    }
                    $values['rg'] = $aluno->getRg();
                    $values['rg_exp'] = $aluno->getRgOrgExped();
                    $values['cpf'] = $aluno->getCpf();

                    $values['curso'] = $versao->getDescricao();
                    if ($template != "historico_final_mestrado_procisa" && $template != "historico_final_mestrado" && $template != "historico_final_esp") {
                        $values['formacao'] = $versao->getTbformacao()->getDescricao();
                        $values['cod_curso'] = $aluno->getTbcurso()->getCodCurso();
                        $values['prazo'] = $versao->getPrazoMin() . 'Anos / ' . $versao->getPrazoMax() . " Anos";
                    }
                    if ($template == 'historico' || $template == 'historico_final' || $template == 'historico_final_sequencial') {
                        $values['titulo'] = $aluno->getTitulo() != '' ? $aluno->getTitulo() . '/' . $aluno->getTituloZona() . '/' . $aluno->getTituloSecao() : '';
                    }

                    if ($template == 'historico') {
                        $this->historico = $aluno->getHistoricoAtual();
                    } else {
                        $this->historico = $aluno->getHistoricoAtualFinal();
                    }

                    $values['tipo_ingresso'] = $aluno->getTbtipoingresso()->getDescricao();
                    $values['data_ingresso'] = $aluno->getDtIngresso('d/m/Y');
                    $values['situacao'] = $aluno->getTbalunosituacao()->getDescricao();
                    $values['ch_obrig'] = $versao->getChObr();
                    $values['ch_ele'] = $versao->getChEletiva();
                    $values['ch_total'] = $versao->getChTotal();
                    if ($template != "historico") {
                        $values['diretor'] = 'Acácia Duarte'; //sfConfig::get('diretor');
                    }
                }
                $this->template = $template;
                $this->values = $values;
                if (count($this->historico) == 0) {
                    $this->message = "Nenhum registro no historico";
                }
            } else {
                $this->message = $form->getErrorSchema()->getMessage();
            }
        }
    }

    public function executeAprovDiscEnc(sfWebRequest $request) {

        if ($request->isMethod('post')) {
            $form = new AprovDiscEncForm();
            $form->bind($request->getParameter($form->getName()));
            if ($form->isValid()) {
                $template = 'enc_aprov_disc';
                $values = array();
                $aluno = TbalunoPeer::retrieveByPK($form->getValue('matricula'));
                
                if ( $aluno instanceof Tbaluno ) {
                    $values['nome'] = $aluno->getNome();
                    $values['curso'] = $aluno->getTbcurso()->getDescricao();
                } else {
                    throw new Exception('Não foi possível acessar dados do aluno com matrícula '.$form->getValue('matricula'));
                }

                $values['num'] = $form->getValue('num_processo');
                $values['dep'] = $form->getValue('departamento');
                $values['data'] = strftime(" %d de %B de %Y");
            }
            $this->template = $template;
            $this->values = $values;
            $this->setTemplate('AprovDiscEnc');
        }
    }

    public function executeFrequencia(sfWebRequest $request) {

        if ($request->isMethod('post')) {
            $form = new FrequenciaForm();
            $form->bind($request->getParameter($form->getName()));
            if ($form->isValid()) {
                $mes_form = $form->getValue('mes');
                $ano_form = $form->getValue('ano');
                $nome_form = $form->getValue('nome');
                $cargo_form = $form->getValue('cargo');
                $tipo_form = $form->getValue('tipo');
                $data_action = strtotime($ano_form.'-'.$mes_form.'-01');
            }
            $this->nome = $nome_form;
            $this->cargo = $cargo_form;
            $this->tipo = $tipo_form;
            $this->max_dias = cal_days_in_month(CAL_GREGORIAN, $mes_form, $ano_form);
            $this->domingos = date("w", $data_action);
            $this->mes = ucfirst(strftime("%B", $data_action));
            $this->ano = strftime("%Y", $data_action);
            $this->setTemplate('Frequencia');
            $this->setLayout(false);
        }
    }

    public function executeAlunoDados(sfWebRequest $request) {
        if ($request->isMethod('post')) {
            $form = new AlunoDadosForm();
            $form->bind($request->getParameter($form->getName()));
            if ($form->isValid()) {

                $template = $form->getValue('Tipo_Declaracao');
                $matricula = $form->getValue('matricula');
                $aluno = TbalunoPeer::retrieveByPK($matricula);
                $values = array();

                $values['curso'] = $aluno->getTbcurso()->getDescricao();
                $values['nome'] = $aluno->getNome();
                $values['matricula'] = $matricula;
                $values['dt_nascimento'] = $aluno->getDtNascimento('d/m/Y');
                $values['pai'] = $aluno->getPai();
                $values['mae'] = $aluno->getMae();
                $values['nacionalidade'] = $aluno->getTbpais()->getNacionalidade();
                $values['naturalidade'] = $aluno->getTbcidade()->getDescricao() . ' - ' . $aluno->getTbcidade()->getTbestado()->getUf();
                $values['rg'] = $aluno->getRg();
                $values['exp'] = $aluno->getRgOrgExped();
                $values['cpf'] = $aluno->getCpf();
                $values['2_ins'] = $template == 'dados_aluno' ? ($aluno->getTbinstexternaRelatedById2grau() ? $aluno->getTbinstexternaRelatedById2grau()->getDescricao() : "Sem informação") : ($aluno->getTbinstexternaRelatedById3grau() ? $aluno->getTbinstexternaRelatedById3grau()->getDescricao() : "Sem informação");
                $values['2_ano'] = $template == 'dados_aluno' ? $aluno->getAnoConcl2grau() : $aluno->getAnoConcl3grau();
                if ($template == 'dados_aluno')
                    $values['2_uf'] = $aluno->getTbinstexternaRelatedById2grau() ? $aluno->getTbinstexternaRelatedById2grau()->getUf() : "Sem informação";
                else {
                    $values['defesa'] = $aluno->getDtSituacao('d/m/Y');
                    $values['2_uf'] = $aluno->getTbinstexternaRelatedById3grau() ? $aluno->getTbinstexternaRelatedById3grau()->getUf() : "Sem informação";
                }
                if ($template == 'dados_aluno') {
                    $values['dt_conc'] = ($form->getValue('periodo') != "" ? TbperiodoPeer::retrieveByPK($form->getValue('periodo'))->getDtFim('d/m/Y') : '___/____/_____');
                }
            }
            $this->template = $template;
            $this->values = $values;
            $this->setTemplate('AlunoDeclaracao');
        }
    }

}

