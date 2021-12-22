<?php
ob_start();
session_start();
include 'user.php';

if(!isset($_SESSION['user'])){
    echo "Vous n'êtes pas connecté";
}
else{
    ?>
    <form action="" method="POST">
        <input type="text" name="loginModif" placeholder="Login"></br>
        <input type="password" name="passwordModif" placeholder="Mot de Passe"></br>
        <input type="text" name="emailModif" placeholder="Email"></br>
        <input type="text" name="firstnameModif" placeholder="Prenom"></br>
        <input type="text" name="lastnameModif" placeholder="Nom"></br>
        <button type="submit" name="MODIF">Modifier</button>
    </form>
    <?php
}
echo '<a href = "index.php"><button>Retour</button></a>';

if(isset($_POST['MODIF'])){
    if(empty($_POST['loginModif'])){
        $loginModif = $_SESSION['user']['login'];
    }
    else{
        $loginModif = $_POST['loginModif'];
    }
    if(empty($_POST['passwordModif'])){
        $passwordModif = $_SESSION['user']['password'];
    }
    else{
        $passwordModif = $_POST['passwordModif'];
    }
    if(empty($_POST['emailModif'])){
        $emailModif = $_SESSION['user']['email'];
    }
    else{
        $emailModif = $_POST['emailModif'];
    }
    if(empty($_POST['loginModif'])){
        $firstnameModif = $_SESSION['user']['firstname'];
    }
    else{
        $firstnameModif = $_POST['firstnameModif'];
    }
    if(empty($_POST['lastnameModif'])){
        $lastnameModif = $_SESSION['user']['lastname'];
    }
    else{
        $lastnameModif = $_POST['lastnameModif'];
    }
    $datas = new User($_POST['login'],$_POST['email'],$_POST['firstname'],$_POST['lastname']);
    $datas->update($loginModif, $passwordModif, $emailModif, $firstnameModif, $lastnameModif);
}
ob_end_flush();
?> 