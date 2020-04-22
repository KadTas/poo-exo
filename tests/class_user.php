<?php class user {
    protected $_username;
    protected $_password;
    protected $_mail;

    public function __construct($_username, $_password, $_mail) {
        $this->_username = $_username;
        $this->_password = $_password;
        $this->_mail = $_mail;
    }

    public function register($bdd) {
        $req= $bdd->prepare('INSERT INTO utilisateur (pseudo, adresse, motdepasse, id_type) VALUES (:pseudo, :adresse, :motdepasse, :id_type)');
        $req->execute(array(
        ':pseudo' => $this->_username,
        ':adresse' => $this->_mail,
        ':motdepasse' => $this->_password,
        'id_type' => 3));
        return $req;
    }

    public function login($bdd) {
        $req = $bdd->prepare('SELECT * FROM utilisateur WHERE pseudo = :pseudo AND motdepasse = :motdepasse');
 
    $req->execute(array(
    'pseudo' => $_POST['pseudo'],
    'motdepasse' => $_POST['motdepasse']));
    $resultat = $req->fetch();
 
    if (!$resultat)
    {
        header("Location:catalogue.php");
    }
    else
    {
    session_start();
    $_SESSION['pseudo'] = $resultat['pseudo'];
    $_SESSION['id_type'] = $resultat['id_type'];
    $_SESSION['id'] = $resultat['id'];
    header("Location:index.php?login=ok");
    }
    }
}