<?php

include(dirname(__FILE__).'/../../bootstrap/functional.php');
include(dirname(__FILE__).'/auth.functions.php');

$browser = new sfTestFunctional(new sfBrowser());

login($browser);

$browser->get('/sumula')->

        with('request')->begin()->
        isParameter('module', 'sumula')->
        isParameter('action', 'index')->
        end()->

        with('response')->begin()->
        isStatusCode(404)->
        end()->

        get('/sumula?id=1')->
        with('request')->begin()->
        isParameter('module', 'sumula')->
        isParameter('action', 'index')->
        end()->

        with('response')->begin()->
        isStatusCode(200)->
        click('Adicionar')->
        end()->

        with('request')->begin()->
        isParameter('module', 'sumula')->
        isParameter('action', 'new')->
        end();


        $browser->click('Salvar',array(
        'data'      => '2010-01-01',
        'descricao' => 'Teste Sumula 1'
        ))->
        
        with('form')->begin()->
        hasErrors(true)->
        isError('data','invalid')->
        isError('descricao','invalid')->
        end()->
        
        with('response')->begin()->
        isStatusCode(302)->
        followRedirect()->
        end();

logout($browser);