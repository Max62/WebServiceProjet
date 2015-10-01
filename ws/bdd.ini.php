<?php

function getConnexion(){

try
{
    $pdo = new PDO('mysql:host=localhost:8889;dbname=ProjetWebService', 'root', 'root');
    return $pdo;
}
catch(Exception $e)
{
    echo 'Echec de la connexion à la base de données';
    echo 'Erreur : '.$e->getMessage().'<br />';
    echo 'N° : '.$e->getCode();
    exit();
}
}

?>