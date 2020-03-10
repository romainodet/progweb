<?php
    // Protéger cette page contre l'accès direct
    if(count(get_included_files()) ==1) {
        //exit("Direct access not permitted.");
        header("Location:index.php");
    }
?>

<div id="main" class="container">
        <!-- Example row of columns -->
        <div class="row">
            <div class="col-md-4">
                &nbsp;
            </div>
            <div class="col-md-4">
                <p>Pas de contenu pour cette rubrique !</p>
                <?php if (isset($_GET['nav'])) echo "Nav : ".$_GET['nav']; ?>
            </div>
            <div class="col-md-4">
                &nbsp;
            </div>
        </div>
    
    </div> <!-- /container -->
