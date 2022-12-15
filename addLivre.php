<?php
    require_once './dataBase.php';

    header("Access-Control-Allow-Origin: http://localhost:4200" );
    header("Access-Control-Allow-Headers: *" );
    header('Access-Control-Allow-Credentials: true' );
    header("Access-Control-Allow-Methods: *" );

    $json = file_get_contents('php://input');
    $data = json_decode($json,true);
    $titre=$data["titre"];
    $prix=$data["prix"];
    $image_url=$data["image_url"];

    if ($connexion->exec("insert into livre_url(titre,prix,image_url) values('$titre',$prix,'$image_url')")) {
        echo json_encode(["status"=>true,"message"=>"livre ajouté avec succés"]);
    } else {
        echo json_encode(["status"=>false,"message"=>"Erreur d'ajout"]);
    }
