<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class sfDeclaracaoValidator extends sfValidatorBase {

    protected function configure($options = array(), $messages = array()) {
        parent::configure($options, $messages);
    }

    protected function doClean($value) {

        $matricula = $value ['matricula'];

        $aluno = TbalunoPeer::retrieveByPK($matricula);
        if(!isset($aluno)){
            throw new sfValidatorError($this, "Matricula Invalida");
        }
        $tipo_declaracao = $value ['Tipo_Declaracao'];
        $periodo = $value['periodo'];
        $tbsituacao = $aluno->getTbalunosituacao();
        if (($tipo_declaracao == 'cancelamento_curso' && $aluno->getIdSituacao() != 6)) {
            throw new sfValidatorError($this, "Declaração de cancelamento de curso - Situação do aluno diferente - " . $tbsituacao->getDescricao());
        }
        if ($tipo_declaracao == 'aluno_regular_com' && $aluno->getIdSituacao() != 0 && $aluno->getIdSituacao() != 12 ) {
            if(count($aluno->getDisciplinasIntbfila($periodo))==0 ){
            throw new sfValidatorError($this, "Declaração de Aluno Regular - Aluno sem Fila no Periodo - " . $tbsituacao->getDescricao());
            }else
            throw new sfValidatorError($this, "Declaração de Aluno Regular - Situação do aluno diferente - " . $tbsituacao->getDescricao());

        }        
        if ($tipo_declaracao == 'conclusao_curso') {
//            if(!$aluno->Isformando($periodo,false)){
//            throw new sfValidatorError($this, "Declaração de Conclusão de Curso - Aluno com Pendencias de CH.Eletiva OU Obrigatória - " . $tbsituacao->getDescricao());
//            }
        }
        if ($tipo_declaracao == 'abandono_curso' && $aluno->getIdSituacao() != 4) {
            throw new sfValidatorError($this, "Declaração de Abandono de Curso - Situação do aluno diferente - " . $tbsituacao->getDescricao());
        }


        return $value;
    }

}

?>
