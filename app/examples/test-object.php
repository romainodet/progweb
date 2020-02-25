<?php
    class abeille
    {
        function vole()
        {
            echo "Bzz Bzz je vole.<br/>";
        }

        function butine() {
            echo "Miam ! je butine...<br/>";
        }
    }
    $abeille1 = new abeille;
    $abeille2 = new abeille;
    $abeille1->vole();
    $abeille2->butine();
?>

<hr>

<?php
var_dump($abeille1);
?>

<hr>

<?php
var_dump($abeille2);
?>
