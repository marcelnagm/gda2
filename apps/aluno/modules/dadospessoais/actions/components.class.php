<?php
/**
 * aviso components.
 *
 * @package    derca
 * @subpackage aviso
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class dadospessoaisComponents extends sfComponents {

    public function executeInfo(sfWebRequest $request) {

        if($this->aluno == null){
            $this->aluno = sfContext::getInstance()->getUser()->getAttribute('aluno');
        }
        if($this->aluno == null) throw new Exception('Componente dadospessoais/info: Não foi possível buscar informações');

    }

}
