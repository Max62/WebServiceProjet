/**
 * Created by MAXIME on 01/10/15.
 */
$( document ).ready(function() {
    loadTypes();
    loadBooks();
});


function loadTypes(){

    $.ajax({
        method: "GET",
        url : "/WebServiceProjet/controller/GenreController.php",
        success: function(response) {
            var obj = jQuery.parseJSON(response);
            $('#mesGenres .dropdown').on('click', '.itemDelete', function() {
                $(this).closest('li').remove();
            });
            for(var i = 0; i < obj.length;i++){
                $("#mesGenres .dropdown").append("<li><a href='#'>" + obj[i].nametype + "</a></li>");
            }
        }
    });
};

function loadBooks(){

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


