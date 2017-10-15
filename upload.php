<?php

// pour tous les fichiers
if (count($_FILES['upload']['name']) > 0) {
// pour chaque fichier
    for ($i = 0; $i < count($_FILES['upload']['name']); $i++) {

        $extensions = ['jpg', 'jpeg', 'png', 'gif'];
        //Renvoie une chaîne en minuscules
        $extension = pathinfo($_FILES['upload']['name'][$i], PATHINFO_EXTENSION);
        // vérification des extensions
        if (!in_array($extension, $extensions)) {
            echo "Seuls les formats jpg (ou jpeg), gif et png sont autorisés";
        }

        $maxSize = $_FILES['upload']['size'] = 1000000;
        //vérification de la taille du fichier
        if ($_FILES['upload']['size'][$i] > $maxSize) {
            echo "Le fichier ne doit pas dépasser 1Mo";
        }
        //identifiant unique
        $idUnique = uniqid();
        $image = 'image' . $idUnique . '.' . $extension;
        //récupération de l'image avec identifiant unique dans le dossier upload
        $imageUpload = 'upload/' . $image;
        //fichier temporaire
        $tmpFilePath = $_FILES['upload']['tmp_name'][$i];
        //Déplace un fichier téléchargé du fichier temporaire vers le dossier upload
        move_uploaded_file($tmpFilePath, $imageUpload);
    }
    header('location:index.php');
}


