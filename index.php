<?php
//Liste les fichiers dans un dossier upload
$dossierUpload = scandir("upload");
//Retourne un tableau avec les résultats de la recherche => vérifie dans le dossier upload les images présentes
$files = preg_grep("/image/", $dossierUpload);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quête upload de fichiers</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">


</head>
<body>

<div class="container">
    <div class="row">
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <div class="first_part">

                    <legend>Ajouter votre image:</legend>
                    <label>Image:</label>
                    <input type="file" name="upload[]" id="upload" multiple="multiple">

            </div>
            <div>
                <input type="submit" value="Envoyer"/>
            </div>
            <br/>
        </form>
    </div>
</div>

<div class="container">
    <div class="row">
        <?php foreach ($files as $file) { // recherche les images déjà uploadées ?>
            <div class="col-md-4">
                <div class="thumbnail">
                    <img class="img-responsive" src="upload/<?php echo $file; ?>"  alt="img">

                    <div class="caption">
                        <p><?php echo $file; ?></p>
                    </div>
                    <p><a href="delete.php?id=<?php echo $file; ?>" class="btn btn-danger" role="button">Supprimer</a>
                    </p>
                </div>
            </div>
        <?php }
        ?>
    </div>
</div>

</body>
</html>



