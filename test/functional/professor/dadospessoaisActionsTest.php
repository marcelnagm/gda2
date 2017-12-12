<?php

include(dirname(__FILE__).'/../../bootstrap/functional.php');

$browser = new sfTestFunctional(new sfBrowser());

function login(&$browser) {

    $browser->info('Login')->

            with('response')->begin()->
            isStatusCode(200)->
            checkElement('div.authform div.t', '/Professor - Autenticação/')->
            end()->

            click('entrar',array('signin' => array(
                    'matricula' => '4124',
                    'siape'     => '1529795',
                    'senha'     => '12',
            )))->
            followRedirect();

}

$browser->get('/dadospessoais/index');

login($browser);


$browser->info('Alterar dados pessoais')->
        get('/dadospessoais/edit')->
        click('Salvar',array('dadospessoais' => array(
                'celular'          => '8117123123',
                'fone_residencial' => '12312312312',
                'email'            => 'qwe@asdasd.com',
        )))->
        followRedirect()->
        with('response')->begin()->
        isStatusCode(200)->
        checkElement('div#notice', '/Dados pessoais salvos com sucesso/')->
        end();

$browser->info('Alterar senha')->
        get('/dadospessoais/alterarSenha')->
        
        with('form')->begin()->

        info('Form vazio')->
        click('Salvar',array('chgpass' => array(
                'senha_atual'  => '',
                'senha_nova'   => '',
                'senha_nova_2' => '',
        )))->
        hasErrors(4)->

        info('Senha atual errada')->
        click('Salvar',array('chgpass' => array(
                'senha_atual'  => 'aaa',
                'senha_nova'   => '123',
                'senha_nova_2' => '123',
        )))->
        hasErrors(1)->

        info('Senhas novas diferentes')->
        click('Salvar',array('chgpass' => array(
                'senha_atual'  => 'aaa',
                'senha_nova'   => 'bbb',
                'senha_nova_2' => 'ccc',
        )))->
        hasErrors(1)->

        info('Senhas ok')->
        click('Salvar',array('chgpass' => array(
                'senha_atual'  => '12',
                'senha_nova'   => '123',
                'senha_nova_2' => '123',
        )))->
        get('/dadospessoais/alterarSenha')->
        click('Salvar',array('chgpass' => array(
                'senha_atual'  => '123',
                'senha_nova'   => '12',
                'senha_nova_2' => '12',
        )))->
        end()->
        followRedirect()->
        with('response')->begin()->
        isStatusCode(200)->
        checkElement('div#notice', '/Senha alterada com sucesso/')->
        end();
