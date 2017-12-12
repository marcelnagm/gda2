<?php

include(dirname(__FILE__).'/../../bootstrap/functional.php');
include(dirname(__FILE__).'/auth.functions.php');

$browser = new sfTestFunctional(new sfBrowser());

$browser->


        info('Apagar Faltas sem autenticacao')->
        post('/notas.json',array(
        'form' => array(
                7 => array('faltas' => '')
        ),
        'obj_id' => 'faltas_7'
        ))->

        with('request')->isFormat('json')->

        with('response')->begin()->
        isStatusCode(200)->
        matches('/"code"\:"401"/')->
        end();

login($browser);


/** Notas **/
$browser->


        info('Apagar Faltas')->
        post('/notas.json',array(
        'form' => array(
                7 => array('faltas' => '')
        ),
        'obj_id' => 'faltas_7'
        ))->

        with('request')->isFormat('json')->

        with('response')->begin()->
        isStatusCode(200)->
        matches('/"valor"\:""/')->
        matches('/"obj_id"\:"faltas_7"/')->
        end()->



        info('Número de Faltas inválido')->
        post('/notas.json',array(
        'form' => array(
                7 => array('faltas' => 'a4')
        ),
        'obj_id' => 'faltas_7'
        ))->

        with('request')->isFormat('json')->

        with('response')->begin()->
        isStatusCode(200)->
        matches('/\{"code":4\}/')->
        end()->


        info('Faltas Ok')->
        post('/notas.json',array(
        'form' => array(
                7 => array('faltas' => 11)
        ),
        'obj_id' => 'faltas_7'
        ))->

        with('request')->isFormat('json')->

        with('response')->begin()->
        isStatusCode(200)->
        matches('/"valor"\:11/')->
        matches('/"obj_id"\:"faltas_7"/')->
        end()->


        

        info('Apagar nota')->
        post('/notas.json',array(
        'form' => array(
                7 => array( 'nota' => array( 1 => '' ) ),
        ),
        'obj_id' => 'nota_7_1'
        ))->

        with('request')->isFormat('json')->

        with('response')->begin()->
        isStatusCode(200)->
        matches('/"valor"\:"",/')->
        end()->




        info('Nota de aluno inexistente')->
        post('/notas.json',array(
        'form' => array(
                999 => array( 'nota' => array( 1 => 8 )),

        ),
        'obj_id' => 'nota_999_1'
        ))->

        with('request')->isFormat('json')->

        with('response')->begin()->
        isStatusCode(404)->
        matches('/Aluno n.+o cadastrado/')->
        end()->



        info('Nota inválida')->
        post('/notas.json',array(
        'form' => array(
                7 => array( 'nota' => array( 1=> "a8" ) ),
        ),
        'obj_id' => 'nota_7_1'
        ))->

        with('request')->isFormat('json')->

        with('response')->begin()->
        isStatusCode(200)->
        matches('/\{"code":5\}/')->
        end()->

        

        info('Nota Ok')->
        post('/notas.json',array(
        'form' => array(
                7 => array('nota' => array( 1 => 8 )),

        ),
        'obj_id' => 'nota_7_1'
        ))->

        with('request')->isFormat('json')->

        with('response')->begin()->
        isStatusCode(200)->
        matches('/"valor"\:"8.00"/')->
        matches('/"obj_id"\:"nota_7_1"/')->
        end()
;

logout($browser);