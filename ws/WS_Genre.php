<?php

require_once '../ws/IWebServiciable.php';
require_once '../ws/bdd.ini.php';


class WS_Users implements IWebServiciable {

    public $requestParams;

    function __construct($requestParams) {
        $this->requestParams = $requestParams;
    }

    public function doDelete() {

    }

    public function doGet() {
        try
        {
            $pdo = getConnexion();
            $pdo->beginTransaction();

            $sql = "SELECT idtype,nametype FROM type";
            $res = $pdo->query($sql);

            if ($res) {
                echo "mesGenres";
                echo "<pre>";
                print_r($res);
                echo "</pre>";
                $row = $res->fetch(PDO::FETCH_ASSOC);
                return $row;
            }

        }
        catch(Exception $e) //en cas d'erreur
        {
            //on annule la transation
            $pdo->rollback();

            //on affiche un message d'erreur ainsi que les erreurs
            echo 'Tout ne s est pas bien passé voir les erreurs ci-dessous<br />';
            echo 'Erreur : '.$e->getMessage().'<br />';
            echo 'N° : '.$e->getCode();

            //on arrête l'exécution s'il y a du code après
            exit();
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

?>
