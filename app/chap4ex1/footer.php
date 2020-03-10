<?php
    // Protéger cette page contre l'accès direct
    if(count(get_included_files()) ==1) {
        //exit("Direct access not permitted.");
        header("Location:index.php");
    }
    //$today = Date('d/m/Y H:i:s');    
    //$today = Date('l d F - H:i:s ', time());
    $today = strftime("%A %d %B %Y %T");
?>

<p class="text-muted credit">
    <?php echo "$today"; ?> | <a href="http://cheaphostings.org/html/hello" target="_blank">Modèle</a>
</p>