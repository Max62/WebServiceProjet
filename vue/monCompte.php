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
                <legend>Informations du compte</legend>
                <div class="row">

                    <div class="large-12 columns">
                        <div class="row collapse prefix-radius">
                            <div class="large-3 columns">
                                <span class="prefix">Nom</span>
                            </div>
                            <div class="large-9 columns">
                                <input type="text" required="required" placeholder="Nom" id="lastName">
                            </div>
                        </div>
                    </div>

                    <div class="large-12 columns">
                        <div class="row collapse prefix-radius">
                            <div class="large-3 columns">
                                <span class="prefix">Pr&eacute;nom</span>
                            </div>
                            <div class="large-9 columns">
                                <input type="text" placeholder="Pr&eacute;nom" id="firstName">
                            </div>
                        </div>
                    </div>

                    <div class="large-12 columns">
                        <div class="row collapse prefix-radius">
                            <div class="large-3 columns">
                                <span class="prefix">Mail</span>
                            </div>
                            <div class="large-9 columns">
                                <input type="text" placeholder="Mail" id="mail">
                            </div>
                        </div>
                    </div>

                    <div class="large-12 columns">
                        <div class="row collapse prefix-radius">
                            <div class="large-3 columns">
                                <span class="prefix">Login</span>
                            </div>
                            <div class="large-9 columns">
                                <input type="text" placeholder="login" id="login" readonly="readonly">
                            </div>
                        </div>
                    </div>

                    <div class="large-12 columns">
                        <div class="row collapse prefix-radius">
                            <div class="large-3 columns">
                                <span class="prefix">Mot de passe</span>
                            </div>
                            <div class="large-9 columns">
                                <input type="password" placeholder="Mot de passe" id="password">
                            </div>
                        </div>
                    </div>

                    <div class="large-12 columns">
                        <input class="button radius success right" type="submit" value="Modifier" id="updateUser">
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

    $( "#updateUser" ).click(function() {
        $.ajax({
            method: "POST",
            url : "/WebServiceProjet/controller/monController.php",
            data: { ws: 'users', action : 'updateUser',lastName: $("#lastName").val(), firstName: $("#firstName").val(), mail: $("#mail").val(), login: $("#login").val(),password: $("#password").val()},
            success: function(response) {
                console.log(response);
                $("body").append("<p color:'green;'>Utilisateur modifié ! </p>");
            }
        });
    });


    function loadDetails(){
        $.ajax({
            method: "POST",
            url : "/WebServiceProjet/controller/monController.php",
            data: { ws: 'users', action : 'getDetailsUser',login: $("#IDK").val()},
            success: function(response) {
                var obj = jQuery.parseJSON(response);
                        $("#mail").val(obj.mail);
                        $("#firstName").val(obj.firstname);
                        $("#lastName").val(obj.lastname);
                        $("#login").val(obj.login);
            }
        });
    };

    $(document).ready(function(){
        loadDetails();
    });
</script>
