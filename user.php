<?php
class User{
    private $id;
    public $login;
    public $email;
    public $firstname;
    public $lastname;
    public $Bdd;

    public function __construct($login, $email, $firstname, $lastname){
        $this->login = $login;
        $this->email = $email;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->Bdd = mysqli_connect('localhost','root','root','classes');
    }

    public function register($login, $password,  $email, $firstname, $lastname){
        mysqli_set_charset($this->Bdd,'utf8');
        $req = mysqli_query($this->Bdd, "INSERT INTO utilisateurs (login , password, email, firstname, lastname) VALUES ('$login','$password','$email','$firstname','$lastname')");
        $recup = mysqli_query($this->Bdd, "SELECT * FROM utilisateurs WHERE login = '".$this->login."'");
        $fetch = mysqli_fetch_all($recup, MYSQLI_ASSOC);
        return $fetch;
    }

    public function connect($login, $password){
        mysqli_set_charset($this->Bdd,'utf8');
        $login = $_POST['login'];
        $password = $_POST['password'];
        $recupUserConnect = mysqli_query($this->Bdd, "SELECT * FROM utilisateurs WHERE login = '".$login."' AND password ='".$password."'");
        $row = mysqli_num_rows($recupUserConnect);
        $fetch = mysqli_fetch_assoc($recupUserConnect);
        if($row == 1){
            $_SESSION['user'] = $fetch;
            header('Location: index.php');
        }
    }
    public function deconnect(){
        if (isset($_POST['deconnect'])){
            session_destroy();
            header('Location: index.php');
        }
    }

    public function delete(){
        mysqli_set_charset($this->Bdd,'utf8');
        $login = $_SESSION['user']['login'];
        if (isset($_POST['deconnect'])){
            session_destroy();
            header('Location: index.php');
        }
        else{
            session_destroy();
            $ReqSup = mysqli_query($this->Bdd,"DELETE FROM `utilisateurs` WHERE login = '".$login."'");
            header('Location: index.php');
        }
    }
    public function update($login, $password, $email, $firstname, $lastname){
        mysqli_set_charset($this->Bdd,'utf8');
        $loginUpdate = $_SESSION['user']['login'];
        $updateUser = mysqli_query($this->Bdd, "UPDATE utilisateurs SET
                                    login = '".$login."',
                                    password = '".$password."',
                                    email = '".$email."',
                                    firstname = '".$firstname."',
                                    lastname = '".$lastname."'
                                    WHERE login = '".$loginUpdate."'");
        header('Location: index.php');
    }
    public function isConnected(){
        mysqli_set_charset($this->Bdd,'utf8');
        echo ((bool)$_SESSION);
    }
}
?>



