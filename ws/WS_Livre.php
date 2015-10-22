<?php

require_once '../ws/IWebServiciable.php';
require_once '../ws/bdd.ini.php';
require_once '../ws/WS_Livre.php';
require_once '../ws/WS_Securities.php';

  const GET_ALL_BOOKS = 'selectAllBooks';
  const GET_FUNCTION_OF_TERMS = 'searchByName';
  const addBook = "addBook";
  const DELETE_READING_USER = 'deleteRowReading';

  const SAVE_TIME_POSITION = 'setPositionTimeOfABook';

class WS_Livre implements IWebServiciable {

    function __construct() {

    }

    public function doPost() {

        if (!isset($_POST['action']))
            Helper::ThrowAccessDenied();

        switch ($_POST['action']){
            case GET_ALL_BOOKS:
                return returnOneArray("SELECT book.idbook,namebook,yearbook,author,urlbook,IFNULL(readbook.timePosition,0) as timePosition FROM book LEFT JOIN readbook ON readbook.idBook = book.idBook AND readbook.login = '".$_POST['login']."'");
            break;

            case GET_FUNCTION_OF_TERMS:
                return returnOneArray("SELECT book.idbook,namebook,yearbook,author,urlbook,IFNULL(readbook.timePosition,0) as timePosition FROM book LEFT JOIN readbook ON readbook.idBook = book.idBook AND readbook.login = '".$_POST['login']."' WHERE namebook LIKE '".$_POST['searchBoxValue']."%'");
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

            case SAVE_TIME_POSITION:

            $result = returnOneLine("SELECT IFNULL(COUNT(*),0) as existe FROM readbook WHERE idBook=".$_POST['idBook']." AND login='".$_POST['login']."'")['existe'];

            if ($result == 0)
              return execReqWithoutResult("INSERT INTO readbook(timePosition, login, idBook) VALUES ('".$_POST['TimePosition']."','".$_POST['login']."',".$_POST['idBook'].")");

            if ($result == 1)
              return execReqWithoutResult("UPDATE readbook SET TimePosition='".$_POST['TimePosition']."' WHERE login='".$_POST['login']."' AND idBook =".$_POST['idBook']."");

            break;

            case DELETE_READING_USER:
              return execReqWithoutResult("DELETE FROM readbook WHERE login='".$_POST['login']."' AND idBook=".$_POST['idb']);
            break;

            default:
                Helper::ThrowAccessDenied();
            break;
        }
    }

}
