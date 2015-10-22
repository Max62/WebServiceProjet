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
                                    <input type="text" required="required" placeholder="Nom" id="nameBook">
                                </div>
                            </div>
                        </div>

                        <div class="large-12 columns">
                            <div class="row collapse prefix-radius">
                                <div class="large-3 columns">
                                    <span class="prefix">Ann&eacute;e</span>
                                </div>
                                <div class="large-9 columns">
                                    <input type="text" required="required" placeholder="Ann&eacute;e" id="yearBook">
                                </div>
                            </div>
                        </div>

                        <div class="large-12 columns">
                            <div class="row collapse prefix-radius">
                                <div class="large-3 columns">
                                    <span class="prefix">Auteur</span>
                                </div>
                                <div class="large-9 columns">
                                    <input type="text" required="required" placeholder="Auteur" id="author">
                                </div>
                            </div>
                        </div>

                        <div class="large-12 columns">
                            <div class="row collapse prefix-radius">
                                <div class="large-3 columns">
                                    <span class="prefix">URL du fichier</span>
                                </div>
                                <div class="large-9 columns">
                                    <input type="file" placeholder="URL du fichier" id="urlBook">
                                </div>
                            </div>
                        </div>

                        <div class="large-12 columns">
                            <div class="row collapse prefix-radius">
                                <div class="large-3 columns">
                                    <span class="prefix">&Eacute;pisode</span>
                                </div>
                                <div class="large-9 columns">
                                    <input type="text" required="required" placeholder="&Eacute;pisode" id="episode">
                                </div>
                            </div>
                        </div>

                        <div class="large-12 columns">
                            <div class="row collapse prefix-radius">
                                <div class="large-3 columns">
                                    <span class="prefix">S&eacute;rie</span>
                                </div>
                                <div class="large-9 columns">
                                    <select id="idSeries">
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="large-12 columns">
                            <div class="row collapse prefix-radius">
                                <div class="large-3 columns">
                                    <span class="prefix">Genre</span>
                                </div>
                                <div class="large-9 columns">
                                    <select id="idType">
                                </div>
                            </div>
                        </div>

                        <div class="large-12 columns">
                            <input class="button radius success right" type="submit" value="Ajouter" id="AddBook">
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

    $( "#AddBook" ).click(function() {
            $.ajax({
                method: "POST",
                url : "/WebServiceProjet/controller/monController.php",
                data: { ws: 'livre', action : 'addBook',nameBook: $("#nameBook").val(), yearBook: $("#yearBook").val(), author: $("#author").val(), urlBook : $("#urlBook").val(), episode : $("#episode").val(), idSeries: $("#idSeries").val(), idType: $("#idType").val()},
                success: function(response) {
                    console.log(response);
                    $("body").append("<p color:'green;'>Livre ajouté ! </p>");
                }
            });
    });

    function loadSeries(){
        $.ajax({
            method: "POST",
            url : "/WebServiceProjet/controller/monController.php",
            data: { ws: 'series', action : 'getAllSeries'},
            success: function(response) {
                var obj = jQuery.parseJSON(response);
 //               $('#allSeries .dropdown').on('click', '.itemDelete', function() {
 //                   $(this).closest('li').remove();
 //               });
                for(var i = 0; i < obj.length;i++){
                    $("select#idSeries").append("<option value='"+ obj[i].idSeries+"'>"+ obj[i].nameSeries + "</option>");
                }
            }
        });
    };

    function loadAllType(){
        $.ajax({
            method: "POST",
            url : "/WebServiceProjet/controller/monController.php",
            data: { ws: 'genre', action : 'getAllGenres'},
            success: function(response) {
                var obj = jQuery.parseJSON(response);
                for(var i = 0; i < obj.length;i++){
                    $("select#idType").append("<option value='"+ obj[i].idtype+"'>"+ obj[i].nametype + "</option>");
                }
            }
        });
    };

    $(document).ready(function(){
        loadSeries();
        loadAllType();
    });
</script>
