<?php
    // Démarre le mécanisme de gestion des sessions
    session_start();

    // Le couple login/pass valable pour réalisé l'authentification
    $users = ["pgl" => "secret"];
    $message_retour = ""; // contient le message de retour du traitement
    $type_message = "success";

    // Si il y a eu un POST 
    if(!isset($_SESSION["user"])) {
        if (isset($_POST['login']) && isset($_POST['password'])) {
            // Récupération des données postées
            $login_recue = $_POST['login'];
            $pass_recue = $_POST['password'];

            // On doit vérifier le login mot de passe
            if (array_key_exists($login_recue, $users) && $users[$login_recue] == $pass_recue) {
                // Le password est le bon, l'utilisateur est authentifié.
                $_SESSION['user'] = $login_recue; 
                $_SESSION['time'] = time();
                $message_retour = "Bienvenue chez vous !";
            } else { 
                // Si le login n'existe pas, renvoyer une erreur
                $message_retour = "<span class='error-msg'>L'utilisateur ou le mot de passe ne sont pas valide.</span>";
                $type_message = "error";
            }
            // Si on active le redirect, que se passe-t-il ?
            // La session est initialisée, on redirige vers la page avec ces éléments
            //header("Location:index-solution.php");
        }
    } else {
        // Gestion de la déconnexion
        if (isset($_GET['action']) && $_GET['action'] ==  "logout") {
            $_SESSION['user'] = NULL;
            $_SESSION['time']  = NULL;
            $type_message = "success";
            $message_retour = "Vous avez été déconnecté !";
            // Si on active le redirect, que se passe-t-il ?
            // Rediraction sur la page d'accueil
            //header("Location:index-solution.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Documentation CSS : https://minicss.org/docs -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mini.css/3.0.1/mini-default.min.css">
    <style>
    .success {
        background: #689f38;
        color: #fafafa;
        font-size: .9375em;
        line-height: 1em;
        border-radius: .125rem;
        padding: 0.125em 0.25em;
    }
    </style>

    <title></title>
</head>
<body>
    <header>
        <div class="row">
        <div class="col-sm-9"></div>
            <div class="col-sm-1"><?php if(isset($_SESSION["user"])) { echo "<a class='button' href='?action=logout'>Déconnexion</a>"; } ?></div>
        </div>
    </header>
<div class="container">
<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
        <h1>Test de l'authentification : POST http et Sessions</h1>
        <p>L'objectif, ici est d'utiliser les sessions et les variables super globales $_GET, $_POST, $_SESSION 
            pour réaliser une connexion / déconnexion de l'utilisateur.</p>
        <p><u>Cinématique :</u> Le formulaire envoie une requête POST au serveur. 
        Celui-ci vérifie le login et le mot de passe puis affiche un lien "Déconnexion" en haut à droite si l'authentification a abouti.
        On affiche une erreur si celle-ci a échoué.</p>
        <p>Côté serveur, le couple login/mot de passe sera stocké dans un tableau associatif.</p>
    </div>
</div>
  <div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-4">
        <form action="index-solution.php" method="post">
            <?php if($message_retour!="") { echo "<div class='card small $type_message'><p class='doc'>$message_retour</p></div>"; } ?>
<?php if(!isset($_SESSION["user"])) { ?>            
        <h2>Connectez-vous</h2>
            <p>
            <input type="text" name="login"/><br>
            <input type="password" name="password"/><br>
            <input type="submit" value="Go !" />
            </p>
        </form>
<?php } else { 
        echo "<div><h2>Bonjour ". $_SESSION['user']. "</h2>";
        echo "<p>Ce contenu n'est visible qu'une fois une authentification réussie !</p></div>";
      } ?>
        </div>            
    <div class="col-sm-4"> 
    <pre>
- Debug zone -
        <?php
            echo "\n\$_POST : ";
            print_r($_POST);
            echo "\n\$_SESSION : ";
            print_r($_SESSION);
            //echo "\nsession_id() : ".session_id()."\nCOOKIE : ".$_COOKIE["PHPSESSID"];
            echo "\n\$_COOKIE : ";
            print_r($_COOKIE);

        ?>   
    </pre>                
    </div>
  </div>
</div>
</body>
</html>