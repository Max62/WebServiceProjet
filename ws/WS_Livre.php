<?php

require_once '../ws/IWebServiciable.php';
require_once '../ws/bdd.ini.php';
require_once '../ws/WS_Livre.php';
require_once '../ws/WS_Securities.php';


class WS_Livre implements IWebServiciable {

    const GET_ALL_BOOKS = 'selectAll';

    function __construct() {
    
    }

    public function doDelete() {

    }

    public function doGet() {


      if (!isset($_GET['action']))
        Helper::ThrowAccessDenied();

      switch ($_GET['action']){
            case GET_ALL_BOOKS:
              return returnOneArray("SELECT idbook,namebook,yearbook,author,urlbook FROM book");
            default:
              Helper::ThrowAccessDenied();
              break;
      }
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
