<?php

include(dirname(__FILE__).'/../../bootstrap/functional.php');
include(dirname(__FILE__).'/auth.functions.php');

$browser = new sfTestFunctional(new sfBrowser());



$browser->info('Teste do form de login ao acessar uma URL do sistema sem se autenticar')->

        get('/turma/index')->

        with('response')->begin()->
        isStatusCode(200)->
        checkElement('div.authform div.t', 'Professor - Autenticação')->
        end();



$browser->info('Cadastro de senha')->

        get('/cadastroSenha')->

        with('request')->begin()->
        isParameter('module','auth')->
        isParameter('action','cadastroSenha')->
        end()->

        with('response')->begin()->
        isStatusCode(200)->
        checkElement('div.authform div.t', 'Cadastro de senha')->
        end();

$browser->info('Cadastro de senha - form vazio')->

        with('form')->begin()->

        click('Salvar', array(
        'matricula_prof' => '',
        'siape'          => '',
        'email'          => '',
        'senha_nova'     => '',
        'senha_nova_2'   => '',
        ))->

        hasErrors(6)->
        end();

$browser->info('Cadastro de senha - já cadastrada')->

        with('form')->begin()->

        click('Salvar',array('chgpass' => array(
                'matricula_prof' => '4124',
                'siape'          => '1529795',
                'email'          => 'test@email.com',
                'senha_nova'     => 'aaa',
                'senha_nova_2'   => 'aaa',
        )))->
        hasErrors(1)->
        end();


$browser->info('Apaga senha no banco para testar o cadastro');
$affectedRows = TbprofessorsenhaPeer::doDelete('4124');

if($affectedRows==1) {
    $browser->info('Cadastro de senha - ok')->

//            with('form')->begin()->

            click('Salvar',array('chgpass' => array(
                    'matricula_prof' => '4124',
                    'siape'          => '1529795',
                    'email'          => 'test@email.com',
                    'senha_nova'     => '12',
                    'senha_nova_2'   => '12',
            )))->
//            end()->
//            with('response')->begin()->
//            isStatusCode(302)->
//            followRedirect()->
//            end()->

            with('response')->begin()->
//            isStatusCode(200)->
            checkElement('div#notice', '/Senha salva com sucesso/')->
            end();
}

$browser->info('Form de login vazio')->

        get('/turma/index')->

        with('form')->begin()->

        click('entrar', array(
        'matricula' => '',
        'siape' => '',
        'senha' => '',
        ))->

        hasErrors(4)->
        isError('matricula', 'required')->
        isError('siape', 'required')->
        isError('senha', 'required')->
        end();


$browser->info('Form de login com dados inválidos')->

        with('form')->begin()->

        click('entrar',array('signin' => array(
                'matricula' => 'qwe',
                'siape'     => 'qwe',
                'senha'     => '2rr',
        )))->
        hasErrors(3)->
        end();


$browser->info('Form de login com a senha errada')->

        with('form')->begin()->

        click('entrar',array('signin' => array(
                'matricula' => '4124',
                'siape'     => '1529795',
                'senha'     => '123',
        )))->
        hasErrors(1)->
        end();

login($browser);

$browser->info('Teste de acesso ao módulo turma')->

        get('/turma/index')->

        with('response')->begin()->
        isStatusCode(200)->
        checkElement('div#conteudo h1', 'Lista de turmas')->
        end();


logout($browser);
