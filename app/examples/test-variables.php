<h1>Tests de portée des variables</h1>
<?php
$pi = 3.14;


function surface() {
    global $pi;  // Ici Pi est global et correspond à la déclaration ci dessus.
    // Que se passe-t-il si l'on supprime le mot "global" ?
    $rayon = 10;
    $surface = $pi * bcpow($rayon, 2);
    echo "surface : $surface";
}
?>

<ul>
<li>valeur de pi : <?php echo $pi ?></li>
<!-- <li>Le rayon est : <?php echo $rayon ?></li> -->
</ul> 
<hr>
<?php
    surface();
?>
