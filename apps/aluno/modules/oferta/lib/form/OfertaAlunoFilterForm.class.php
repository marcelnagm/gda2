<?php

class OfertaAlunoFilterForm extends sfForm {

    private $descricao = 'Selecione o semestre e clique em buscar para listar as ofertas do periodo.<br>Esta ferramenta é util para saber se alguma outra disciplina ja foi cadastrada com mesmo código ,turma ou horário.<br>Atenção ferramenta apenas para efeito de consulta das ofertas';

    function configure() {


        $widgets['num_campo'] =  new sfWidgetFormChoice( array('choices' =>  array(
                                                              1 =>'Código da disciplina:',
                                                              2 =>'Nome da disciplina:'
                                                              )
          )
      ,array('add_empty'=> false)
      );
        $widgets['num_campo']->setLabel(' ');
        $widgets['num_campo']->setDefault(1);

        $widgets['filtro'] = new sfWidgetFormInput(array());
        $widgets['filtro']->setAttribute('onkeyup', "this.value=this.value.toUpperCase()");
        
        $widgets['filtro']->setLabel('Com');


        $validators['filtro'] = new sfValidatorString(array('required' => true));
        $validators['num_campo'] = new sfValidatorChoice(array('required' => true,'choices' =>  array(
                                                              1,2
                                                              )));
       
        $this->setWidgets($widgets);
        $this->setValidators($validators);

	$this->widgetSchema->setNameFormat('ofertaalunoform[%s]');
	
    }

    public function getDescricao(){
        return $this->descricao;
    }

}

?>
