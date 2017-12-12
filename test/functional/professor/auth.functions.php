<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
*/

function login(&$browser) {

    $browser->info('Login ok')->

            get('/painel/index')->

            with('response')->begin()->
            isStatusCode(200)->
            checkElement('div.authform div.t', '/Professor - Autenticação/')->
            end()->


            click('entrar',array('signin' => array(
                    'matricula' => '4124',
                    'siape'     => '1529795',
                    'senha'     => '12',
            )))->

            with('response')->begin()->
            isStatusCode(302)->
            followRedirect()->
            end();

}

function logout(&$browser) {
    
    $browser->info('Logout')->

            get('/auth/signout')->

            with('response')->begin()->
            isStatusCode(302)->
            followRedirect()->
            end()->

            with('response')->begin()->
            checkElement('div.authform div.t', 'Professor - Autenticação')->
            end();
}