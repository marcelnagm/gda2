<?php

/**
 * turma actions.
 *
 * @package    derca
 * @subpackage turma
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class turmaActions extends sfActions {
    
    
//    private function listaTbturmaAluno($id) {
//        $c = new Criteria();
//        $c->add(TbturmaAlunoPeer::ID_TURMA, $id );
//        $c->addJoin(TbturmaAlunoPeer::MATRICULA,TbalunoPeer::MATRICULA);
//        $situacoes_matricula = array(
//                0,  // Aluno Regular
//                12, // Aluno Especial
//        );
//        $situacoes_matricula = sfConfig::get('app_situacoes_matricula_turma',$situacoes_matricula);
//        $c->add(TbalunoPeer::ID_SITUACAO,$situacoes_matricula,Criteria::IN);
//        $c->addAscendingOrderByColumn(TbalunoPeer::NOME);
//        return TbturmaAlunoPeer::doSelectJoinTbaluno($c);
//    }
    
    private function getTbturma($id) {
        $c = new Criteria();
        $c->add(TbturmaPeer::ID_TURMA, $id );
        return TbturmaPeer::doSelectOne($c);
    }

    public function executeIndex(sfWebRequest $request) {
        $professor = $this->getUser()->getAttribute('professor');
        $this->tbturmas = TbturmaPeer::retrieveByProfessor($professor->getMatriculaProf());
        $turma = new Tbturma();
        foreach ($this->tbturmas as $turma) {
            if ($turma->getPorcentagemPreenchido() == '100') {
                $this->popup = true;
            }
        }

        $this->tbturmasfinalized = TbturmaPeer::retrieveByProfessorFinalized($professor->getMatriculaProf());
        
        $this->history =  sfContext::getInstance()->getUser()->hasAttribute('history') ? sfContext::getInstance()->getUser()->getAttribute('history') : array();
    }

    public function executeFinalizaTurma(sfWebRequest $request) {

        $this->forward404Unless(TbturmaPeer::professorDaTurma($this->getUser()->getAttribute('professor')->getMatriculaProf(),$request->getParameter('id')),'Professor com matricula '.$this->getUser()->getAttribute('professor')->getMatriculaProf().' não tem vínculo com a turma '.$request->getParameter('id'));
        $tbturma = $this->getTbturma($request->getParameter('id'));
        $tbturma->setNotasNoHistorico(true);
        $tbturma->save();
        $history =  sfContext::getInstance()->getUser()->hasAttribute('history') ? sfContext::getInstance()->getUser()->getAttribute('history') : array();
        $history[$tbturma->getIdTurma()] = TbturmaPeer::retrieveByPK($tbturma->getIdTurma());
        sfContext::getInstance()->getUser()->setAttribute('history',$history ); 
        $this->redirect('turma/index');

    }

    public function executeDesfazer(sfWebRequest $request){
           $this->forward404Unless(TbturmaPeer::professorDaTurma($this->getUser()->getAttribute('professor')->getMatriculaProf(),$request->getParameter('id')),'Professor com matricula '.$this->getUser()->getAttribute('professor')->getMatriculaProf().' não tem vínculo com a turma '.$request->getParameter('id'));
           $tbturma = TbturmaPeer::retrieveByPK($request->getParameter('id'));
           $tbturma->setNotasNoHistorico(false);
           $tbturma->save();
           $history = sfContext::getInstance()->getUser()->getAttribute('history') ;
           unset ($history[$tbturma->getIdTurma()]);
           sfContext::getInstance()->getUser()->setAttribute('history',$history );
           $this->redirect('turma/index');
    }

    public function executeContato(sfWebRequest $request) {

        $this->forward404Unless(TbturmaPeer::professorDaTurma($this->getUser()->getAttribute('professor')->getMatriculaProf(),$request->getParameter('id')),'Professor com matricula '.$this->getUser()->getAttribute('professor')->getMatriculaProf().' não tem vínculo com a turma '.$request->getParameter('id'));

        $this->tbturma = $this->getTbturma($request->getParameter('id'));
        $this->tbturmaAlunos = $this->tbturma->getTbturmaAlunos();
        $this->setLayout(false);

    }

    public function executeFrequencia(sfWebRequest $request) {

        $this->forward404Unless(TbturmaPeer::professorDaTurma($this->getUser()->getAttribute('professor')->getMatriculaProf(),$request->getParameter('id')),'Professor com matricula '.$this->getUser()->getAttribute('professor')->getMatriculaProf().' não tem vínculo com a turma '.$request->getParameter('id'));

        $this->tbturma = $this->getTbturma($request->getParameter('id'));
        $this->tbturmaAlunos = $this->tbturma ->getTbturmaAlunos();
        $this->setLayout(false);

    }

    public function executeNotas(sfWebRequest $request) {

        if($request->getParameter('layout')=='impressao') {
            $this->setTemplate('notasImprimir');
            $this->setLayout(false);
        }

        $this->forward404Unless(TbturmaPeer::professorDaTurma($this->getUser()->getAttribute('professor')->getMatriculaProf(),$request->getParameter('id')),'Professor com matricula '.$this->getUser()->getAttribute('professor')->getMatriculaProf().' não tem vínculo com a turma '.$request->getParameter('id'));

        $this->tbturma = $this->getTbturma($request->getParameter('id'));

        $this->forward404If($this->tbturma->getNotasNoHistorico() && $request->getParameter('layout')!='impressao');

        $this->tbturmaAlunos = $this->tbturma->getListTbturmaAlunos() ;

        $notaAlunos = array();

        foreach($this->tbturmaAlunos as $ta) {
            $notas = $ta->getTbturmaNotas();
            foreach($notas as $n) {
                $notaAlunos[$n->getIdAluno()][$n->getNNota()] = $n->getValor();
            }
        }

        $this->notas = $notaAlunos;

        #$this->setTemplate('notasOut');

    }

    public function executeSalvaNNotas(sfWebRequest $request) {


        $this->forward404Unless(TbturmaPeer::professorDaTurma($this->getUser()->getAttribute('professor')->getMatriculaProf(),$request->getParameter('id')),'Professor não tem vínculo com a turma requisitada');

        $id = $request->getParameter('id');

        $nNotas = $request->getParameter('n_notas');

        $this->forward404Unless( !is_int($id) && !is_int($nNotas) );

        $turma = TbturmaPeer::retrieveByPK($id);
        
        $this->forward404If($turma->getNotasNoHistorico());

        $turma->setNNotas($nNotas);
        $turma->save();

        $this->redirect('turma/notas?id='.$id);

    }

    /* Form Notas AJAX */

    public function executeSalvaNota(sfWebRequest $request) {

        sfConfig::set('sf_escaping_strategy', false);

        $this->logMessage('Salvando nota do IP '.$_SERVER['REMOTE_ADDR'].', POST: '. json_encode($_POST) .' GET: '. json_encode($_GET), 'notice');

        $form_post = $request->getPostParameter('form');

        $this->forward404Unless(is_array($form_post), 'Parâmetros do formulário inválidos: POST: '. json_encode($_POST) .'; GET: '. json_encode($_GET) );

        $idAluno = key($form_post);
        $valores = current($form_post);

        $this->forward404Unless($aluno = TbturmaAlunoPeer::retrieveByPK($idAluno),'Aluno não cadastrado');
        $this->forward404Unless(TbturmaPeer::professorDaTurma($this->getUser()->getAttribute('professor')->getMatriculaProf(),$aluno->getIdTurma()),'Professor não tem vínculo com a turma requisitada');

        $json = array();

        try {

            switch (key($valores)) {

                case 'faltas':

                    if( $valores['faltas'] == '' || preg_match("/^[0-9]+$/", $valores['faltas']) ) {

                        $aluno->setFaltas( $valores['faltas'] );
                        $aluno->save();

                        $json['valor'] = $aluno->getFaltas();

                    } else {

                        $json['error']['code']= 4; // Número de faltas inválido

                    }

                    break;

                case 'nota':

                    $nNota = key($valores['nota']);
                    $valorNota = str_replace(',','.',current($valores['nota']));

                    if( $valorNota =='' || preg_match("/^[0-9.]+$/", $valorNota) && $valorNota >= 0 && $valorNota <= 10 ) {

                        $nota = TbturmaNotaPeer::retrieveByIdAlunoNNota($aluno->getIdAluno(),$nNota);

                        if( $nota == null && $nNota <= $aluno->getTbturma()->getNNotas() ) {
                            $nota = new Tbturmanota();
                            $nota->setTbturmaAluno($aluno);
                            $nota->setNNota($nNota);
                        } else if($valorNota==null) {
                            $nota->delete();
                            unset($nota);
                            $json['valor'] = null;
                            break;
                        }

                        $nota->setValor($valorNota);
                        $nota->save();
                        $json['valor'] = $nota->getValor();

                    } else {

                        $json['error']['code']= 5; // Nota inválida

                    }

                    break;

                case 'notaer':

                    $valores['notaer'] = str_replace(',','.',$valores['notaer']);

                    if( preg_match("/^[0-9.]+$/", $valores['notaer']) && $valores['notaer'] >= 0 && $valores['notaer'] <= 10 || $valores['notaer'] =='') {

                        if( $aluno->getMediaParcial() >= 6 && $aluno->getMediaParcial() < 7 || $valores['notaer'] =='') {

                            $aluno->setExameRecuperacao( $valores['notaer'] );
                            $aluno->save();

                            $json['valor'] = $aluno->getExameRecuperacao();

                        } else {

                            $json['error']['code']= 6; // A nota de exame de recuperação só vale para média parcial maior ou igual a 6 e menor que 7

                        }

                    } else {

                        $json['error']['code']= 5; // Nota inválida

                    }

                    break;

                default:
                    $this->forward404('Requisicao invalida em notas/salvaNota: '. $_SERVER['QUERY_STRING']);

            }

            $aluno->reload(); // para pegar as informações do banco

            if( !isset($json['error']['code']) ) {

                $json['id'] = $aluno->getIdAluno();
                $json['media_parcial'] = $aluno->getMediaParcial();
                $json['media_final'] = $aluno->getMediaFinal();
                $json['conceito'] =  $aluno->getIdConceito();
                $json['valor'] = (!isset($json['valor']) || $json['valor']===null)  ? '' : $json['valor'];

            }

            if($request->hasParameter('obj_id')) $json['obj_id'] = $request->getParameter('obj_id');

        } catch (PropelException $exc) {
            $json['error']['code'] = 7;
            if(sfApplicationConfiguration::getActive()->getEnvironment() == 'test')
                $json['error']['message'] = 'Erro no acesso ao banco de dados: ' . utf8_decode($exc->getMessage());
        } catch (Exception $exc) {
            $json['error']['code'] = 8;
            if(sfApplicationConfiguration::getActive()->getEnvironment() == 'test')
                $json['error']['message'] = 'Erro ao processar a requisição: ' . $exc->getMessage();
        }

        $this->resposta = $json;

    }

}
