<?php

require_once '../ws/IWebServiciable.php';


class WS_Livre implements IWebServiciable {
    
    public $requestParams;
    
    function __construct($requestParams) {
        $this->requestParams = $requestParams;
    }

    public function doDelete() {
        
    }

    public function doGet() {

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

