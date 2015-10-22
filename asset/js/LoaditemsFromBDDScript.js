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
        url : "/WebServiceProjet/controller/monController.php?ws=genre&action=getAllGenres",
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
        url : "/WebServiceProjet/controller/monController.php?ws=livre&action=selectAllBooks",
        success: function(response) {
            var obj = jQuery.parseJSON(response);

            for(var i = 0; i < obj.length;i++){
                $($(".row ").children(".large-8").children(".row")).append("<br><br>" +
                "<div class='large-12 columns'>" +
                    "<div class='panel'>" +
                      "<div class='row'>" +

                        "<div class='large-2 small-6 columns'>" +
                        "<img src='/WebServiceProjet/ressource/listen.jpeg'>" +
                        "</div>" +

                        "<div class='large-10 small-6 columns'>" +
                             "<strong>" + obj[i].namebook + " - " + obj[i].yearbook + " par " + obj[i].author + "<hr/></strong>" +

                            "<audio controls='controls' preload='none'>" +
                             "<source src='" + obj[i].urlbook + "' type='audio/mp3' />" +
                            "</audio>"+
                        "</div>"+

                    "</div>"+
                "</div>"+
                "</div>");
            }
        }
    });
};

$( "#searchBox" ).onkeyup(function( event ) {
    alert($( "#searchBox" ).val());
});


