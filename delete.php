<?php
session_start();
include 'user.php';
if (@$_SESSION['user']){
    header('Location: index.php');
}
else{
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Connexion</title>
    </head>
    <body>
        <?php
            $datas = new User($_POST['login'], $_POST['email'], $_POST['firstname'], $_POST['lastname']);
            $datas->delete();
        ?>
    </body>
</html>