<?php
    // Protéger cette page contre l'accès direct
    if(count(get_included_files()) ==1) {
        //exit("Direct access not permitted.");
        header("Location:index.php");
    }

    // Nom du fichier de contacts
    $filename = 'contacts.csv';

    // Fonction qui nettoie les données des caractères indésirables
    function sanitize($str) {
        return str_replace('"', '\'', $str);
    }

    // Traitement du formulaire de contact
    if (
        (isset($_POST['nom']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['text']))
        &&
        ($_POST['nom'] != "" && $_POST['email'] != "" && $_POST['subject'] != "" && $_POST['text'] != "" )
        ) {
        $today = Date('d/m/Y H:i:s');
        // Transformer les données en CSV
        $contact = '"'.$today.'";"'.sanitize($_POST['nom']).'";"'.sanitize($_POST['email']).'";"'.sanitize($_POST['subject']).'";"'.sanitize($_POST['text']).'";'."\n";
        
                       // Si le fichier n'existe pas, on ajoute une entête aux données
        if (!file_exists($filename)) {
            $contact = '""date";"nom";"email";"subject";"text";' . "\n" . $contact;
        }
        // Ecrire dans le fichier
        file_put_contents($filename, $contact, FILE_APPEND);
    } 
    // @TODO : Renvoyer un message au navigateur lorsque les données ne sont pas correctes.
?>

<div class="col-md-6 contact">
    <h3>Ecrivez-moi...</h3>
    <hr>
    <form method="post" action="?nav=contact">
        <div class="form-group">

            <label for="input_nom" class="sr-only">Nom</label>
            <input type="text" name="nom" class="form-control" id="input_nom" placeholder="Nom">
            <br>
            <label for="input_mail" class="sr-only">Email</label>
            <input type="text" name="email" class="form-control" id="input_mail" placeholder="Email">

        </div>
        <div class="form-group">

            <label for="input_subject" class="sr-only">Email</label>
            <input type="text" name="subject" class="form-control" id="input_subject" placeholder="Sujet">

        </div>
        <div class="form-group">

        <label for="input_text">Message</label>
        <textarea name="text" class="form-control" id="input_text" rows="4"></textarea>

        </div>
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
</div>

<div class="col-md-6 map">
    <h3>Rencontrons nous !</h3>
    <hr>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2780.946356297507!2d4.769995215685608!3d45.812332718166765!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47f4eb4185df5233%3A0x751a2ff20364f4c6!2sL&#39;Ecole%20LDLC!5e0!3m2!1sfr!2sfr!4v1582734793623!5m2!1sfr!2sfr" width="100%" height="400" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
</div>
