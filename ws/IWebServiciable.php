<?php

interface IWebServiciable {

    function __construct();

    public function setParameters();

    public function doRequest();
    public function doGet();
    public function doPost();
    public function doPut();
    public function doDelete();
    public function doNeedAuth();

}

?>
