<?php

/**
 * Skeleton subclass for representing a row from the 'tbaluno' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.4.0 on:
 *
 * Tue May  4 12:14:29 2010
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model
 */
require_once 'Log.class.php';

class Tbaluno extends BaseTbaluno {

    public function setMediaGeral($v) {
        $historico = new tbhistorico();
        $total = 0;
        $criteria = new Criteria();
        $criteria->add(TbhistoricoPeer::COD_DISCIPLINA, 'ST999', Criteria::NOT_LIKE);
        $historicos = $this->getTbhistoricos($criteria);
        foreach ($historicos as $historico) {
            $total += $historico->getMedia();
        }

        parent::setMediaGeral($total / (count($historicos) == 0 ? 1 : count($historicos)));
    }

    public function getMediaGeral() {
        $historico = new tbhistorico();
        $total = 0;
        $criteria = new Criteria();
        $criteria->add(TbhistoricoPeer::COD_DISCIPLINA, 'ST999', Criteria::NOT_LIKE);
        $historicos = $this->getTbhistoricos($criteria);
        foreach ($historicos as $historico) {
            $total += $historico->getMedia();
        }

        return number_format($total / ( count($historicos) == 0 ? 1 : count($historicos)), 2);
    }

    /**
     *  procedimento que remove o aluno de todas as turmas do semetre selecionado
     * @param <tbperiodo> $id_periodo  periodo que o aluno esta cursando
     */
    public function removeTurmas($id_periodo) {
        $criteria = new Criteria();
        $criteria->addJoin(TbturmaAlunoPeer::ID_TURMA, TbturmaPeer::ID_TURMA);
        $criteria->add(TbturmaPeer::ID_PERIODO, $id_periodo);
        foreach ($this->getTbturmaAlunos($criteria) as $turmaAluno) {
            $turmaAluno->delete();
        }
    }

    public function setNaturalidade($v) {
        parent::setNaturalidade($v);
        $this->setUfNascimento($this->getTbcidade()->getTbestado()->getUf());
    }

    public function save(PropelPDO $con = null) {
        Log::save($this);
        $is_aluno = sfContext::getInstance()->getUser()->getAttribute('aluno');
        $periodo = TbperiodoPeer::getSemestreAtual($this);
        if (!isset($is_aluno) && isset($periodo)) {
            if (!in_array($this->getIdSituacao(), array(0, 1, 9, 12))) {
                $criteria = new Criteria();
                $criteria->addJoin(TbfilaPeer::ID_OFERTA, TbofertaPeer::ID_OFERTA);
                $criteria->add(TbofertaPeer::ID_PERIODO, $periodo->getIdPeriodo());
                $criteria->add(TbfilaPeer::ID_SITUACAO, 1);
                $criteria->add(TbfilaPeer::MATRICULA, $this->getMatricula());

                $fila = new Tbfila();
                foreach (TbfilaPeer::doSelect($criteria) as $fila) {
                    $fila->setIdSituacao(12);
                    $fila->save();
                }
            }
        }
        parent::save($con);
    }

    public function __construct() {
        parent::__construct();
        $this->setIdSituacao('0');
        $this->setIdTipoIngresso('2');
        $this->setDtIngresso(date('Y-m-d'));
        $this->setDtSituacao(date('Y-m-d'));
    }

    public function setAlunoMatricula(Tbalunomatricula $aluno) {
        $this->setIdPessoa($aluno->getIdPessoa());
        $this->setMatricula($aluno->getMatricula());
        $this->setNome($aluno->getNome());
        $this->setCelular($aluno->getCelular());
        $this->setEmail($aluno->getEmail());
        $this->setFoneResidencial($aluno->getFoneResidencial());
        $this->setIdNecesEspecial($aluno->getIdNecesEspecial());
        $this->setDtNascimento($aluno->getDtNascimento());
        $this->setNaturalidade($aluno->getNaturalidade());
        $this->setUfNascimento($aluno->getUfNascimento());
        $this->setNacionalidade($aluno->getNacionalidade());
        $this->setSexo($aluno->getSexo());
        $this->setEstadoCivil($aluno->getEstadoCivil());
        $this->setTitulo($aluno->getTitulo());
        $this->setTituloZona($aluno->getTituloZona());
        $this->setTituloSecao($aluno->getTituloSecao());
        $this->setRg($aluno->getRg());
        $this->setRgDtExped($aluno->getRgDtExped());
        $this->setRgOrgExped($aluno->getRgOrgExped());
        $this->setCpf($aluno->getCpf());
        $this->setReservista($aluno->getReservista());
        $this->setPai($aluno->getPai());
        $this->setMae($aluno->getMae());
        $this->setCep($aluno->getCep());
        $this->setNumero($aluno->getNumero());
        $this->setComplemento($aluno->getComplemento());
        $this->setIdVersaoCurso($aluno->getIdVersaoCurso());
        $this->setIdTipoIngresso($aluno->getIdTipoIngresso());
        $this->setIdSituacao($aluno->getIdSituacao());
        $this->setId2grau($aluno->getId2grau());
        $this->setAnoConcl2grau($aluno->getAnoConcl2grau());
        $this->setOpIngresso($aluno->getOpIngresso());
        $this->setIdPolo($aluno->getIdPolo());
        $this->setIdRaca($aluno->getIdRaca());
        $this->setDtIngresso(date('Y-m-d'));
        $this->setDtSituacao(date('Y-m-d'));
    }

    /**
     *  Retorna um array com a lista de disciplinas que estão na fila
     * @param <tbperiodo> $id_periodo periodo atual que o aluno esta cursando
     * @return <type> Array com os códigos das disciplinas
     */
    public function getDisciplinasIntbfila($id_periodo) {

        $criteria = new Criteria();

        $cod_disciplinas_cursada = array();

        $criteria->addJoin(TbofertaPeer::ID_OFERTA, TbfilaPeer::ID_OFERTA);
        $criteria->add(TbfilaPeer::MATRICULA, $this->matricula);
        $criteria->add(TbofertaPeer::ID_PERIODO, $id_periodo);
        $criteria->add(TbfilaPeer::ID_SITUACAO, 1);
        $result = TbofertaPeer::doSelect($criteria);

        $dis = new Tboferta();
        foreach ($result as $dis) {
            $cod_disciplinas_cursada[] = $dis->getCodDisciplina();
        }

        return $cod_disciplinas_cursada;
    }

    /**
     *  Retorna um array com a lista de disciplinas equivalentes que estão cursadas
     *  com o código novo
     * @param <tbperiodo> $id_periodo periodo atual que o aluno esta cursando
     * @return <type> Array com os códigos das disciplinas
     */
    public function getDisciplinasEquivalentesCursadas2() {

        $ids_conceito_aprovado = array(1, 4, 6, 7, 8, 11, 13);

        $criteria = new Criteria();
        $criteria->addJoin(TbcurriculodisciplinasPeer::ID_CURRICULO_DISCIPLINA, TbgradeEquivalentePeer::ID_CURRICULO_DISCIPLINA);
        $criteria->addJoin(TbhistoricoPeer::COD_DISCIPLINA, TbgradeEquivalentePeer::COD_DISCIPLINA);
        $criteria->add(TbcurriculodisciplinasPeer::ID_VERSAO_CURSO, $this->getIdVersaoCurso());
        $criteria->add(TbhistoricoPeer::ID_CONCEITO, $ids_conceito_aprovado, Criteria::IN);
        $criteria->add(TbhistoricoPeer::MATRICULA, $this->getMatricula());

        $cod_disciplinas_cursada = array();

        foreach (TbgradeEquivalentePeer::doSelect($criteria) as $dis) {
            $cod_disciplinas_cursada[] = $dis->getCodDisciplina();
            $cod_disciplinas_cursada[] = $dis->getTbcurriculodisciplinas()->getCodDisciplina();
        }

        return $cod_disciplinas_cursada;
    }

    /**
     *  Retorna um array com a lista de disciplinas equivalentes que estão cursadas
     * @param <tbperiodo> $id_periodo periodo atual que o aluno esta cursando
     * @return <type> Array com os códigos das disciplinas
     */
    public function getDisciplinasEquivalentesCursadas() {

        $ids_conceito_aprovado = array(1, 4, 6, 7, 8, 11, 13);

        $criteria = new Criteria();
        $criteria->addJoin(TbcurriculodisciplinasPeer::ID_CURRICULO_DISCIPLINA, TbgradeEquivalentePeer::ID_CURRICULO_DISCIPLINA);
        $criteria->addJoin(TbhistoricoPeer::COD_DISCIPLINA, TbgradeEquivalentePeer::COD_DISCIPLINA);
        $criteria->add(TbcurriculodisciplinasPeer::ID_VERSAO_CURSO, $this->getIdVersaoCurso());
        $criteria->add(TbhistoricoPeer::ID_CONCEITO, $ids_conceito_aprovado, Criteria::IN);
        $criteria->add(TbhistoricoPeer::MATRICULA, $this->getMatricula());

        $cod_disciplinas_cursada = array();

        foreach (TbcurriculodisciplinasPeer::doSelect($criteria) as $dis) {
            $cod_disciplinas_cursada[] = $dis->getCodDisciplina();
        }

        return $cod_disciplinas_cursada;
    }

    /**
     * Retorna um array com as disciplinas que aluno ainda necessita cursar
     * @param <tbperiodo> $id_periodo periodo atual que o aluno esta cursando
     * @return <type> Array com a lista de disciplinas
     */
    public function getDisciplinasACursar($id_periodo, $ignore=true) {

        $cod_disciplinas_cursar = array();
        $cod_disciplinas_cursada = array();
        $cod_disciplinas_fila = array();
        $cod_disciplinas_ingnorar = array();

        foreach (TbdisciplinaIgnoradaPeer::doSelect(new Criteria()) as $tbdisciplinaIgnorada) {
            $cod_disciplinas_ingnorar[] = $tbdisciplinaIgnorada->getCodDisciplina();
        }

        $cod_disciplinas_cursada = $this->getDisciplinasCursadas();
        $cod_disciplinas_fila = $this->getDisciplinasIntbfila($id_periodo);
        $cod_disciplinas_equivalentes = $this->getDisciplinasEquivalentesCursadas();

        $criteria = new Criteria();
        $criteria->add(TbcurriculodisciplinasPeer::COD_DISCIPLINA, $cod_disciplinas_cursada, Criteria::NOT_IN);
        $criteria->addAnd(TbcurriculodisciplinasPeer::COD_DISCIPLINA, $cod_disciplinas_fila, Criteria::NOT_IN);
        $criteria->addAnd(TbcurriculodisciplinasPeer::COD_DISCIPLINA, $cod_disciplinas_equivalentes, Criteria::NOT_IN);
        if (!$ignore) {
            $criteria->addAnd(TbcurriculodisciplinasPeer::COD_DISCIPLINA, $cod_disciplinas_ingnorar, Criteria::NOT_IN);
        }
        $criteria->addAnd(TbcurriculodisciplinasPeer::ID_VERSAO_CURSO, $this->id_versao_curso);
        $criteria->addAnd(TbcurriculodisciplinasPeer::ID_CARATER, 1);
        $criteria->addAscendingOrderByColumn(TbcurriculodisciplinasPeer::COD_DISCIPLINA);
        $result = TbcurriculodisciplinasPeer::doSelect($criteria);
        $dis = new Tbcurriculodisciplinas();
        foreach ($result as $dis) {
            $cod_disciplinas_cursar[$dis->getCodDisciplina()] = $dis->getCodDisciplina();
        }

        if (strlen(strstr($this->getTbcursoversao()->getDescricao(), 'LETRAS - LITERATURA')) > 0) {
            $materias_ing = array('LT113A', 'LT114A', 'AACC01');
            $materias_esp = array('LT113C', 'LT114C', 'AACC01');
            if (in_array('LT113A', $cod_disciplinas_cursada) || in_array('LT113A', $cod_disciplinas_fila)) {
                foreach ($materias_esp as $mat) {
                    unset($cod_disciplinas_cursar[$mat]);
                }
            }
            if (in_array('LT113C', $cod_disciplinas_cursada) || in_array('LT113C', $cod_disciplinas_fila)) {
                foreach ($materias_ing as $mat) {
                    unset($cod_disciplinas_cursar[$mat]);
                }
            }
        }
        if (strlen(strstr($this->getTbcursoversao()->getDescricao(), 'GEOGRAFIA')) > 0 || strlen(strstr($this->getTbcursoversao()->getDescricao(), 'COMUNICACAO SOCIAL')) > 0) {
            $materias_ing = array('LT179A', 'LT180A');
            $materias_esp = array('LT179C', 'LT180C');
            $materias_fra = array('LT179B', 'LT180B');

            if (in_array('LT179A', $cod_disciplinas_cursada) || in_array('LT179A', $cod_disciplinas_fila)) {
                foreach (array_merge($materias_esp, $materias_fra)as $mat) {
                    unset($cod_disciplinas_cursar[$mat]);
                }
            }
            if (in_array('LT179C', $cod_disciplinas_cursada) || in_array('LT179C', $cod_disciplinas_fila)) {
                sfContext::getInstance()->getLogger()->alert('esp');
                foreach (array_merge($materias_ing, $materias_fra) as $mat) {
                    unset($cod_disciplinas_cursar[$mat]);
                }
            }
            if (in_array('LT179B', $cod_disciplinas_cursada) || in_array('LT179B', $cod_disciplinas_fila)) {
                sfContext::getInstance()->getLogger()->alert('fra');
                foreach (array_merge($materias_esp, $materias_ing) as $mat) {
                    unset($cod_disciplinas_cursar[$mat]);
                }
            }
        }

        unset($cod_disciplinas_cursar['RI1000']);

        return $cod_disciplinas_cursar;
    }

    /**
     *
     * 
     * @return <integer> quantidade de Ch Obrigatória que ja foi cursada
     */
    public function getChObrigCursada() {
        $ch_total = 0;
        $ids_conceito_aprovado = array(1, 4, 6, 7, 8, 11, 13);
        $criteria = new Criteria();
        $criteria->add(TbhistoricoPeer::ID_CONCEITO, $ids_conceito_aprovado, Criteria::IN);
        $historico = new Tbhistorico();
        foreach ($this->getTbhistoricos($criteria) as $historico) {
            if (TbdisciplinaPeer::getCaraterNew($historico->getCodDisciplina(), $this->getMatricula()) == 'OBRIGATORIA') {
                $ch_total = $ch_total + $historico->getTbdisciplina()->getCh();
            }
        }
        $this->setChObrigCursada($ch_total);
        return $ch_total;
    }

    /**
     *  Procedimento que retorna a lista de disciplinas cursadas e aprovadas do aluno
     * @return <type> Array com os códigos das disciplinas
     */
    public function getDisciplinasCursadas() {

        $disciplinas_cursadas = array();
        $ids_conceito_aprovado = array(1, 4, 6, 7, 8, 11, 13);
        $criteria = new Criteria();
        $criteria->add(TbhistoricoPeer::ID_CONCEITO, $ids_conceito_aprovado, Criteria::IN);
        $historicos = $this->getTbhistoricos($criteria);

        foreach ($historicos as $h) {
            $disciplinas_cursadas[] = $h->getCodDisciplina();
        }

        return $disciplinas_cursadas;
    }

    /**
     *  Retorna a porcentagem da CH. cursada [Chamada ao BANCO]
     * @return <integer>
     */
    public function getPorcentagemChCursada() {

        $con = Propel::getConnection();

        try {

            $sql = "SELECT porcentagem_ch_cursada(:matricula)";
            $stmt = $con->prepare($sql);
            $stmt->bindValue('matricula', $this->getMatricula());

            $stmt->execute();
            list($result) = $stmt->fetch();
            return $result;
        } catch (Exception $exc) {
            throw new Exception('Erro ao consultar porcentagem de CH cursada');
        }
    }

    /**
     *  Procedimento que calcula a CH eletiva do aluno através do historico e da fila do periodo selecionado
     * @param <tbperiodo> $id_periodo periodo atualmente em curso
     * @return <integer> Retorna a Ch eletiva do aluno
     */
    public function getChEletiva($id_periodo, $com_fila = true) {

        $con = Propel::getConnection();

        try {
            $sql = "SELECT get_ch_eletiva(:matricula,:id_periodo, :comfila)";
            $stmt = $con->prepare($sql);
            $stmt->bindValue('matricula', $this->getMatricula());
            $stmt->bindValue('id_periodo', $id_periodo);
            $stmt->bindValue('comfila', $com_fila);

            $stmt->execute();
            list($result) = $stmt->fetch();
            return $result;
        } catch (Exception $exc) {
            throw new Exception('Erro ao consultar porcentagem de CH cursada');
        }
    }

    public function getChEletivaFila($id_periodo) {
        $cod_disciplinas = array();
        $retorno = 0;

        $criteria = new Criteria();
        $criteria->addJoin(TbfilaPeer::ID_OFERTA, TbofertaPeer::ID_OFERTA);
        $criteria->add(TbfilaPeer::MATRICULA, $this->getMatricula());
        $criteria->addAnd(TbfilaPeer::ID_SITUACAO, 1);
        $criteria->addAnd(TbofertaPeer::ID_PERIODO, $id_periodo);
        $fila = new Tbfila();
        foreach (TbfilaPeer::doSelect($criteria) as $fila) {
            $cod_disciplinas[] = $fila->getTboferta()->getCodDisciplina();
        }

        $criteria->clear();
        $criteria->add(TbcurriculodisciplinasPeer::COD_DISCIPLINA, $cod_disciplinas, Criteria::IN);
        $disc = new Tbcurriculodisciplinas();
        foreach (TbcurriculodisciplinasPeer::doSelect($criteria) as $disc) {
            if ($disc->getIdCarater() != '1') {
                $retorno += $disc->getTbdisciplina()->getCh();
            }
        }
        return $retorno;
    }

    public function getTbcurso() {
        return $this->getTbcursoversao()->getTbcurso();
    }

    /**
     * Retorna a fila eletronica do aluno do periodo informado , esta parte é utilizada
     * na action de relatório/AlunoDeclaracao
     * @param <integer> $id_periodo periodo desejado da fila eletronica
     * @return <array> Array com as disciplinas cursadas [FORMATO DA DECLARAÇÃO]
     */
    public function getDisciplinasPorSemestre($id_periodo) {
        $criteria = new Criteria();
        $criteria->add(TbfilaPeer::MATRICULA, $this->getMatricula());
        $criteria->add(TbofertaPeer::ID_PERIODO, $id_periodo);
        $criteria->addJoin(TbofertaPeer::ID_OFERTA, TbfilaPeer::ID_OFERTA);
        $disciplinas = TbfilaPeer::doSelect($criteria);
        $i = 0;
        $part = new tbfila();
        $filas = array();
        foreach ($disciplinas as $part) {
            $disciplina = $part->getTboferta();
            $disc['cod'] = $disciplina->getCodDisciplina();
            $disc['turma'] = $disciplina->getTurma();
            $disc['descricao'] = $disciplina->getTbdisciplina()->getDescricao();
            $disc['carater'] = TbdisciplinaPeer::getCaraterNew($disciplina->getCodDisciplina(), $this->getMatricula());
            $disc['dias'] = $disciplina->getDias();
            $disc['situacao'] = $part->getTbfilasituacao()->getDescricao();
            $filas[$i] = $disc;
            $i++;
        }

        return $filas;
    }

    public function getNomeJoinMatricula() {
        return $this->getMatricula() . ' - ' . $this->nome;
    }

    /**
     * Retorna o historico do aluno , esta parte é utilizada
     * na action de relatório/AlunoHistorico Comum
     * @return <Array> Array com o historico [FORMATO DA DECLARAÇÃO]
     */
    public function getHistoricoAtual() {
        $retorno = array();
        $criteria = new Criteria();
        $criteria->addAscendingOrderByColumn(TbhistoricoPeer::ID_PERIODO);
        $disciplinas = $this->getTbhistoricos($criteria);
        $disciplina = new Tbhistorico();
        foreach ($disciplinas as $disciplina) {
            $part = array();
            $disciplinaTemp = $disciplina->getTbdisciplina();
            $periodoTemp = $disciplina->getTbperiodo();
            $part['periodo'] = $disciplina->getTbperiodo()->getAnoSemestrePeriodo();
            $part['cod'] = $disciplinaTemp->getCodDisciplina();
            $part['nome'] = $disciplinaTemp->getDescricao();
            $part['faltas'] = $disciplina->getFaltas();
            $part['media'] = $disciplina->getMedia();
            $part['CH'] = $disciplinaTemp->getCh();
            $part['Carater'] = $disciplina->getCarater();
            $part['Sit'] = $disciplina->getTbconceito()->getSucinto();
            $part['inicio'] = $periodoTemp->getDtInicio('d.m.y');
            $part['fim'] = $periodoTemp->getDtFim('d.m.y');
            $retorno[] = $part;
        }
        return $retorno;
    }

    public function getChTotal() {
        return $this->getChCursada(true) + $this->getChCursada(false);
    }

    /**
     * Retorna o historico do aluno , esta parte é utilizada
     * na action de relatório/AlunoHistorico Final
     * @return <Array> Array com o historico [FORMATO DA DECLARAÇÃO]
     */
    public function getHistoricoAtualFinal() {
        $retorno = array();
        $criteria = new Criteria();
        $criteria->add(TbhistoricoPeer::ID_CONCEITO, 1);
        $criteria->addOr(TbhistoricoPeer::ID_CONCEITO, 4);
        $criteria->addOr(TbhistoricoPeer::ID_CONCEITO, 8);
        $criteria->addOr(TbhistoricoPeer::ID_CONCEITO, 13);
        $criteria->addOr(TbhistoricoPeer::ID_CONCEITO, 7);
        $criteria->addOr(TbhistoricoPeer::ID_CONCEITO, 6);
        $criteria->addOr(TbhistoricoPeer::ID_CONCEITO, 11);
        $criteria->addAscendingOrderByColumn(TbhistoricoPeer::ID_PERIODO);
        $disciplinas = $this->getTbhistoricos($criteria);
        $disciplina = new Tbhistorico();
        foreach ($disciplinas as $disciplina) {
            $part = array();
            $disciplinaTemp = $disciplina->getTbdisciplina();
            $periodoTemp = $disciplina->getTbperiodo();
            $part['periodo'] = $disciplina->getTbperiodo()->getAnoSemestrePeriodo();
            $part['cod'] = $disciplinaTemp->getCodDisciplina();
            $part['nome'] = $disciplinaTemp->getDescricao();
            $part['faltas'] = $disciplina->getFaltas();
            $part['media'] = $disciplina->getMedia();
            $part['CH'] = $disciplinaTemp->getCh();
            $part['Carater'] = $disciplina->getCarater();
            $part['Sit'] = $disciplina->getTbconceito()->getSucinto();
            $part['inicio'] = $periodoTemp->getDtInicio('d.m.y');
            $part['fim'] = $periodoTemp->getDtFim('d.m.y');
            $retorno[] = $part;
        }
        return $retorno;
    }

    /**
     *  Verifica se o aluno é provavel formando
     * @param <Tbperiodo> $id_periodo  periodo atualmente sendo cursado ou ultimo cursado
     * @return <boolean> true para provavel formando e false para não formando
     */
    public function Isformando($id_periodo, $ignore=true) {

        if ($this->getIdSituacao() == 0) {
            if (count($this->getDisciplinasACursar($id_periodo, $ignore)) <= 0) {
                sfContext::getInstance()->getLogger()->alert('count - ' . count($this->getDisciplinasACursar($id_periodo)));
                if ($this->getChCursada($id_periodo, true) >= $this->getTbcursoversao()->getChEletiva()) {
                    return true;
                }
            }
        } else {
            return false;
        }
    }

    /**
     *  Calcula a CH do tipo selecionado através do historico
     * @param <boolean> $eletiva true para pegar a CH eletiva cursada/<br>
     *                  false para pegar a CH obrigatoria cursada
     * @return <integer> Ch. do tipo solicitado.
     */
    public function getChCursada($eletiva = true) {

        $criteria = new Criteria();
        $criteria->add(TbhistoricoPeer::ID_CONCEITO, 1);
        $criteria->addOr(TbhistoricoPeer::ID_CONCEITO, 4);
        $criteria->addOr(TbhistoricoPeer::ID_CONCEITO, 8);
        $criteria->addOr(TbhistoricoPeer::ID_CONCEITO, 13);
        $criteria->addOr(TbhistoricoPeer::ID_CONCEITO, 7);
        $historico = new tbhistorico();
        $total = 0;
        foreach ($this->getTbhistoricos($criteria) as $historico):
            if ($eletiva) {
                if ($historico->getCarater() == 'ELETIVA'):
                    $total = $total + $historico->getTbdisciplina()->getCh();
                endif;
            }else {
                if ($historico->getCarater() == 'OBRIGATORIA'):
                    $total = $total + $historico->getTbdisciplina()->getCh();
                endif;
            }
        endforeach;
        return $total;
    }

    public function setNome($v) {
        parent::setNome(strtoupper($v));
    }

    public function setPai($v) {
        parent::setPai(strtoupper($v));
    }

    public function setMae($v) {
        parent::setMae(strtoupper($v));
    }

    public function setComplemento($v) {
        parent::setComplemento(strtoupper($v));
    }

    /**
     * Busca na oferta do periodo informado as disciplinas do <b>$num_semestre</b> informado
     * e faz a matricula automatica colocando automaticamente aceitos na filas respectivas.
     * Caso não seja informado , o sistema irá buscar o periodo baseado no id_nivel do curso do aluno.
     *
     * Detalhe do algoritmo:
     *  Busca ofertas com os seguinte critérios:
     *       <ul>
     *          <li>Oferta com turma com o padrão like <b>CAL%</b></li>
     *          <li>Oferta com Cod_Curso_Destino igual ao curso do aluno</li>
     *          <li>Oferta com turno igual ao versão de curso do aluno</li>
     *          <li>Oferta Ativas</li>
     *       <ul>
     * @param <integer> $num_semestre Semestre refente a Grade curricular a ser buscada.
     * @param <integer> $id_periodo Id do periodo a efetuar a matricula.
     */
    public function MatriculaInSemetre($num_semestre, $id_periodo = null) {

        $criteria = new Criteria();
        if (!isset($id_periodo)) {
            $criteria->add(TbperiodoPeer::DT_INICIO_CADASTRO, date('d/m/Y'), Criteria::LESS_EQUAL);
            $criteria->add(TbperiodoPeer::DT_FIM_CADASTRO, date('d/m/Y'), Criteria::GREATER_EQUAL);
            $criteria->add(TbperiodoPeer::ID_NIVEL, $this->getTbcurso()->getIdNivel());

            if (TbperiodoPeer::doCount($criteria) == 0) {
                throw new Exception("Nenhum periodo possivel de matricula " . $criteria->toString());
            }
            $periodo = TbperiodoPeer::doSelectOne($criteria)->getIdPeriodo();
//        $periodo = TbperiodoPeer::getSemestreAtual($this);
        } else {
            $periodo = $id_periodo;
        }

        $criteria->clear();
        $criteria->add(TbcurriculodisciplinasPeer::SEMESTRE_DISCIPLINA, $num_semestre);

        $disciplina = new Tbcurriculodisciplinas();
        foreach ($this->getTbcursoversao()->getTbcurriculodisciplinass($criteria) as $disciplina) {
            $criteria->clear();
            $criteria->add(TbofertaPeer::ID_PERIODO, $periodo);
            $criteria->add(TbofertaPeer::COD_DISCIPLINA, $disciplina->getCodDisciplina());
            $criteria->add(TbofertaPeer::COD_CURSO_DESTINO, $this->getTbcursoversao()->getCodCurso());
//            $criteria->add(TbofertaPeer::ID_TURNO, $this->getTbcursoversao()->getIdTurno());
//            $criteria->add(TbofertaPeer::TURMA, 'CAL%', Criteria::LIKE);
            $criteria->add(TbofertaPeer::ID_SITUACAO, 1);
            $ofertas = TbofertaPeer::doSelect($criteria);
            if (count($ofertas) > 0) {
                $oferta = new tboferta();
                foreach ($ofertas as $oferta) {
                    $crit = new Criteria();
                    $crit->add(TbhistoricoPeer::COD_DISCIPLINA, $oferta->getCodDisciplina());
                    $crit->add(TbhistoricoPeer::MATRICULA, $this->getMatricula());
                    if (TbhistoricoPeer::doCount($crit) > 0) {
                        break;
                    }
//                    if ($oferta->getVagas() - $oferta->getSolicitacoesAceitas() > 0) {
                    $fila = new tbfila();
                    $fila->setIdOferta($oferta->getIdOferta());
                    $fila->setMatricula($this->getMatricula());
                    $fila->setPontos(25);
                    $fila->setFormando(false);
                    $fila->setReprovacoes(0);
                    $fila->setIdSituacao(1);
                    $fila->save();
                    break;
                }
//                }
            }
        }
    }

    /**
     *
     *
     * @param <String> $cod_disciplina
     * @return <type>
     */
    public function getReprovações($cod_disciplina) {
        $criteira = new Criteria();
        $criteira->add(TbhistoricoPeer::ID_CONCEITO, 2);
        $criteira->addOr(TbhistoricoPeer::ID_CONCEITO, 3);
        $criteira->add(TbhistoricoPeer::COD_DISCIPLINA, $cod_disciplina);
        $criteira->add(TbhistoricoPeer::MATRICULA, $this->getMatricula());

        return TbhistoricoPeer::doCount($criteria);
    }

    public function delete(PropelPDO $con = null) {
        foreach ($this->getTbfilas() as $fila) {
            $fila->delete();
        }
        parent::delete($con);
    }

//    public function getNome() {
//        return utf8_encode(parent::getNome());
//    }
//    public function getPai() {
//        return utf8_encode(parent::getPai());
//    }
//
//    public function getMae() {
//        return utf8_encode(parent::getMae());
//    }

    public function isCalouro() {
        if (in_array($this->getIdTipoIngresso(), array(12,13,3,5,14))) {
            return false;
        }
        if (in_array($this->getTbcurso()->getIdNivel(), array(3,4,6,7,10))) {
            return false;
        }
//        $periodo = TbperiodoPeer::getSemestreAtual($this);
//
//        $criteria = new Criteria();
//        $criteria->add(TbhistoricoPeer::ID_CONCEITO, array(1,2,3,4,8,13,9,12,15), Criteria::IN);
//        $criteria->addJoin(TbfilaPeer::ID_OFERTA, TbofertaPeer::ID_OFERTA);
//        $criteria->add(TbofertaPeer::ID_PERIODO, $periodo->getIdPeriodo(), Criteria::NOT_EQUAL);
//        $criteria->add(TbfilaPeer::MATRICULA, $this->getMatricula());

//        if (TbfilaPeer::doCount($criteria) == 0 && count($this->getTbhistoricos()) == 0) {
        if (count($this->getTbhistoricos()) == 0) {
            return true;
        } else {
            return false;
        }
    }

    public function MatriculaInSemestre($id_periodo = null) {
        $criteria = new Criteria();
        //pega o periodo
        if (!isset($id_periodo)) {
            $criteria->add(TbperiodoPeer::DT_INICIO_CADASTRO, date('d/m/Y'), Criteria::LESS_EQUAL);
            $criteria->add(TbperiodoPeer::DT_FIM_CADASTRO, date('d/m/Y'), Criteria::GREATER_EQUAL);
            $criteria->add(TbperiodoPeer::ID_NIVEL, $this->getTbcurso()->getIdNivel());

            if (TbperiodoPeer::doCount($criteria) == 0) {
                throw new Exception("Nenhum periodo possivel de matricula " . $criteria->toString());
            }
            $periodo = TbperiodoPeer::doSelectOne($criteria)->getIdPeriodo();
        } else {
            $periodo = $id_periodo;
        }

        //seleciona os tbfilacalouros correspondentes
        $criteria->clear();
        $criteria->addJoin(TbfilacalourosPeer::ID_OFERTA, TbofertaPeer::ID_OFERTA);
        $criteria->add(TbfilacalourosPeer::ID_PERIODO, $id_periodo);
        $criteria->add(TbfilacalourosPeer::ID_VERSAO_CURSO, $this->getIdVersaoCurso());
        $criteria->add(TbofertaPeer::ID_POLO, $this->getIdPolo());

        $filacalouros = new Tbfilacalouros();
        //loop pelas linhas selecionadas da tbfilacalouros
        foreach (TbfilacalourosPeer::doSelect($criteria) as $filacalouros) {
            //verifica se ja cursou a disciplina
            $crit = new Criteria();
            $crit->add(TbhistoricoPeer::COD_DISCIPLINA, $filacalouros->getTboferta()->getCodDisciplina());
            $crit->add(TbhistoricoPeer::MATRICULA, $this->getMatricula());
            $crit->add(TbhistoricoPeer::ID_CONCEITO, array(1,13,4,8,7,6,11), Criteria::IN);
            if (TbhistoricoPeer::doCount($crit) == 0) {
                //adiciona nova fila
                $crit->clear();
                $crit->add(TbfilaPeer::ID_OFERTA, $filacalouros->getIdOferta());
                $crit->add(TbfilaPeer::MATRICULA, $this->getMatricula());
                $crit->add(TbfilaPeer::ID_SITUACAO, 1);
                if (TbfilaPeer::doCount($crit) == 0) {
                    $fila = new tbfila();
                    $fila->setIdOferta($filacalouros->getIdOferta());
                    $fila->setMatricula($this->getMatricula());
                    $fila->setPontos(25);
                    $fila->setFormando(false);
                    $fila->setReprovacoes(0);
                    $fila->setIdSituacao(1);
                    $fila->save();
                }
            }
        }
    }

    /**
     *  Retorna as informacoes usadas no PINGIFES
     * @return <integer>
     */
    public function getPINGIFESInfo() {

        $con = Propel::getConnection();

        try {

            $sql = "SELECT vwpingifes_siglas_aluno WHERE matricula = :matricula";
            $stmt = $con->prepare($sql);
            $stmt->bindValue('matricula', $this->getMatricula());

            $stmt->execute();
            list($result) = $stmt->fetch();
            return $result;
        } catch (Exception $exc) {
            throw new Exception('Erro ao consultar view vwpingifes_siglas_aluno');
        }
    }
    
    public function getCurso() {
        return $this->getTbcurso()->getDescricao();
    }

    public function getCursoTurno() {
        return $this->getTbcursoversao()->getTbturno();
    }
}

// Tbaluno
