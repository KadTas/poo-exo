<?php
session_start();

// Suppression des variables de session et de la session
$_SESSION = array();
session_destroy();

echo "Vous êtes maintenant déconnecté";
echo "<a href='../index.php'> Cliquer ici pour revenir en arrière </a>";
?>
