<?php

require_once '../ws/IWebServiciable.php';
require_once '../ws/bdd.ini.php';
require_once '../ws/WS_Users.php';
require_once '../ws/WS_Securities.php';

const GET_CONNEXION_USER = 'connect';
const BE_SUBSCRIBED = 'subscribe';
const getDetailsUser = 'getDetailsUser';
const updateUser = 'updateUser';

class WS_Users implements IWebServiciable {

    function __construct() {

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


               case getDetailsUser:

                $sql = "SELECT lastname,firstname,mail,login FROM Users WHERE login = '".$_POST['login']."'";

                return returnOneLine($sql);

               case updateUser:
                $array = [
                    "lastName" => $_POST['lastName'],
                    "firstName" => $_POST['firstName'],
                    "mail" => $_POST['mail'],
                    "login" => $_POST['login'],
                    "password" => $_POST['password'],
                ];


                return execReqWithoutResult("UPDATE users SET lastName='".$array['lastName']."',firstName='".$array['firstName']."',login='".$array['login']."',mail='".$array['mail']."',password='".$array['password']."' WHERE login = '".$_POST['login']."'");


            case BE_SUBSCRIBED:

                    $array = [
                        "login" => $_POST['login'],
                        "firstname" => $_POST['firstname'],
                        "lastname" => $_POST['lastname'],
                        "email" => $_POST['email'],
                        "password" => $_POST['password']
                    ];


                      return execReqWithoutResult("INSERT INTO users(lastname, firstname, mail, login, password) VALUES ('".$array['lastname']."','".$array['firstname']."','".$array['email']."','".$array['login']."','".$array['password']."')");
             default:
                Helper::ThrowAccessDenied();
                break;
        }
   }
}

?>
