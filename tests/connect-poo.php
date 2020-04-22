<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Se connecter à une BDD en POO</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.18.1/highlight.min.js"></script>
  <script>hljs.initHighlightingOnLoad();</script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.18.1/styles/atom-one-dark-reasonable.min.css">
</head>

<body>

<h1><center>Comment se connecter à une BDD en POO ?</center></h1>

<p> Vous savez vous connectez de manière classique. Mettons maintenant en pratique la POO sur l'utilisation du code "basique".<br>
  Rappel connexion classique :</p>

<pre><code class="php">
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
</code></pre>

<p> Avec l'utilisation de classe :</p>
<pre><code class="php">
class_database.php

  class database {
      //nos variables
      protected $_host;
      protected $_dbname;
      protected $_username;
      protected $_password;

      // Créer l'object à partir du constructeur
      public function __construct($_host, $_dbname, $_username, $_password) {
          $this->_host = $_host;
          $this->_dbname = $_dbname;
          $this->_username = $_username;
          $this->_password = $_password;
      }

      // Fonction permettant de se connecter
      public function PDOConnexion() {
          $bdd = new PDO('mysql:host='.$this->_host.'; dbname='.$this->_dbname, $this->_username, $this->_password);
          $bdd ->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
          $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          // Faire un return de la BDD ou non en fonction de ou on utilise la connexion
          return $bdd;
      }
  }

</code></pre>

<p> En utilisant donc une classe, on permet de se connecter de manière sécurisé.<br>
On se connecte donc en utilisant maintenant le code suivant :
</p>
<pre><code>
index.php

  require_once('class_database.php');
  $connexion = new Database('localhost', 'aaa', 'root', '');
  $bdd = $connexion->PDOConnexion();
</code></pre>
</body>
</html>
