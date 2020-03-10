<?php
    // Protéger cette page contre l'accès direct
    if(count(get_included_files()) ==1) {
        //exit("Direct access not permitted.");
        header("Location:index.php");
    }

    // Fonction qui renvoie la liste des tags pour un article donné
    function get_tag_list($article_id) {
        $tag_list = "";
        $list =  db_select("SELECT t.* FROM article_tag at, tag t WHERE at.tag_id = t.id AND at.article_id = $article_id ORDER by t.libelle ASC");
        foreach( $list as $k => $tag) {
            $tag_list .= "<span class='tag' style='color:" . $tag["couleur"] . ";'>" . $tag["libelle"] . "</span>&nbsp;";
        }
        return $tag_list;
    }

    $action = "";
    $data_article = NULL;

    // Gestion de la navigation dan cette rubrique
    if (isset( $_GET["action"])) {
        $action = $_GET["action"];
    } else { // Pas d'action écrire, on affiche la liste, il faut donc extraire les données.
        $data_article = db_select("select * from article a ORDER BY a.date_publication DESC");
    }

    // Gestion du formulaire d'ajout d'article
    if (isset($_POST['titre']) && isset($_POST['accroche'])) {
        // 
        $now = date("Y.m.d H:i:s"); 
        /*
            Cette méthode est-elle correcte ? Sécurisée ?
        */
        $sql_insert = "INSERT INTO article (titre, accroche, texte, date_publication) 
                       VALUES ('" . $_POST['titre'] . "', '" . $_POST['accroche'] . "', '" . $_POST['text'] . "', '" . $now . "' )";
        db_insert($sql_insert);
        // Redirection sur la liste de blog
        header("Location: ?nav=blog");
    }
 
?>
<style>
    .tags { text-align: center; }
    .tag {
        border-width: 2px;
        border-radius: 5px;
        border-color:tomato;
    }
</style>

<?php 
if ($data_article && $action == "") {
    foreach ($data_article as $k => $row) { ?>
<div class="col-md-4">
    <div class="card mb-4 shadow-sm">
        <div class="card-body">
            <p class="tags"><?php echo get_tag_list($row['id']); ?></p> 
            <p class="card-text">
                <h3><?php echo $row["titre"]; ?></h3>
                <?php echo $row["accroche"]; ?></p>
            <div class="d-flex justify-content-between align-items-center">
            <div class="btn-group">
                <a type="button" class="btn btn-sm btn-outline-secondary" href="?nav=blog&action=lire&article_id=<?php echo $row["id"]; ?>">Lire</a>
                <button type="button" class="btn btn-sm btn-outline-secondary">Modifier</button>
            </div>
            <small class="text-muted"><?php echo explode(" ", $row["date_publication"])[0]; ?></small>
            </div>
        </div>
    </div>
</div>
<?php
    } // Fin de la boucle ForEach
?>

</div> <!-- End of first row -->

<div class="row">
    <div class="col-md-4">
        <div class="btn-group">
            <a type="button" class="btn btn-sm btn-outline-secondary" href="?nav=blog&action=ecrire">Ajouter un article</a>
        </div>
    </div>


<?php
}  else  // action != "" 
    if ($action == "ecrire") // ecrire => le formulaire
        {
     ?>

<div class="col-md-6 article">
    <h3>Nouvel article</h3>
    <hr>
    <form method="post" action="?nav=blog">
        <div class="form-group">

            <label for="input_titre" class="sr-only">Titre</label>
            <input type="text" name="titre" class="form-control" id="input_titre" placeholder="Titre">
            <br>
            <label for="input_accroche" class="sr-only">Accroche</label>
            <input type="text" name="accroche" class="form-control" id="input_accroche" placeholder="Accroche">

        </div>
        <div class="form-group">

        <label for="input_text">Texte</label>
        <textarea name="text" class="form-control" id="input_text" rows="4"></textarea>

        </div>

        <!-- <div class="input-group input-group-lg">
            <div class="form-control" id="tags-list" name="tags-list">
                
            </div>
        </div> -->

        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
</div>

<?php
    } else { // Action = lire => inclusion du modèle de détail
        include ('content-blog-detail.php');
    }
?>