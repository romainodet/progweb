<?php
    // Protéger cette page contre l'accès direct
    if(count(get_included_files()) ==1) {
        //exit("Direct access not permitted.");
        header("Location:index.php");
    }
?>

<div class="col-md-4">
    <img src="assets/img/silouhette.png" class="img-fluid" alt="Votre Photo" width="80%"/>
</div>
<div class="col-md-4">
    <h2>Nom / Prénom</h2>
    <h4>Une baseline qui vous définie</h4>
    <p>Ici vous mettrez le résumé de qui vous êtes.</p>
    <h4>Exercice</h4>
              <ol>
                <!-- <li>Commencez par remplir ce modèle avec du contenu</li> -->
                <li>Découpez enssuite ce modèle en 4 fichiers PHP : header, content footer, et index qui inclu les 3</li>
                <li>Vous créerez une page php de contenu différente pour chaque rubrique</li>
                <li>Navigation : vous écrirez un "contrôleur" dans index.php qui analysera un paramètre de $_GET pour naviguer dans les rubriques.</li>
                <li>Contact : Vous ajouterez un formulaire qui poste ses données en POST, que vous enregistrerez dans un fichier CSV sur le serveur.
                  Ce fichier sera de la forme suivante :<br>
                  <pre style="background-color: #acacac;">
"date";"nom";"email";"subject";"text";
"22/04/2020 22:33:02";"Levallois";"pierregilles.levallois@gmail.com";"Test";"hello";
                  </pre>
                </li>
                <li>Ajoutez aussi une carte du type google Maps centrée autour de votre adresse, à côté de votre formulaire.</li>
                <li>Refactorez la "home" pour aller chercher vos données dans un fichier, côté serveur.</li>
                <li>Ajouter une authentification pour télécharger le fichier des contacts</li>
              </ol>

</div>
<div class="col-md-4">
    <h2>Infos</h2>
    <p>Ici vous incluez vos nom, prénom, date de naissance, ville ou vous vivez, ainsi que des liens vers vos profils sur les réseaux sociaux 
    (pictos cliquables).</p>
</div>

