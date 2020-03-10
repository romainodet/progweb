<?php
    // Protéger cette page contre l'accès direct
    if(count(get_included_files()) ==1) {
        //exit("Direct access not permitted.");
        header("Location:index.php");
    }

    // Vérifier qu'on arrive bien ici avec un id d'article, donc des données à afficher.
    if (!isset($_GET['article_id'])) {
        include('content-error.php');
    } else {
        // On a bien un id passé en GET
        $data_article = db_select("select * from article a WHERE a.id = " . htmlentities($_GET['article_id']));
        $data_article = $data_article[0];
    }
?>

<style>
    .taglist {
        text-align: right;
    }

    .accroche {
        color: #999999;
        text-transform: uppercase;
    }

    article::first-letter {
        font-size: 40px;
        font-weight: bold;
    }

    article {
        text-align: justify;
    }

</style>


<div class="col-md-2">
</div>
<div class="col-md-8">
    <h2>
        <?php echo $data_article['titre']; ?>
    </h2>
    <p class="taglist">
        <?php echo get_tag_list($data_article['id']); ?>
    </p>
    <p class="accroche">
        <?php echo $data_article['accroche']; ?>
    </p>
    <article>
        <?php echo $data_article['texte']; ?>
    </article>
</div>
<div class="col-md-2">
</div>
