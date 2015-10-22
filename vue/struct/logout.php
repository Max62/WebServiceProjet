<?php
        session_start();

        session_unset();
        session_destroy();
        header('Location: /WebServiceProjet/index.php');


 ?>
