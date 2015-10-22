<?php

require_once '../ws/IWebServiciable.php';
require_once '../ws/bdd.ini.php';
require_once '../ws/WS_Users.php';
require_once '../ws/WS_Securities.php';

const GET_CONNEXION_USER = 'connect';
const BE_SUBSCRIBED = 'subscribe';

class WS_Users implements IWebServiciable {

    function __construct() {

    }

    public function doGet() {

    }

    public function doPost() {


      if (!isset($_POST['action']))
        Helper::ThrowAccessDenied();

        switch ($_POST['action']){
              case GET_CONNEXION_USER:


                    $array = [
                        "login" => $_POST['login'],
                        "password" => $_POST['password']
                    ];

                    $sql = "SELECT lastname,firstname,mail,login,password FROM Users WHERE login = '".$array['login']."' AND password ='".$array['password']."'";

                    return returnOneLine($sql);

              case BE_SUBSCRIBED:

                    $array = [
                        "login" => $_POST['login'],
                        "firstname" => $_POST['firstname'],
                        "lastname" => $_POST['lastname'],
                        "email" => $_POST['email'],
                        "password" => $_POST['password']
                    ];

                      return execReqWithoutResult("INSERT INTO users(lastname, firstname, mail, login, password) VALUES ('".$array['lastname']."','".$array['firstname']."','".$array['email']."',''".$array['login']."','".$array['password']."')");

              default:
                Helper::ThrowAccessDenied();
                break;
        }
   }


    public function doPut() {

      parse_str(file_get_contents("php://input"),$post_vars);


}

?>
