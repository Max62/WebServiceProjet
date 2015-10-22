<?php

require_once '../ws/IWebServiciable.php';
require_once '../ws/bdd.ini.php';
require_once '../ws/WS_Livre.php';
require_once '../ws/WS_Securities.php';

  const GET_ALL_BOOKS = 'selectAllBooks';
  const GET_TOTAL_BOOKS = 'getTotalBooks';
  const GET_FUNCTION_OF_TERMS = 'searchByName';
  const addBook = "addBook";

class WS_Livre implements IWebServiciable {

    function __construct() {

    }

    public function doPost() {

        if (!isset($_POST['action']))
            Helper::ThrowAccessDenied();

        switch ($_POST['action']){
            case GET_ALL_BOOKS:
                return returnOneArray("SELECT idbook,namebook,yearbook,author,urlbook FROM book");
            break;

            case GET_TOTAL_BOOKS:
                return returnOneArray("SELECT COUNT(*) as cpt FROM book");
            break;

            case GET_FUNCTION_OF_TERMS:
                return returnOneArray("SELECT idbook,namebook,yearbook,author,urlbook FROM book WHERE namebook LIKE '".$_POST['searchBoxValue']."%'");
            break;

            case addBook:
                $array = [
                    "nameBook" => $_POST['nameBook'],
                    "yearBook" => $_POST['yearBook'],
                    "author" => $_POST['author'],
                    "urlBook" => $_POST['urlBook'],
                    "episode" => $_POST['episode'],
                    "idSeries" => $_POST['idSeries'],
                    "idType" => $_POST['idType']
                ];


                return execReqWithoutResult("INSERT INTO book(nameBook, yearBook, author, urlBook, episode, idSeries, idType) VALUES ('".$array['nameBook']."','".$array['yearBook']."','".$array['author']."','".$array['urlBook']."','".$array['episode']."','".$array['idSeries']."','".$array['idType']."')");
            default:
                Helper::ThrowAccessDenied();
                break;


            default:
                Helper::ThrowAccessDenied();
            break;
        }
    }

}
