<?php

class FilaAlunoForm extends sfForm {

    private $descricao = 'Selecione o semestre e clique em buscar para listar as ofertas do periodo.<br>Esta ferramenta é util para saber se alguma outra disciplina ja foi cadastrada com mesmo código ,turma ou horário.<br>Atenção ferramenta apenas para efeito de consulta das ofertas';

    function configure() {


        $widgets['cod_disciplina'] = new sfWidgetFormInput(array(),array('size'=>10));
        $widgets['cod_disciplina']->setAttribute('onkeyup', "this.value=this.value.toUpperCase()");
        $widgets['turma'] = new sfWidgetFormInput(array(),array('size'=>3));
        $widgets['turma']->setAttribute('onkeyup', "this.value=this.value.toUpperCase()");

        $validators['cod_disciplina'] = new sfValidatorString();
        $validators['turma'] = new sfValidatorString();
       

        $this->setWidgets($widgets);
        $this->setValidators($validators);
    }

    public function getDescricao(){
        return $this->descricao;
    }

}

?>
