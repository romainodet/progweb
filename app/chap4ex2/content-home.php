<?php
    // Protéger cette page contre l'accès direct
    if(count(get_included_files()) ==1) {
        //exit("Direct access not permitted.");
        header("Location:index.php");
    }

    // Calcule l'âge à partir d'une date de naissance jj/mm/aaaa
    function age($date_naissance)
    {
        $am = explode('-', $date_naissance);
        $an = explode('/', date('Y/m/d'));
        return $an[0] - $am[0] - 1;
    }

    // Récupération des données dans Mysql.
    $data = db_select("select * from utilisateur limit 1");
    $row = $data[0];
    $nom = $row["nom"];
    $prenom = $row["prénom"];
    $datenaiss = explode(" ", $row["date_naissance"])[0];
    $datenaiss = age($datenaiss);
    $genre = $row["genre_id"];
    $langues = ""; //$row["langues"];
    $baseline = $row["baseline"];
    $dispo = ($row["dispo"] == "O") ? "Disponible" : "En mission";
    $metier = $row["metier"];
    $lien_photo = ""; //$row["lien_photo"];
    $bio = "";//$row["bio"];
?>

<div class="col-md-4">
    <img src="./assets/<?php echo $lien_photo; ?>" class="img-fluid" alt="Votre Photo" width="80%"/>
</div>
<div class="col-md-4">
<p><?php echo "$metier"; ?></p>
    <h2><?php echo "$prenom $nom"; ?></h2>
    <h4><?php echo "$baseline"; ?></h4>
    <p><?php echo "$bio"; ?></p>
</div>
<div class="col-md-4" class="basic-info">
    <h4>Quelques infos...</h4>
    <hr>
    <table>
        <tbody>
        <tr>
                <th>Age : </th><td><?php echo "$datenaiss ans"; ?></td>
            </tr>
            <tr>
                <th>Genre : </th><td><?php echo "$genre"; ?></td>
            </tr>
            <tr>
                <th>Langues : </th><td><?php echo "$langues"; ?></td>
            </tr>
            <tr>
                <th>Disponibilité : </th><td><?php echo "$dispo"; ?></td>
            </tr>
        </tbody>
    </table>
</div>

