<?php

require_once '../ws/IWebServiciable.php';
require_once '../ws/bdd.ini.php';
require_once '../ws/WS_Genre.php';

class WS_Genre implements IWebServiciable {

    const GET_GENRES = 'getAllGenres';

    function __construct() {

    }

    public function doGet() {

      if (!isset($_GET['action']))
        Helper::ThrowAccessDenied();


      switch ($_GET['action']){
            case GET_GENRES:
              return returnOneArray("SELECT idtype,nametype FROM type");
            default:
              Helper::ThrowAccessDenied();
              break;
      }

    }

    public function doPost() {

    }
}

?>
