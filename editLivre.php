<?php
require_once './dataBase.php' ;
// accepter les requetes provenant du port 4200
header("Access-Control-Allow-Origin: http://localhost:4200" );
header("Access-Control-Allow-Headers: *" );
header('Access-Control-Allow-Credentials: true' );
header("Access-Control-Allow-Methods: *" );


$id_livre=$_GET["id"];
$les_livres =$connexion->query("select * from livre_url where id_livre=$id_livre" )->fetchAll(PDO::FETCH_ASSOC);
echo json_encode ($les_livres ) ;