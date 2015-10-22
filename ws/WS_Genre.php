<?php

require_once '../ws/IWebServiciable.php';
require_once '../ws/bdd.ini.php';
require_once '../ws/WS_Genre.php';

const GET_GENRES = 'getAllGenres';
const addGenre = 'addGenre';

class WS_Genre implements IWebServiciable {

    function __construct() {

    }

    public function doPost() {

        if (!isset($_POST['action']))
            Helper::ThrowAccessDenied();

        switch ($_POST['action']){
            case GET_GENRES:
                return returnOneArray("SELECT idtype,nametype FROM type");
            default:
                Helper::ThrowAccessDenied();
                break;
            case addGenre:
                $array = [
                    "nameType" => $_POST['nameType'],
                ];
                return execReqWithoutResult("INSERT INTO type(nameType) VALUES ('".$array['nameType']."')");
            default:
                Helper::ThrowAccessDenied();
                break;
        }

    }
}

?>
