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
    <link rel="stylesheet" href="/WebServiceProjet/asset/scss/style.scss">

    <script src="../asset/js/vendor/modernizr.js"></script>

</head>


<body>
<!--
<div class="center row">
    <div class="section-container tabs" data-section="tabs">
        <section class="active">
            <p class="title" data-section-title><a href="#">Sign Up</a></p>
            <div class="content" data-section-content>
                <p>
                <div class="row">
                    <div class="large-12 columns">
                        <div class="signup-panel">
                            <p class="welcome">Hello, new user!</p>
                            <form>
                                <div class="row collapse">
                                    <div class="small-2  columns">
                                        <span class="prefix"><i class="fi-torso"></i></span>
                                    </div>
                                    <div class="small-10  columns">
                                        <input type="text" placeholder="Full Name">
                                    </div>
                                </div>
                                <div class="row collapse">
                                    <div class="small-2 columns">
                                        <span class="prefix"><i class="fi-mail"></i></span>
                                    </div>
                                    <div class="small-10  columns">
                                        <input type="text" placeholder="Email">
                                    </div>
                                </div>
                                <div class="row collapse">
                                    <div class="small-2 columns ">
                                        <span class="prefix"><i class="fi-lock"></i></span>
                                    </div>
                                    <div class="small-10 columns ">
                                        <input type="text" placeholder="Password">
                                    </div>
                                </div>
                            </form>
                            <a href="#" class="button ">Sign Up! </a>
                        </div>
                    </div>
                </div></p>
            </div>
        </section>
        <section>
            <p class="title" data-section-title><a href="#">Sign In</a></p>
            <div class="content" data-section-content>
                <p>
                <div class="row">
                    <div class="large-12 columns">
                        <div class="signup-panel">
                            <p class="welcome">Welcome back!</p>
                            <form>
                                <div class="row collapse">
                                    <div class="small-2 columns">
                                        <span class="prefix"><i class="fi-mail"></i></span>
                                    </div>
                                    <div class="small-10  columns">
                                        <input type="text" placeholder="Email">
                                    </div>
                                </div>
                                <div class="row collapse">
                                    <div class="small-2 columns ">
                                        <span class="prefix"><i class="fi-lock"></i></span>
                                    </div>
                                    <div class="small-10 columns ">
                                        <input type="text" placeholder="Password">
                                    </div>
                                </div>
                            </form>
                            <a href="#" class="button ">Sign Up! </a>
                        </div>
                    </div>
                </div></p>
            </div>
        </section>
    </div>
    <div>

<div class="button-group" data-grouptype="OR">
    <a href="vue/inscription.php"><button href="#" class="small button primary radius">S'incrire</button></a>
    <button href="#" class="small button success radius">Se connecter</button>
</div>
-->
<div class="row">
    <div class="large-12 columns">
        <h2>Page de connexion</h2>
    </div>
    <div class="large-12 columns">
        <fieldset>
            <legend>Connexion</legend>
            <div class="row">

                <div class="large-12 columns">
                    <div class="row collapse prefix-radius">
                        <div class="large-3 columns">
                            <span class="prefix">Login</span>
                        </div>
                        <div class="large-9 columns">
                            <input type="text" required="required" placeholder="Login" id="monLogin">
                        </div>
                    </div>
                </div>

                <div class="large-12 columns">
                    <div class="row collapse prefix-radius">
                        <div class="large-3 columns">
                            <span class="prefix">Password</span>
                        </div>
                        <div class="large-9 columns">
                            <input type="password" required="required" placeholder="Password" id="monPwd">
                        </div>
                    </div>
                </div>

                <div class="large-12 columns">
                    <input class="button radius success right" type="button" value="Connexion" id="btnCnx">
                    <a href="vue/inscription.php"><input class="button radius success left" type="button" value="Inscription"></a>
                </div>
            </div>
        </fieldset>
    </div>

    <script src="/WebServiceProjet/asset/js/vendor/jquery.js"></script>
    <script src="/WebServiceProjet/asset/js/foundation.min.js"></script>
    <script>
        $(document).foundation();

        $( "#btnCnx" ).click(function() {
            $.ajax({
                method: "POST",
                url : "/WebServiceProjet/controller/monController.php",
                data: { ws: 'users', action : 'connect',
                        login: $("#monLogin").val(), password: $("#monPwd").val()
                       },
                success: function(response) {
                    alert(response);
                    if (jQuery.parseJSON(response).mail.indexOf("@") > -1){
                        $.ajax({
                            type: "POST",
                            url: "/WebServiceProjet/vue/accueil.php",
                            data: { client: jQuery.parseJSON(response)},
                            success:function(data){
                                $('body').replaceWith(data);
                            }
                        });
                        };
                    }
                });
            });

    </script>
</body>
</html>
