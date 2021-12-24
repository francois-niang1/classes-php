<?php
session_start();
include 'user.php';
if(isset($_POST['deconnect'])){
    $datas = new User($_POST['login'], $_POST['email'], $_POST['firstname'], $_POST['lastname']);
    $datas->deconnect();
}
if(isset($_SESSION['user'])){
    @$datas = new User($_POST['login'], $_POST['email'], $_POST['firstname'], $_POST['lastname']);
    $datas->isConnected();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<body>
    <main>
        <?php if(isset($_SESSION['user'])){echo'vous etes connecté';}if(isset($_SESSION['user'])){echo'<form action="" method="POST"><button type = "submit" name="deconnect">deconnecté</button><form>';} ?><br>
        <a href="inscription.php">Inscription</a><br>
        <a href="connexion.php">Connexion</a><br>
        <a href="delete.php">Cliquer pour déconnecter et Supprimer le compte</a><br>
        <a href="modif.php">Modifier les infos</a><br>
        <a href="info.php">Mes infos</a><br>
    </main>
</body>
</html>