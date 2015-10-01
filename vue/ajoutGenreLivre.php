<?php
/**
 * Created by PhpStorm.
 * User: maxim
 * Date: 01/10/2015
 * Time: 19:53
 */

$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__)  . $ds . '..') . $ds;
require_once("{$base_dir}vue{$ds}struct{$ds}header.php"); ?>

    <div class="row">
        <div class="large-12 columns">

            <nav class="top-bar" data-topbar>
                <ul class="title-area">
                    <!--
                                        <li class="name">
                                            <h1>
                                                <a href="#">
                                                    JEAN TOMBE RAID
                                                </a>
                                            </h1>
                                        </li>
                    -->
                    <li class="toggle-topbar menu-icon"><a href="#"><span>menu</span></a></li>
                </ul>

                <section class="top-bar-section">

                    <ul class="right">

                        <li class="has-form">
                            <div class="row collapse">
                                <div class="large-8 small-9 columns">
                                    <input type="text" placeholder="Indiquez le nom d'un livre" size="50">
                                </div>
                                <div class="large-4 small-3 columns">
                                    <a href="#" class="alert button expand">Rechercher</a>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li class="has-dropdown">
                            <a href="#">Genre</a>
                            <ul class="dropdown">
                                <?php
                                try {
                                    $bdd = new PDO('mysql:host=localhost;dbname=projetwebservice', 'root', '');
                                } catch (Exception $e) {
                                    die('Erreur : ' . $e->getMessage());
                                }

                                $sql = "SELECT * FROM type";

                                $res = $bdd->query($sql);
                                $res->setFetchMode(PDO::FETCH_OBJ);

                                while($genre = $res->fetch()){
                                    echo '<li><a href="#">'.$genre->nameType.'</a></li>';
                                }
                                ?>
                            </ul>
                        </li>
                        <li class="divider"></li>
                        <li><a href="#">Mon Compte</a></li>
                        <li><a href="/WebServiceProjet/vue/ajoutLivreAudio.php">Ajouter un livre</a></li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">Logout</a>
                        </li>
                    </ul>
                </section>
            </nav>

        </div>
    </div>

    <div class="row">
        <div class="large-12 columns">
            <form>
                <fieldset>
                    <legend>Ajout d'un genre de livre</legend>
                    <div class="row">

                        <div class="large-12 columns">
                            <div class="row collapse prefix-radius">
                                <div class="large-3 columns">
                                    <span class="prefix">Nom</span>
                                </div>
                                <div class="large-9 columns">
                                    <input type="text" required="required" placeholder="Nom">
                                </div>
                            </div>
                        </div>

                        <div class="large-12 columns">
                            <input class="button radius success right" type="submit" value="Ajouter">
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
        <div class="large-12 columns">
            <a href="/WebServiceProjet/vue/accueil.php"><button class="button radius left" value="back">Retour a l'accueil</button></a>
        </div>
    </div>

<?php
$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__)  . $ds . '..') . $ds;
require_once("{$base_dir}vue{$ds}struct{$ds}footer.php"); ?>