<h1>Tests sur les fichiers</h1>
<?php
$filename = "/Users/pgl/developpement/cours-web/app/examples/test-object.php";

$handle = fopen($filename, "r");
fclose($handle);
var_dump($handle);

// Autre façon de lire un fichier
$content = file_get_contents($filename); 
$content = htmlentities($content);
?>

<h4>Voici le contenu du fichier <?php echo $filename; ?></h4>
<hr>
    <pre>
<?php
    echo $content;
?>
    </pre>
<hr>
<!-- 
    Exercice : Ouvrir/créer un fichier en écriture 
    - Ecrire Son nom et prénom ainsi qu'un timestamp (date au format DD/MM/YYYY HH24:MI:SS)
        Fonction date, file_put_contents, file_get_contents
-->