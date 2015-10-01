<html class="no-js" lang="fr" >

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projet WebService Audio</title>

    <link rel="stylesheet" href="/WebServiceProjet/asset/css/normalize.css">
    <link rel="stylesheet" href="/WebServiceProjet/asset/css/foundation.css">


    <script src="../asset/js/vendor/modernizr.js"></script>

</head>


<body>
    <div class="row">
        <div class="large-12 columns">
            <h2>Page de connexion</h2>
        </div>
        <div class="large-12 columns">
            <form>
                <fieldset>
                    <legend>Connexion</legend>
                    <div class="row">

                        <div class="large-12 columns">
                            <div class="row collapse prefix-radius">
                                <div class="large-3 columns">
                                    <span class="prefix">Login</span>
                                </div>
                                <div class="large-9 columns">
                                    <input type="text" required="required" placeholder="Login">
                                </div>
                            </div>
                        </div>

                        <div class="large-12 columns">
                            <div class="row collapse prefix-radius">
                                <div class="large-3 columns">
                                    <span class="prefix">Password</span>
                                </div>
                                <div class="large-9 columns">
                                    <input type="password" required="required" placeholder="Password">
                                </div>
                            </div>
                        </div>

                        <div class="large-12 columns">
                            <input class="button radius success right" type="submit" value="Connexion">
                            <a href="vue/inscription.php"><input class="button radius success left" type="button" value="Inscription"></a>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>


    <script src="/WebServiceProjet/asset/js/vendor/jquery.js"></script>
    <script src="/WebServiceProjet/asset/js/foundation.min.js"></script>
    <script>
        $(document).foundation();
    </script>
</body>
</html>