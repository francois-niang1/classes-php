<?php
session_start();
include 'user.php';
if (@$_SESSION['user']){
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
        <form action="" method="post">
            <input type="text" name='login' placeholder="Login"><br>
            <input type="password" name='password' placeholder="Password"><br>
            <?php
                if(isset($_POST['connexion'])){
                    if (!empty($_POST['login'])&&!empty($_POST['password'])){
                        $datas = new User($_POST['login'], $_POST['email'], $_POST['firstname'], $_POST['lastname']);
                        $datas->connect($_POST['login'],$_POST['password']);
                    }
                    else{
                        echo'remplir tous les champs';
                    }
                }
            ?><br>
            <button type ='submit' name='connexion'>Valider</button>
        </form><br>
        <a href = "index.php"><button>Retour</button></a>
        
    </body>
</html>