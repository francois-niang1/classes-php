<?php
session_start();
include 'user.php';
if (!isset($_SESSION['user'])){
    header('Location: connexion.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Info</title>
    </head>
    <body>
        <main>
            <?php
                @$datas = new User($_POST['login'], $_POST['email'], $_POST['firstname'], $_POST['lastname']);
                $datas->GetAllInfos();
            ?>
            <br><a href = "index.php"><button>Retour</button></a>
        </main>
    </body>
</html>