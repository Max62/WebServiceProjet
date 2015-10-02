<?php
session_start();

if(isset($_POST['client'])){
    $_SESSION['monUserCo'] = $_POST['client'];
}
?>

<?php include_once 'struct/header.php'; ?>

<body>
<div class="row">
    <div class="large-12 columns">


        <div class="row">
            <div class="large-12 columns">

                <nav class="top-bar" data-topbar>
                    <ul class="title-area">

                        <li class="name">
                            <h1>
                                <a href="#">
                                    <?php echo $_SESSION['monUserCo']['firstname']." ".$_SESSION['monUserCo']['lastname']; ?>
                                </a>
                            </h1>
                        </li>

                        <li class="toggle-topbar menu-icon"><a href="#"><span>menu</span></a></li>
                    </ul>

                    <section class="top-bar-section">

                        <ul class="right">

                            <li class="has-form">
                                <div class="row collapse">
                                    <!--<div class="large-8 small-9 columns">-->
                                        <input type="text" placeholder="Indiquez le nom d'un livre" size="50" id="searchBox">
                                    <!--</div>-->
                                </div>
                            </li>
                            <li class="divider"></li>
                            <li class="has-dropdown" id="mesGenres">
                                <a href="#">Genre</a>
                                <ul class="dropdown">
                                </ul>
                            </li>
                            <li class="has-dropdown">
                                <a href="#">Ajouter</a>
                                <ul class="dropdown">
                                    <li><a href="/WebServiceProjet/vue/ajoutLivreAudio.php">Un livre</a></li>
                                    <li><a href="/WebServiceProjet/vue/ajoutGenreLivre.php">Un genre</a></li>
                                </ul>
                            </li>
                            <li class="divider"></li>
                            <li><a href="#">Mon Compte</a></li>
                            <li class="divider"></li>
                            <li>
                                <a href="/WebServiceProjet/index.php?logout=true">Logout</a>
                            </li>
                        </ul>
                    </section>
                </nav>

            </div>
        </div>



        <div class="row">



            <div class="large-4 small-12 columns">

                <img src="/WebServiceProjet/ressource/casque.jpg">

                <div class="hide-for-small panel">
                    <h3>FREE BOOK</h3>
                    <h5 class="subheader">Un petit moment detente ? Venez ecouter un de nos livres audio</h5>
                </div>

                <a href="#">
                    <div class="panel callout radius">
                        <h6>99  items in your cart</h6>
            </div>
                </a>

            </div>






            <div class="large-8 columns">

                <div class="row">

                    <?php
                    for($i = 1;$i < 4;$i++){

                        echo "<div class='large-12 columns'>
                                <div class='panel'>
                                     <div class='row'>

                                        <div class='large-2 small-6 columns'>
                                            <img src='/WebServiceProjet/ressource/listen.jpeg'>
                                        </div>

                                        <div class='large-10 small-6 columns'>
                                            <strong>Donjon de Naheulbeuk - SAISON ".$i."<hr/></strong>

                                            <audio controls='controls' preload='none'>
                                                <source src='/WebServiceProjet/ressource/donjon-saison5resume.mp3' type='audio/mp3' />
                                            </audio>
                                        </div>

                                        </div>
                                    </div>
                                </div>";
                    }
                    ?>




                </div>
            </div>
        </div>




        <footer class="row">
            <div class="large-12 columns"><hr/>
                <div class="row">

                    <div class="large-6 columns">
                        <p>© Copyright</p>
                    </div>
                </div>
            </div>
        </footer>



</body>

<?php include_once 'struct/footer.php'; ?>