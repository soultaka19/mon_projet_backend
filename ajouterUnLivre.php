<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>ajout d'un livre</title>
</head>
<body>
    <div class="container">
        <form action="traitementAjouter.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="titre" class="form-label">titre du livre</label>
                <input type="text" name="titre" id="titre" class="form-control">
            </div>
            <div class="mb-3">
                <label for="image_url" class="form-label">chemin de l'image</label>
                <input type="file" name="image_url" id="image_url" class="form-control">
            </div>
            <div class="mb-3">
                <input type="submit" value="enregidtrer le livre" class="btn btn-primary" name="valider">
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>