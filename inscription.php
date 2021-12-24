<?php include 'user.php';
session_start();
if (isset($_SESSION['user'])){
    header('Location: index.php');
}?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inscription</title>
    </head>
    <body>
        <?php
            if(!empty($_POST['login'])&&!empty($_POST['password'])&&!empty($_POST['email'])&&!empty($_POST['firstname'])&&!empty($_POST['lastname'])){
                $datab = new User($_POST['login'],$_POST['email'],$_POST['firstname'],$_POST['lastname']);
                $datab->register($_POST['login'],$_POST['password'],$_POST['email'],$_POST['firstname'],$_POST['lastname']);
                header('Location: connexion.php');
            }
            else{
                echo '<h3>Remplir les champs</h3>';
            }
        ?>
        <form action="" method="post">
            
            <input type="text" name='login' placeholder="Login"><br>
            <input type="password" name='password' placeholder="Password"><br>
            <input type="text" name='email' placeholder="Email"><br>
            <input type="text" name='firstname' placeholder="Prenom"><br>
            <input type="text" name='lastname' placeholder="Nom"><br>
            <button type ='submit' name='send'>Envoyer</button>
        </form>
        <br><a href = "index.php"><button>Retour</button></a>
        
    </body>
</html>