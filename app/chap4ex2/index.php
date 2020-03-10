<?php
    require_once "db.php";
    /*--------------------------------------------------------------------------*/
    session_start();
    date_default_timezone_set('Europe/Paris');
    setlocale(LC_ALL, 'fr','fr_FR');

    // Tableau des navigations (autant d'éléments que de menus)
    $nav = ["home" => "", "services" => "", "cv" => "", "travail" => "" , "blog" => "" , "contact" => "" ];
    // contenu actif (en fonction de la nav), par défaut, la home
    $active_page = "home";

    // Controleur de navigation
    if (isset( $_GET["nav"])) {
        $active_page = $_GET["nav"];
        if (array_key_exists($active_page, $nav)) {
            $nav[$active_page] = "active";
        } else {
            // Par défaut on affiche  le contenu de la home
            // l'affactation de la variable $active_page à "home" pourrait aussi fonctionner 
            // Mais c'est plus propre avec une redirection côté serveur.
            // => On ne traine pas un paramètre de get dont la valeur est non reconnue.
            header("Location:index.php");
        }
    } 
    /*--------------------------------------------------------------------------*/
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- inspiré mais non copié de http://preview.graygrids.com/item/hello-personal-portfolio-template/ -->
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800" rel="stylesheet">	
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <!-- Using Icons with bootstrap4 (for license reasons, icons are not more included with BS)-->
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- titre paramétré en fonction de la la navigation -->
    <title>Ma page <?php echo "&nbsp;&gt;&nbsp;$active_page"; ?></title>
  </head>
  <body>
    <nav class="container">
    <!-- Inclusion du menu de navigation -->
      <?php
        /*--------------------------------------------------------------------------*/
        include('header.php'); 
        /*--------------------------------------------------------------------------*/
     ?>
    </nav>
      
    <main role="main">
        <div id="main" class="container">
            <div class="row">
        <?php 
            /*--------------------------------------------------------------------------*/
            if (file_exists("content-$active_page.php")) { 
                include("content-$active_page.php"); 
            } else {
                include("content-error.php"); 
            }
            /*--------------------------------------------------------------------------*/
        ?>
            </div>
        </div> <!-- /container -->
    </main>
      
    <footer class="container text-center">
        <?php
            /*--------------------------------------------------------------------------*/ 
            include('footer.php');
            /*--------------------------------------------------------------------------*/
        ?>
    </footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="assets/jquery/jquery-3.4.1.slim.min.js"></script>
    <script src="assets/popper/popper-1.16.0.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>