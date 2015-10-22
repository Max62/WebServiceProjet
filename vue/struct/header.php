<?php
if(!isset($_SESSION['monUserCo'])){
      header('Location: /WebServiceProjet/index.php');
}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html class="no-js" lang="fr" >
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Projet WebService Audio</title>

        <link rel="stylesheet" href="/WebServiceProjet/asset/css/normalize.css">
        <link rel="stylesheet" href="/WebServiceProjet/asset/css/foundation.css">
        <link rel="stylesheet" href="/WebServiceProjet/asset/css/foundation-icons.css">
        <link rel="stylesheet" href="/WebServiceProjet/asset/css/foundation.min.css">
        <link rel="stylesheet" href="/WebServiceProjet/asset/css/style.css">


        <script src="/WebServiceProjet/asset/js/vendor/modernizr.js"></script>

    </head>

    <div class="row">
        <div class="large-12 columns">
            <input type="hidden" value="<?php echo $_SESSION['monUserCo']['login'] ?>" id="IDK"/>
            <nav class="top-bar" data-topbar>
                <ul class="title-area">

                    <li class="name">
                        <h1>
                            <a href="#">
                                <?php
                                  echo $_SESSION['monUserCo']['firstname']." ".$_SESSION['monUserCo']['lastname'];
                                ?>
                            </a>
                        </h1>
                    </li>

                    <li class="toggle-topbar menu-icon"><a href="#"><span>menu</span></a></li>
                </ul>

                <section class="top-bar-section">

                    <ul class="right">
                        <li class="has-form">
                            <div class="row collapse">
                                <!--<div class="large-8 small-9 columns">-->
                                <input type="text" placeholder="Indiquez le nom d'un livre" size="50" id="searchBox">
                                <!--</div>-->
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li class="has-dropdown" id="mesGenres">
                            <a href="#">Genre</a>
                            <ul class="dropdown">
                            </ul>
                        </li>
                        <li class="has-dropdown">
                            <a href="#">Ajouter</a>
                            <ul class="dropdown">
                                <li><a href="/WebServiceProjet/vue/ajoutLivreAudio.php">Un livre</a></li>
                                <li><a href="/WebServiceProjet/vue/ajoutGenreLivre.php">Un genre</a></li>
                                <li><a href="/WebServiceProjet/vue/ajoutSerie.php">Une s&eacute;rie</a></li>
                            </ul>
                        </li>
                        <li class="divider"></li>
                        <li><a href="/WebServiceProjet/vue/monCompte.php">Mon Compte</a></li>
                        <li class="divider"></li>
                        <li>
                            <a href="/WebServiceProjet/vue/struct/logout.php">Logout</a>
                        </li>
                    </ul>
                </section>
            </nav>

        </div>
    </div>
