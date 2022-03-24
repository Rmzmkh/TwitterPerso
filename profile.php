<?php
session_start();

$bdd = new PDO('mysql:host=127.0.0.1;dbname=tweet_aca;charset=utf8', 'root', '');

if(isset($_GET['user'])) {
    
    $id = htmlspecialchars($_GET['user']);
    $req = $bdd->prepare("SELECT * FROM utilisateurs WHERE id = ?");
    $req->execute(array($id));
    $user = $req->fetch();
    if($req->rowCount() == 1) {
        $user = $req->fetch();

       
    }else {
        $error = "Utilisateur introuvable";
    }
}

if(isset($_SESSION['user'])) {
    if($_SESSION['user']['id'] == $user['id']) {
        $set = 1;
    }else {
        $set = 0;
    }
}else {
    $set = 0;  
}

?>



<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <title>Se connecter</title>
    </head>

    <body>
        <header></header>
        <h1>Informations sur l'utilisateur</h1>

        <table>
            <tr>
                <td>Pseudo :</td>
                <td><?= $_SESSION["prenomNom"]; ?></td>
            </tr>

            <tr>
                <td>Age :</td>
                <td><?= $_SESSION["date_naissance"]; ?></td>
            </tr>
            <?php if($set == 1 ) { ?>
                <tr>
                    <td><a href="setup.php">Modifier son profil</a></td>
                </tr>
            <?php } ?>
        </table>    

        <?php if(isset($error)) { echo $error; } ?>



    </body>



</html>
