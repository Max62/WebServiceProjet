<?php

require_once '../ws/IWebServiciable.php';
require_once '../ws/bdd.ini.php';


class WS_Users implements IWebServiciable {

    public $requestParams;

    function __construct($requestParams) {
        $this->requestParams = $requestParams;
    }

    public function doDelete() {

    }

    public function doGet() {

    }

    public function doPost() {
        $sql = "SELECT lastname,firstname,mail,login,password FROM Users WHERE login = '".$this->requestParams['login']."' AND password ='".$this->requestParams['password']."'";

        return returnOneLine($sql);
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
