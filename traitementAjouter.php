<?php

    include 'dataBase.php';

    if (isset($_POST['valider'])) {
        extract($_POST);
        // Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
        if (isset($_FILES['image_url']) && $_FILES['image_url']['error'] == 0){
            // Testons si l'extension est autorisée
            $fileInfo = pathinfo($_FILES['image_url']['name']);
            $extension = $fileInfo['extension'];
            $allowedExtensions = ['jpg', 'jpeg', 'gif', 'png'];
            if (in_array($extension, $allowedExtensions)) {
                // On peut valider le fichier et le stocker définitivement
                move_uploaded_file($_FILES['image_url']['tmp_name'], 'uploads/' . basename($_FILES['image_url']['name']));
                $image_url = basename($_FILES['image_url']['name']);

                $r = "INSERT INTO livre (titre,image_url)  values ('$titre','$image_url')";
                $connexion->exec($r);

                $location = $_SERVER['HTTP_REFERER'];
                if ($r) {
                    $success = "livre ajouté avec succès...";
                    header('Location: index.php?sucess=1');
                }
                    
            }
        }
    }
