<h1>Tests sur les tableaux</h1>
<?php
    $nb_impairs = Array(1, 3, 5, 7, 9); 
    $color = [ "a"  => "vert", "b" => "bleu", "c" => "orange" ];
    $nb = count($color);

    var_dump($nb_impairs);

    echo "<hr/>";

    var_dump($color);

    echo "<hr/>";

    echo "le tableau \$color comporte $nb éléments."
?>

<ul>
    <?php
    foreach ($color as $key => $val) {
        echo "<li>$key : $color[$key] ($val)</li>";
    }
    ?>
</ul>

 <!-- 
     // Faire pareil pour le tableau $nb_impairs
     // Ajouter le 'rouge' au tableau $color, $t[] = $v, array_push
     // trier le tableau $nb_impairs par ordre décroissant
     // https://www.php.net/manual/fr/array.sorting.php
    
  -->