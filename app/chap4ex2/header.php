<?php
    // Protéger cette page contre l'accès direct
    if(count(get_included_files()) ==1) {
        //exit("Direct access not permitted.");
        header("Location:index.php");
    }
?>

<ul class="nav justify-content-center">
        <li class="nav-item <?php echo $nav["home"] ?>" id="apropos">
            <a class="nav-link" href="?nav=home">A propos</a>
        </li>
        <li class="nav-item <?php echo $nav["services"] ?>" id="services">
            <a class="nav-link" href="?nav=services">Mes services</a>
        </li>
        <li class="nav-item <?php echo $nav["cv"] ?>" id="cv">
            <a class="nav-link" href="?nav=cv">Mon CV</a>
        </li>
        <li class="nav-item <?php echo $nav["travail"] ?>" id="travail">
          <a class="nav-link" href="?nav=travail">Mon travail</a>
        </li>
        <li class="nav-item <?php echo $nav["blog"] ?>" id="blog">
          <a class="nav-link" href="?nav=blog">Mon blog</a>
        </li>
        <li class="nav-item <?php echo $nav["contact"] ?>" id="contact">
            <a class="nav-link" href="?nav=contact">Contact</a>
        </li>
</ul>