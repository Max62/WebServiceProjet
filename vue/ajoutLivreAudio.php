<?php
/**
 * Created by PhpStorm.
 * User: maxim
 * Date: 01/10/2015
 * Time: 17:18
 */

session_start();

if(isset($_POST['client'])){
    $_SESSION['monUserCo'] = $_POST['client'];
}

if(isset($_POST['logout'])){
    if ($_POST['logout'] == true){
        session_unset();
        session_destroy();
        header('Location: /WebServiceProjet/index.php');
    }
}


$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__)  . $ds . '..') . $ds;
require_once("{$base_dir}vue{$ds}struct{$ds}header.php"); ?>

    <div class="row">
        <div class="large-12 columns">
            <form>
                <fieldset>
                    <legend>Ajout d'une livre audio</legend>
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
                            <div class="row collapse prefix-radius">
                                <div class="large-3 columns">
                                    <span class="prefix">Annee</span>
                                </div>
                                <div class="large-9 columns">
                                    <input type="text" required="required" placeholder="Annee">
                                </div>
                            </div>
                        </div>

                        <div class="large-12 columns">
                            <div class="row collapse prefix-radius">
                                <div class="large-3 columns">
                                    <span class="prefix">Auteur</span>
                                </div>
                                <div class="large-9 columns">
                                    <input type="text" required="required" placeholder="Auteur">
                                </div>
                            </div>
                        </div>

                        <div class="large-12 columns">
                            <div class="row collapse prefix-radius">
                                <div class="large-3 columns">
                                    <span class="prefix">Genre</span>
                                </div>
                                <div class="large-9 columns">
                                    <FORM>
                                        <SELECT name="genre" size="1">
                                            <OPTION>lundi
                                            <OPTION>mardi
                                            <OPTION>mercredi
                                            <OPTION>jeudi
                                            <OPTION>vendredi
                                        </SELECT>
                                    </FORM>
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