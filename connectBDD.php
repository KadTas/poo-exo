<?php
try   {
  $user = "root";
  $pass = "";
  // Je me connecte à ma bdd
  $bdd = new PDO('mysql:host=localhost;dbname=aaa;charset=utf8', $user, $pass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

}catch(Exception $e)
{
  // En cas d'erreur, un message s'affiche et tout s'arrête
        die('Erreur : '.$e->getMessage());
}


?>
