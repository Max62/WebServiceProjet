/**
 * Created by MAXIME on 01/10/15.
 */
$( document ).ready(function() {
    chargerLesCategories();
});


function chargerLesCategories(){

    $.ajax({
        method: "GET",
        url : "/WebServiceProjet/controller/GenreController.php",
        success: function(response) {
            var obj = jQuery.parseJSON(response);

            for(var i = 0; i < obj.length;i++){
                $("#mesGenres .dropdown").append("<li><a href='#'>" + obj[i].nametype + "</a></li>");
            }
        }
    });
};

$( "#searchBox" ).onkeyup(function( event ) {
    alert($( "#searchBox" ).val());
});


