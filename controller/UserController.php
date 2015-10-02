<?php

require_once '../ws/WS_Users.php';
require_once '../ws/WS_Securities.php';

//GEstion d'erreur
$className = "WS_Users";

switch ($_SERVER['REQUEST_METHOD']) {
    case "POST":
        $array = [
            "login" => $_POST['login'],
            "password" => $_POST['password']
        ];
        break;
    case "PUT":
        parse_str(file_get_contents("php://input"),$post_vars);
        $array = [
            "login" => $post_vars['login'],
            "firstname" => $post_vars['firstname'],
            "lastname" => $post_vars['lastname'],
            "email" => $post_vars['email'],
            "password" => $post_vars['password']
        ];
        break;
}

$ws_instance = new $className($array);
$ws_security = new WS_Securities();

//if($ws_instance->doNeedAuth())
//    if(!$ws_security->isAuth())
//        return 'error';

$method = "do".strtoupper($_SERVER['REQUEST_METHOD']);

$ws_response = $ws_instance->$method();

echo json_encode($ws_response);

