<h3>Test de connexion avec le driver <strong>mysqli</strong></h3>

<?php
$starttime = microtime(true); // Top of page

$requete_SQL = "SELECT * FROM utilisateur";
// mysqli
$mysqli = new mysqli("localhost", "root", "toortoor", "cv_db");
$result = $mysqli->query($requete_SQL);
$row = $result->fetch_assoc();
echo "<pre>";
print_r($row);
echo "</pre><hr>";

$endtime = microtime(true); // Bottom of page
printf("Page loaded in %f seconds", $endtime - $starttime );
?>