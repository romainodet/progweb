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

    class reine extends abeille {
        function pond() {
            echo "Je ponds...<br/>";
        }
    }

    $abeille1 = new abeille;
    $abeille2 = new abeille;
    $reinedDesAbeilles = new reine;
    $abeille1->vole();
    $abeille2->butine();

    $reinedDesAbeilles->pond();
    $reinedDesAbeilles->vole();
?>

<hr>

<?php
var_dump($abeille1);
?>

<hr>

<?php
var_dump($abeille2);
?>
