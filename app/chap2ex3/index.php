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
            <div class="col-sm-1"><!-- Ici le bouton de logout --></div>
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
            <!-- Ici un message de retour error ou success, sur le traitement du formulaire -->
        <h2>Connectez-vous</h2>
            <p>
            <input type="text" name="login"/><br>
            <input type="password" name="password"/><br>
            <input type="submit" value="Go !" />
            </p>
        </form>

        <!-- Ici un contenu qui ne sera vu qu'une fois l'authentification réussie ! -->

        </div>            
    <div class="col-sm-4"> 
    <pre>
- Debug zone -
        <!-- Affichez ici vos variables pour le débug 
        echo "\n\$_POST : ";
            print_r($_POST);
            etc...
        -->
    </pre>                
    </div>
  </div>
</div>
</body>
</html>