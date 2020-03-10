<h3>Test de connexion avec le driver <strong>PDO</strong></h3>

<?php
$starttime = microtime(true); // Top of page

$requete_SQL = "SELECT * FROM utilisateur";

echo "<h3>PDO</h3>";
// PDO
$pdo = new PDO('mysql:host=localhost;dbname=cv_db', 'root', 'toortoor');
$statement = $pdo->query($requete_SQL);
$row = $statement->fetch(PDO::FETCH_ASSOC);
echo "<pre>";
print_r($row);
echo "</pre><hr>";

$endtime = microtime(true); // Bottom of page
printf("Page loaded in %f seconds", $endtime - $starttime );
?>
