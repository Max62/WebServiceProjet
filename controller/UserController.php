<?php

require_once '../ws/WS_Users.php';
require_once '../ws/WS_Livre.php';
require_once '../ws/WS_Securities.php';

//GEstion d'erreur
$className = "WS_Users";
$array = [
    "login" => $_POST['login'],
    "password" => $_POST['password']
];

$ws_instance = new $className($array);
$ws_security = new WS_Securities();

//if($ws_instance->doNeedAuth())
//    if(!$ws_security->isAuth())
//        return 'error';

$method = "do".strtoupper($_SERVER['REQUEST_METHOD']);

$ws_response = $ws_instance->$method();

$_SESSION["monUserCo"] = json_encode($ws_response);
echo json_encode($ws_response);

