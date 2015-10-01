<?php

require_once '../ws/WS_Users.php';
require_once '../ws/WS_Livre.php';
require_once '../ws/WS_Securities.php';

//GEstion d'erreur
$className = "WS_Users";

$array = [
    "login" => $_GET['login'],
    "password" => $_GET['password']
];

$ws_instance = new $className($array);
$ws_security = new WS_Securities();

//if($ws_instance->doNeedAuth())
//    if(!$ws_security->isAuth())
//        return 'error';

$method = "do".strtoupper($_SERVER['REQUEST_METHOD']);

$ws_response = $ws_instance->$method();

switch ($_SERVER['REQUEST_METHOD']) {
    case 'PUT':
        $ws_response = $ws_instance->doPut();
        break;
    case 'DELETE':
        $ws_response = $ws_instance->doDelete();
        break;
    case 'GET':
        $ws_response = $ws_instance->doGet();
        break;
    case 'POST':
        $ws_response = $ws_instance->doPost();
        break;

    default:
        break;
}


echo json_encode($ws_response);

