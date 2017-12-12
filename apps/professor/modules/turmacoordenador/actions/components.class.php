<?php
/**
 * aviso components.
 *
 * @package    derca
 * @subpackage aviso
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class turmaComponents extends sfComponents {

    public function executeInfo(sfWebRequest $request) {
        if($this->tbturma == null || $this->id_turma == null) {
            $c = new Criteria();
            $c->add(TbturmaPeer::ID_TURMA, $this->id_turma );
            $this->tbturma = TbturmaPeer::doSelectOne($c);
        }

        if($this->tbturma == null) throw new Exception('Não foi possível buscar informações da turma');

    }

    public function executeLegendaConceito(sfWebRequest $request) {
        
        $this->Conceitos = array();

        if(is_array($this->pks)) {
            $c = new Criteria();
            $c->addAscendingOrderByColumn('id_conceito');

            $c->add(TbconceitoPeer::ID_CONCEITO, $this->pks, Criteria::IN);

            $this->Conceitos = TbconceitoPeer::doSelectOne($c);
            #if($this->Conceitos == null) throw new Exception('Não foi possível buscar legenda de conceitinformações');
        }
    }

}
