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
    </div>



</body>

<?php include_once 'struct/footer.php'; ?>
