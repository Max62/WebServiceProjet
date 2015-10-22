<?php
/**
 * Created by PhpStorm.
 * User: maxim
 * Date: 01/10/2015
 * Time: 19:53
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
                    <legend>Ajout d'un genre de livre</legend>
                    <div class="row">

                        <div class="large-12 columns">
                            <div class="row collapse prefix-radius">
                                <div class="large-3 columns">
                                    <span class="prefix">Nom</span>
                                </div>
                                <div class="large-9 columns">
                                    <input type="text" required="required" placeholder="Nom du genre" id="nameType">
                                </div>
                            </div>
                        </div>

                        <div class="large-12 columns">
                            <input class="button radius success right" type="submit" value="Ajouter" id="AjoutGenre">
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

<script src="/WebServiceProjet/asset/js/vendor/jquery.js"></script>
<script src="/WebServiceProjet/asset/js/foundation.min.js"></script>
<script>

    $( "#AjoutGenre" ).click(function() {
            $.ajax({
                method: "POST",
                url : "/WebServiceProjet/controller/monController.php",
                data: { ws: 'genre', action : 'addGenre',nameType: $("#nameType").val()},
                success: function(response) {
                    console.log(response);
                    $("body").append("<p color:'green;'>Genre ajouté ! </p>");
                }
            });
    });

</script>
