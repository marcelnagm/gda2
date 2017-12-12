<?php
require_once(dirname(__FILE__).'/../../config/ProjectConfiguration.class.php');

$configuration = ProjectConfiguration::getApplicationConfiguration('admin', 'dev', true);
$cntext = sfContext::createInstance($configuration);

//error_reporting(E_ALL);
//ini_set('display_errors', 1);
if (!in_array(@$_SERVER['REMOTE_ADDR'], array('127.0.0.1', '::1','172.22.10.14','200.129.159.249','200.129.159.241','172.22.23.50','10.0.1.115')))
{
//echo 'asdfasdfasdfasdf' . sfContext::getInstance()->getUser()->hasCredential('admin_usuarios');
    if (!sfContext::getInstance()->getUser()->isAuthenticated()) {
        die('You are not allowed to access this file. Check '.basename(__FILE__).' for more information.');
    }
}

$cntext->dispatch();