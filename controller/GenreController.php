<?php

require_once '../ws/WS_Genre.php';
require_once '../ws/WS_Securities.php';

//GEstion d'erreur
$className = "WS_Genre";

$array = [];

$ws_instance = new $className($array);
$ws_security = new WS_Securities();

//if($ws_instance->doNeedAuth())
//    if(!$ws_security->isAuth())
//        return 'error';

$method = "doGet";

$ws_response = $ws_instance->$method();


echo json_encode($ws_response);