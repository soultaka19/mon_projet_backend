<?php
    include 'dataBase.php';
        $q = $connexion->query("SELECT * FROM livre WHERE id_livre='" .
        $_GET["id_livre"] . "'");
        while ($row = $q->fetch(PDO::FETCH_ASSOC)) {
            $titre = $row['titre'];
            $image_url = $row['image_url'];
        }
    if (isset($_POST['update'])) {
        $titre = $_POST['titre'];
        
        if (isset($_FILES['image_url']) && $_FILES['image_url']['error'] == 0){
            // Testons si le fichier n'est pas trop gros
            // Testons si l'extension est autorisée
            $fileInfo = pathinfo($_FILES['image_url']['name']);
            $extension = $fileInfo['extension'];
            $allowedExtensions = ['jpg', 'jpeg', 'gif', 'png'];
            if (in_array($extension, $allowedExtensions)) {
                // On peut valider le fichier et le stocker définitivement
                move_uploaded_file($_FILES['image_url']['tmp_name'], 'uploads/' . basename($_FILES['image_url']['name']));
                $image_url = basename($_FILES['image_url']['name']);

                        $r = "UPDATE livre SET
                titre='$titre',image_url='$image_url' WHERE id_livre = '" . $_GET["id_livre"] . "'";
                $connexion->exec($r);
                if ($r) {
                    $success = "livre modifié avec succès...";
                    header('Location: index.php?update=1');
                }
                    
            }
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>modification d'un livre</title>
</head>
<body>
    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="titre" class="form-label">titre du livre</label>
                <input type="text" name="titre" id="titre" class="form-control" value="<?php echo $titre ?>">
            </div>
            <div class="mb-3">
                <label for="image_url" class="form-label">chemin de l'image</label>
                <input type="file" name="image_url" id="image_url" class="form-control" value="<?php echo $image_url ?>">
            </div>
            <div class="mb-3">
                <input type="submit" value="modifier le livre" class="btn btn-primary" name="update">
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>