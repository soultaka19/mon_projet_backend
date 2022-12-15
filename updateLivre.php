<?php
    require_once './dataBase.php';

    header("Access-Control-Allow-Origin: http://localhost:4200" );
    header("Access-Control-Allow-Headers: *" );
    header('Access-Control-Allow-Credentials: true' );
    header("Access-Control-Allow-Methods: *" );

    $json = file_get_contents('php://input');
    $data = json_decode($json,true);
    $id_livre=$data["id_livre"];
    $titre=$data["titre"];
    $prix=$data["prix"];
    $image_url=$data["image_url"];


    $etatReponse=$connexion->exec("update livre_url set  titre='$titre',prix='$prix' ,image_url='$image_url'  where  id_livre=$id_livre");
    // vérification de l'état de la réponse
    if ($etatReponse) {
        echo"Livre modifié avec succés";
    } else {
        echo"Erreur de modification";
    }
