<?php

require_once dirname(__FILE__).'/../lib/aluno_solicitacaoGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/aluno_solicitacaoGeneratorHelper.class.php';

/**
 * aluno_solicitacao actions.
 *
 * @package    derca
 * @subpackage aluno_solicitacao
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class aluno_solicitacaoActions extends autoAluno_solicitacaoActions
{
    public function executePreProcessa(sfWebRequest $request){
        $this->setTemplate('List');
        $this->form = new SolicitacaoForm();  
    }


    public function executeListCancelar(sfWebRequest $request){
        $request->setParameter('acao', 'setCancelado');
        $this->forward('aluno_solicitacao','PreProcessa');
    }

    public function executeListConcluido(sfWebRequest $request){
    $request->setParameter('acao', 'setConcluida');
    $this->forward('aluno_solicitacao','PreProcessa');
    }

    public function executeListFalta(sfWebRequest $request){
        $request->setParameter('acao', 'setFaltaInfo');
        $this->forward('aluno_solicitacao','PreProcessa');
    }

    public function executeProcessa(sfWebRequest $request){


        $obj = TbalunosolicitacaoPeer::retrieveByPK($request->getParameter('id_solicitacao'));
        $obj->setObservacao($request->getParameter('observacao'));
        if($request->getParameter('acao')== 'setFaltaInfo'){
            $obj->setFaltaInfo();
        }
        if($request->getParameter('acao')== 'setConcluida'){
            $obj->setConcluida();
            $this->Processa($request);
        }
        if($request->getParameter('acao')== 'setCancelado'){
            $obj->setCancelado();
        }
        $this->getUser()->setFlash('notice','Solicitacao Processada');
        $this->redirect('aluno_solicitacao/index');

    }

    private function Processa(sfWebRequest $request){
        $relatorio = new relatorioActions();
        $obj = TbalunosolicitacaoPeer::retrieveByPK($request->getParameter('id_solicitacao'));

        switch ($obj->getTipo()) {

            case 'abandono_curso':
  
            break;
            case 'conclusao_curso':

            break;
            case  'cancelamento_curso':

            break;
            case  'aluno_regular_com':

            break;
            case  'aluno_regular_sem':

            break;
            case  'aluno_regular_sem':

            break;
            case   'revisão_historico':

            break;
            case   'cancelamento_disciplinas':

            break;
            case    'trancamento_disciplinas':

            break;

            default:
                break;
        }


    }

}
