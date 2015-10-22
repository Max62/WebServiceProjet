/**
 * Created by MAXIME on 01/10/15.
 */
$( document ).ready(function() {
    loadTypes();
    totalBooks();
    loadBooks();
});


function loadTypes(){

    $.ajax({
        method: "POST",
        url : "/WebServiceProjet/controller/monController.php",
        data: { ws: 'genre', action : 'getAllGenres'},
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

function totalBooks(){

    $.ajax({
        method: "POST",
        url : "/WebServiceProjet/controller/monController.php",
        data: { ws: 'livre', action : 'getTotalBooks'},
        success: function(response) {
            $('.panel.callout.radius').html('<h6><b>' + jQuery.parseJSON(response)[0].cpt + ' Livre(s) disponible(s) !</b></h6')
        }
    });
};



function loadBooks(){
    $.ajax({
        method: "POST",
        url : "/WebServiceProjet/controller/monController.php",
        data: { ws: 'livre', action : 'selectAllBooks'},
        success: function(response) {
            var obj = jQuery.parseJSON(response);
            $($(".row ").children(".large-8").children(".row")).empty();
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
                "</div>").hide().fadeIn("slow");
            }
        }
    });
};

$("#searchBox").keyup(function(){
  var valeureSaisie = $('#searchBox').val();

  if (valeureSaisie != null){
    $.ajax({
        method: "POST",
        url : "/WebServiceProjet/controller/monController.php",
        data: { ws: 'livre', action : 'searchByName', searchBoxValue : valeureSaisie},
        success: function(response) {
            var obj = jQuery.parseJSON(response);
            $($(".row ").children(".large-8").children(".row")).empty();
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
                "</div>").hide().fadeIn("slow");
            }
        }
    });
  }else{
    loadBooks();
  }

});
