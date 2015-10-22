<?php

require_once '../ws/IWebServiciable.php';
require_once '../ws/bdd.ini.php';
require_once '../ws/WS_Series.php';

const GET_SERIES = 'getAllSeries';
const addSerie = 'addSerie';

class WS_Series implements IWebServiciable {

    function __construct() {

    }

    public function doPost() {

        if (!isset($_POST['action']))
            Helper::ThrowAccessDenied();

        switch ($_POST['action']){
            case GET_SERIES:
                return returnOneArray("SELECT idSeries,nameSeries FROM series");
            default:
                Helper::ThrowAccessDenied();
                break;
            case addSerie:
                $array = [
                    "nameSeries" => $_POST['nameSeries'],
                ];
                return execReqWithoutResult("INSERT INTO series (nameSeries) VALUES ('".$array['nameSeries']."')");
            default:
                Helper::ThrowAccessDenied();
                break;
        }
    }
}
?>
