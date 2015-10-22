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
            $('.panel.callout.radius').html('<h6><b>' + jQuery.parseJSON(response)[0].cpt + ' Livre(s) disponible(s) !</b></h6');
        }
    });
}



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

                          //  "<audio controls='controls' preload='none'>" +
                          "<audio src='" + obj[i].urlbook + "' type='audio/mp3' id='"+obj[i].idbook+"'/>" +
                          "<button type='button'  name='play' value='Play' class='fi-play' onclick='play("+obj[i].idbook+")'>"+
                          "   PLAY" +
                          "</button>"+
                          "<span>" + "    " +
                          "</span>" +
                          "<button type='button'  name='stop' value='Stop' class='fi-stop' onclick='stop("+obj[i].idbook+")'>"+
                          "   STOP" +
                          "</button>" +
                          "<span>" + "    " +
                          "</span>" +
                          "<h6 id='currentReading'></h1>"+
                            //"</audio>"+
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

                            //"<audio controls='controls' preload='none'>" +
                            "<audio src='" + obj[i].urlbook + "' type='audio/mp3' id='"+obj[i].idbook+"' />" +
                            "<button type='button'  name='play' value='Play' class='fi-play' onclick='play("+obj[i].idbook+")'>"+
                            "   PLAY" +
                            "</button>"+
                            "<span>" + "    " +
                            "</span>" +
                            "<button type='button'  name='stop' value='Stop' class='fi-stop' onclick='stop("+obj[i].idbook+")'>"+
                            "   STOP" +
                            "</button>" +
                            "<span>" + "    " +
                            "</span>" +
                            "<h6 id='currentReading'></h1>"+
                            //"</audio>"+

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

function play(id){
  var element = document.getElementById(id);
  element.play();
}

function stop(id){

  var element = document.getElementById(id);
  element.pause();

  if (element.currentTime > 1){
    $($(element).parent()).children("h6").text("Vous avez écouté ce morceau pendant " + getStringTimeFromSecondes(Math.floor(element.currentTime)));

    enregistrerPosition(id,element.currentTime);
  }
}


function enregistrerPosition(idBook,TimeOfPosition){
  $.ajax({
      method: "POST",
      url : "/WebServiceProjet/controller/monController.php",
      data: { ws: 'livre', action : 'setPositionTimeOfABook', idBook : idBook, TimePosition : TimeOfPosition, login : $("#IDK").val() },
      success: function(response) {
          alert(response);
      }
  });
}

function getStringTimeFromSecondes(nbSecondes){

var hours = parseInt( nbSecondes / 3600 ) % 24;
var minutes = parseInt( nbSecondes / 60 ) % 60;
var seconds = nbSecondes % 60;

var chaineAretourner = "";

if (hours > 0) {
  chaineAretourner += (hours < 10 ? "0" + hours : hours) + " h ";
}

if (minutes > 0) {
  chaineAretourner += (minutes < 10 ? "0" + minutes : minutes) + " min";
}

if (seconds > 0) {
  chaineAretourner += (seconds  < 10 ? "0" + seconds : seconds) + "s ";
}

  return chaineAretourner;
}
