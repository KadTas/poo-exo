<?php class User {
    protected $_username;
    protected $_password;
    protected $_mail;

    public function __construct($_password, $_mail) {
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
        $req = $bdd->prepare("SELECT * FROM utilisateur WHERE adresse = :email AND motdepasse = :pass");
        $req->execute(array(
            ':email' => $this->_mail,
            ':pass' => $this->_password
        ));

        $count = $req->rowCount();
        if($count > 0)
    {
    session_start();
    $_SESSION['email'] = $this->_mail;
    $_SESSION['pass'] = $this->_password;
    header("location:tab-admin/index.php?id=success");
    }
    else
    {
    //Mauvais identifiant ou mauvais tout cours
    header("location:index.php?id=fail");
    }
    }
}