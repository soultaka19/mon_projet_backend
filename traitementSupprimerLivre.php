<?php
    include 'dataBase.php';
    $r = "DELETE FROM livre WHERE id_livre = '" . $_GET["id_livre"] . "'";
    $connexion->query($r);
    echo $r;
    if ($r) {
        $location = $_SERVER['HTTP_REFERER'];
        header('Location:index.php?delete=1');
    }
?>