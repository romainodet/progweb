<?php
    // Protéger cette page contre l'accès direct
    if(count(get_included_files()) ==1) {
        //exit("Direct access not permitted.");
        header("Location:index.php");
    }

    $data = [ 1, 2, 3, 4, 5, 6 ];
?>
<style>
    .tags { text-align: center; }
</style>

<?php foreach ($data as $key => $val) { ?>
<div class="col-md-4">
    <div class="card mb-4 shadow-sm">
        <div class="card-body">
            <p class="tags">tags</p> 
            <p class="card-text">
                <h3>Ici le titre d'un article</h3>
                Et ici un texte court qui incite à lire, aussi appelé accroche de l'article.</p>
            <div class="d-flex justify-content-between align-items-center">
            <div class="btn-group">
                <button type="button" class="btn btn-sm btn-outline-secondary">Lire</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Modifier</button>
            </div>
            <small class="text-muted">Date de publication</small>
            </div>
        </div>
    </div>
</div>
<?php } ?>