<?php

require_once '../ws/IWebServiciable.php';
require_once '../ws/bdd.ini.php';


class WS_Genre implements IWebServiciable {

    public $requestParams;

    function __construct($requestParams) {
        $this->requestParams = $requestParams;
    }

    public function doDelete() {

    }

    public function doGet() {
        return returnOneArray("SELECT idtype,nametype FROM type");
    }

    public function doPost() {

    }

    public function doPut() {

    }

    public function doRequest() {

    }


    public function setParameters() {

    }

    public function doNeedAuth() {
        return true;
    }
}

?>
