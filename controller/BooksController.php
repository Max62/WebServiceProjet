<?php
//$method = "do".strtoupper($_SERVER['REQUEST_METHOD']);
require_once '../ws/WS_Livre.php';
require_once '../ws/WS_Securities.php';

//GEstion d'erreur
$className = "WS_Livre";

switch ($_SERVER['REQUEST_METHOD']) {
    case "GET":
       $array = [];
        break;
    case "PUT":
$array = [];
  break;
}

$array = [];

$ws_instance = new $className($array);
$ws_security = new WS_Securities();

//if($ws_instance->doNeedAuth())
//    if(!$ws_security->isAuth())
//        return 'error';

$method = "doGet";

$ws_response = $ws_instance->$method();


echo json_encode($ws_response);