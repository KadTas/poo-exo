<?php

    require_once('./poo/class_database.php');
    require_once('./poo/class_user.php');

    $connexion = new Database('db5000303655.hosting-data.io', 'dbs296642', 'dbu526627', ')uq6PE.9');
    $bdd = $connexion->PDOConnexion();

    $idtoken = $_GET['id'];

    $reqconfirm = $bdd->prepare("UPDATE utilisateur SET validate = 1 WHERE token = '$idtoken'");
    $reqconfirm->execute();

    header("location:index.php");
        
?>