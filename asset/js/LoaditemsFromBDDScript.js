/**
 * Created by MAXIME on 01/10/15.
 */
$( document ).ready(function() {
   loadTypes();
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

function loadBooks(){
    $.ajax({
        method: "POST",
        url : "/WebServiceProjet/controller/monController.php",
        data: { ws: 'livre', action : 'selectAllBooks', login : $("#IDK").val()},
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


                          "<input type='hidden' id='audioPosition"+obj[i].idbook+"' value='"+ obj[i].timePosition +"' />" +
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
                          "<h6 id='statut"+obj[i].idbook+"'></h6>"+
                          "<h6 id='currentReading"+obj[i].idbook+"'></h6>"+
                            //"</audio>"+
                        "</div>"+

                    "</div>"+
                "</div>"+
                "</div>").hide().fadeIn("slow");
                console.log(obj[i].timePosition);
                if (obj[i].timePosition > 0){
                  $("button.fi-play").text("REPRENDRE");
                  $("h6#currentReading"+obj[i].idbook).text("La dernière fois vous avez écouté " + getStringTimeFromSecondes(Math.floor(obj[i].timePosition)));
                }


                $("audio#"+obj[i].idbook).bind('ended', function(){
                  // done playing
                  deleteRowInReadingDatabase(this);
                });
            }
            $('.panel.callout.radius').html('<h6><b>' + $(".large-8.columns").children(".row").children(".large-12.columns").length + ' Livre(s) disponible(s) !</b></h6');

        }
    });
};

function deleteRowInReadingDatabase(obj){
  console.log(obj);
  $.ajax({
      method: "POST",
      url : "/WebServiceProjet/controller/monController.php",
      data: { ws: 'livre', action : 'deleteRowReading', idb : $(obj).attr("id"), login : $("#IDK").val()},
      success: function(response) {
          loadNextEpisode($(obj).attr("id"));
      }
  });
}

function loadNextEpisode(id){
  $.ajax({
      method: "POST",
      url : "/WebServiceProjet/controller/monController.php",
      data: { ws: 'livre', action : 'goNext', idBook : id},
      success: function(response) {
          continueReading(jQuery.parseJSON(response),id);
      }
  });
}

function continueReading(id,idancien){
  var obj = $("audio#"+id);

  $(".green").removeClass("green");
  $(".orange").removeClass("orange");

  $(".green").addClass("orange");
  
  $("#statut"+idancien).html("<b style='color:white'> Vous venez de terminer ce morceau ;) </b>");
  $("#currentReading"+idancien).text("");

  $(".green").removeClass("green");

  if($(obj.parent()).children('.fi-play').text().trim() == "PLAY"){
    $(obj).parent().parent().parent(".panel").addClass("green");
    $("#statut"+id).html("<b style='color:white'> Lecture en cours ... </b>");
  }

  if($(obj.parent()).children('.fi-play').text().trim() == "REPRENDRE"){
    $(obj).parent().parent().parent(".panel").removeClass("red");
    $(obj).parent().parent().parent(".panel").addClass("green");
    $("#statut"+id).html("<b style='color:white'> Lecture en cours ... </b>");
  }

  var element = document.getElementById(id);


  if (isNaN($("#audioPosition"+id).val())){
    element.currentTime = 0;
  }else {
    element.currentTime = $("#audioPosition"+id).val();
  }

  element.play();
}


$("#searchBox").keyup(function(){
  var valeureSaisie = $('#searchBox').val();

  if (valeureSaisie != null){
    $.ajax({
        method: "POST",
        url : "/WebServiceProjet/controller/monController.php",
        data: { ws: 'livre', action : 'searchByName', searchBoxValue : valeureSaisie, login : $("#IDK").val()},
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


                          "<input type='hidden' id='audioPosition"+obj[i].idbook+"' value='"+ obj[i].timePosition +"' />" +
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
                          "<h6 id='statut"+obj[i].idbook+"'></h6>"+
                          "<h6 id='currentReading"+obj[i].idbook+"'></h6>"+
                            //"</audio>"+
                        "</div>"+

                    "</div>"+
                "</div>"+
                "</div>").hide().fadeIn("slow");

                if (obj[i].timePosition > 0){
                  $("button.fi-play").text("REPRENDRE");
                  $("h6#currentReading"+obj[i].idbook).text("La dernière fois vous avez écouté " + getStringTimeFromSecondes(Math.floor(obj[i].timePosition)));
                }


                $("audio#"+obj[i].idbook).bind('ended', function(){
                  // done playing
                  deleteRowInReadingDatabase(this);
                });
            }
            $('.panel.callout.radius').html('<h6><b>' + $(".large-8.columns").children(".row").children(".large-12.columns").length + ' Livre(s) disponible(s) !</b></h6');

        }
    });
  }else{
    loadBooks();
  }

});

function play(id){
  var obj = $("audio#"+id);
  $(".green").removeClass("green");
  $(".orange").removeClass("orange");
  if($(obj.parent()).children('.fi-play').text().trim() == "PLAY"){
    $(obj).parent().parent().parent(".panel").addClass("green");
    $("#statut"+id).html("<b style='color:white'> Lecture en cours ... </b>");
  }

  if($(obj.parent()).children('.fi-play').text().trim() == "REPRENDRE"){
    $(obj).parent().parent().parent(".panel").removeClass("red");
    $(obj).parent().parent().parent(".panel").addClass("green");
    $("#statut"+id).html("<b style='color:white'> Lecture en cours ... </b>");
  }

  var element = document.getElementById(id);


  if (isNaN($("#audioPosition"+id).val())){
    element.currentTime = 0;
  }else {
    element.currentTime = $("#audioPosition"+id).val();
  }

  element.play();
}

function stop(id){
  var obj = $("audio#"+id);

  $(obj).parent().parent().parent(".panel").addClass("red");
  $("#statut"+id).html("<b style='color:white'> Votre livre à été mis sur pause ;) ! </b>");
  var element = document.getElementById(id);
  element.pause();
  $("#audioPosition"+id).val(element.currentTime);
  if (element.currentTime > 1){
    $($(element).parent()).children("h6#currentReading"+id).text("Vous avez écouté ce morceau pendant " + getStringTimeFromSecondes(Math.floor(element.currentTime)));

    enregistrerPosition(id,element.currentTime);
  }
  $(obj.parent()).children('.fi-play').text("REPRENDRE").trim();
}


function enregistrerPosition(idBook,TimeOfPosition){
  $.ajax({
      method: "POST",
      url : "/WebServiceProjet/controller/monController.php",
      data: { ws: 'livre', action : 'setPositionTimeOfABook', idBook : idBook, TimePosition : TimeOfPosition, login : $("#IDK").val() },
      success: function(response) {
          console.log(response);
      }
  });
}

function getStringTimeFromSecondes(nbSecondes){

var hours = parseInt( nbSecondes / 3600 ) % 24;
var minutes = parseInt( nbSecondes / 60 ) % 60;
var seconds = nbSecondes % 60;

var chaineAretourner = "";

if (hours > 0) {
  chaineAretourner += (hours < 10 ? "0" + hours : hours) + "h";
}

if (minutes > 0) {
  chaineAretourner += (minutes < 10 ? "0" + minutes : minutes) + "min";
}

if (seconds > 0) {
  chaineAretourner += (seconds  < 10 ? "0" + seconds : seconds) + "s ";
}

  return chaineAretourner;
}
