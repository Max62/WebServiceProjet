<?php

require_once '../ws/IWebServiciable.php';
require_once '../ws/bdd.ini.php';
require_once '../ws/WS_Livre.php';
require_once '../ws/WS_Securities.php';

  const GET_ALL_BOOKS = 'selectAllBooks';

class WS_Livre implements IWebServiciable {

    function __construct() {

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

}
