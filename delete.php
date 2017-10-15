<?php
if(isset($_GET['id'])) {
    //Vérifie si un fichier ou un dossier existe
    if (file_exists('upload/' . $_GET['id'])) {
        //bool unlink ( string $filename [, resource $context ] )
        unlink("upload/" . $_GET['id']);
        header("location: index.php");
    }
}
