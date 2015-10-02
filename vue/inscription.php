<?php
if(isset($_POST['client'])){
    header('Location: /WebServiceProjet/vue/accueil.php');
}
?>

    <html class="no-js" lang="fr" >

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Projet WebService Audio</title>

        <link rel="stylesheet" href="/WebServiceProjet/asset/css/normalize.css">
        <link rel="stylesheet" href="/WebServiceProjet/asset/css/foundation.css">


        <script src="../asset/js/vendor/modernizr.js"></script>

    </head>

    <div class="row">
        <div class="large-12 columns">
            <h2>Page d'inscription</h2>
        </div>
        <div class="large-12 columns">
            <form>
                <fieldset>
                    <legend>Inscription</legend>
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
                                    <span class="prefix">Prénom</span>
                                </div>
                                <div class="large-9 columns">
                                    <input type="text" required="required" placeholder="Prénom">
                                </div>
                            </div>
                        </div>

                        <div class="large-12 columns">
                            <div class="row collapse prefix-radius">
                                <div class="large-3 columns">
                                    <span class="prefix">Email</span>
                                </div>
                                <div class="large-9 columns">
                                    <input type="text" required="required" placeholder="Email">
                                </div>
                            </div>
                        </div>

                        <div class="large-12 columns">
                            <div class="row collapse prefix-radius">
                                <div class="large-3 columns">
                                        <span class="prefix">Login</span>
                                </div>
                                <div class="large-9 columns">
                                    <input type="text" required="required" placeholder="Login">
                                </div>
                            </div>
                        </div>

                        <div class="large-12 columns">
                            <div class="row collapse prefix-radius">
                                <div class="large-3 columns">
                                    <span class="prefix">Mot de passe</span>
                                </div>
                                <div class="large-9 columns">
                                    <input type="password" required="required" placeholder="Mot de passe">
                                </div>
                            </div>
                        </div>

                        <div class="large-12 columns">
                            <div class="row collapse prefix-radius">
                                <div class="large-3 columns">
                                    <span class="prefix">Confirmer le mot de passe</span>
                                </div>
                                <div class="large-9 columns">
                                    <input type="password" required="required" placeholder="Confirmer le mot de passe">
                                </div>
                            </div>
                        </div>

                        <div class="large-12 columns">
                            <input class="button radius success right" type="submit" value="S'inscrire">
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
        <div class="large-12 columns">
            <a href="/WebServiceProjet"><button class="button radius left" value="back">Retour</button></a>
        </div>
    </div>

<?php
$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__)  . $ds . '..') . $ds;
require_once("inscription.php"); ?>