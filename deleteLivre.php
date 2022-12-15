<?php
require_once './dataBase.php' ;
// accepter les requetes provenant du port 4200
header("Access-Control-Allow-Origin: http://localhost:4200" );
header("Access-Control-Allow-Headers: *" );
header('Access-Control-Allow-Credentials: true' );
header("Access-Control-Allow-Methods: *" );


// récupération de l'id du livre à supprimer
$id_livre=$_GET["id"];
// requête et réponse
$etatReponse=$connexion->exec("delete from livre_url where id_livre=$id_livre");
// vérification de l'état de la réponse
if ($etatReponse) {
echo"Livre supprimé avec succés";
} else {
echo"Erreur de suppréssion";
}