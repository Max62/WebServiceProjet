<?php

require_once '../ws/IWebServiciable.php';
require_once '../ws/bdd.ini.php';
require_once '../ws/WS_Users.php';
require_once '../ws/WS_Securities.php';



class WS_Users implements IWebServiciable {

    function __construct() {

    }

    public function doDelete() {

    }

    public function doGet() {

    }

    public function doPost() {

      $array = [
          "login" => $_POST['login'],
          "password" => $_POST['password']
      ];

        $sql = "SELECT lastname,firstname,mail,login,password FROM Users WHERE login = '".$array['login']."' AND password ='".$array['password']."'";

        return returnOneLine($sql);
    }

    public function doPut() {

      parse_str(file_get_contents("php://input"),$post_vars);
      $array = [
          "login" => $post_vars['login'],
          "firstname" => $post_vars['firstname'],
          "lastname" => $post_vars['lastname'],
          "email" => $post_vars['email'],
          "password" => $post_vars['password']
      ];


        return execReqWithoutResult("INSERT INTO users(lastname, firstname, mail, login, password) VALUES ('".$array['lastname']."','".$array['firstname']."','".$array['email']."',''".$array['login']."','".$array['password']."')");
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
