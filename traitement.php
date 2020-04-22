<?php

    require_once('./poo/class_database.php');
    require_once('./poo/class_user.php');

  $connexion = new Database('db5000303655.hosting-data.io', 'dbs296642', 'dbu526627', ')uq6PE.9');
  $bdd = $connexion->PDOConnexion();

  $email = !empty($_POST['email']) ? $_POST['email'] : NULL;
  $pass = !empty($_POST['pass']) ? $_POST['pass'] : NULL;

$user1 = new User($pass, $email);
$user1->login($bdd);

?>
