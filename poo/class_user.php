<?php class User {
    protected $_username;
    protected $_password;
    protected $_mail;
    protected $_token;
    protected $_validation;

    public function __construct($_password, $_mail) {
        $this->_password = $_password;
        $this->_mail = $_mail;
        $this->_token=substr(str_shuffle(str_repeat("0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN", 40)), 0, 40);
    }

    public function register($bdd) {
        $req= $bdd->prepare('INSERT INTO utilisateur (adresse, motdepasse, id_type, token, validate) VALUES (:adresse, :motdepasse, :id_type, :token, :validate)');
        $req->execute(array(
        ':adresse' => $this->_mail,
        ':motdepasse' => $this->_password,
        ':token' => $this->_token,
        ':id_type' => 3,
        ':validate' => 0));
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
 
    public function sendmail($bdd) {
        $req = $bdd->prepare("SELECT * FROM utilisateur WHERE adresse = '$this->_mail'" );
        $req->execute();
        mail($this->_mail, "Test envoi de mail","Votre inscription a été effectuée, confirmez votre compte : http://tas.simplon-charleville.fr/poo-exo/confirm.php?id=$this->_token");
    }

    public function confirmed($bdd) {
        $reqconfirm = $bdd->prepare("UPDATE utilisateur SET validate = 1 WHERE token = '$idtoken'");
        $reqconfirm->execute();
    }
}