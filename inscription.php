<?php
try
{
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=tweet_aca;charset=utf8', 'root', '');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}

if(isset($_POST['formsend']))
{
    extract($_POST);
    if(!empty($sexe) && !empty($pseudo) && !empty($prenom) && !empty($nom) && !empty($email) && !empty($date_naissance) && !empty($password))
    {

        $password = sha1($_POST['password']);
        $insertsql= $bdd->prepare("INSERT INTO utilisateurs(sexe, nom, prenom, pseudo, date_naissance, email, password) VALUES(:sexe, :nom, :prenom, :pseudo, :date_naissance, :email, :password)");
        $insertsql->execute(
            [
                'sexe' => $sexe,
                'nom' => $nom, 
                'prenom' => $prenom, 
                'pseudo' => $pseudo, 
                'date_naissance' => $date_naissance, 
                'email' => $email, 
                'password' => $password
            ]
        );
        if($insertsql->rowCount() == 1)
        {
            echo "✔";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=opera">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
    <link href="style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <title>Inscription</title>
</head>

    <header>
        <div id="logotweet">
<a href="index.php"><img  class="test" src="logo.png"></a>        
</div>
    </header>
<body>
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div>
                   
                </div>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light position-absolute">
            <div class="container-fluid">
              <a class="navbar-brand" href=""><img class="smoothie" src="images/the-aux-bulles.png"></a>

              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="connexion.php">Connexion</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="inscription.php">Inscription</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Mon compte
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                      <li><a class="dropdown-item" href="#">Profil</a></li>
                      <li><a class="dropdown-item" href="#">Paramètre</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Link</a>
                  </li>
                </ul>
                <form class="d-flex">
                  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success" type="submit">Recherche</button>
                </form>
              </div>
            </div>
          </nav>
        
    </div>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">


<div class="container">






<div class="card bg-light">
<article class="card-body mx-auto" style="max-width: 400px;">
	<h4 class="card-title mt-3 text-center">Créez votre compte</h4>
	<p class="text-center">Longue vie à Ramazan</p>
	<p>
		<a href="connexion.php" class="btn btn-block btn-twitter"> <i class="fab fa-twitter"></i>   Connexion via Twitter</a>
		<a href="" class="btn btn-block btn-facebook"> <i class="fab fa-facebook-f"></i>   Connexion via Facebook</a>
	</p>
	<p class="divider-text">
        <span class="bg-light">OU</span>
    </p>
	<form method="POST">
	<div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
            <input name="nom" class="form-control" placeholder="Nom" type="text">
            <input name="prenom" class="form-control" placeholder="Prénom" type="text">
            <input type="text" class="form-control" name="pseudo" placeholder="Pseudo">
        </div> 

        <?php

            if(empty($prenom))
            {
                ?>
                <div class = error-message>
                <?php
                echo "Veuillez indiquer vôtre prénom.";
                ?>
                </div>
                <?php
            }

            else if(empty($nom))
            {
                ?>
                <div class = error-message>
                <?php
                echo "Veuillez indiquer vôtre nom";
                ?>
                </div>
                <?php
            }

            else if(empty($pseudo))
            {
                ?>
                <div class = error-message>
                <?php
                echo "Veuillez indiquer vôtre pseudo";  
                ?>
                </div>
                <?php 
            }

        ?>

        <!-- form-group name// -->
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-venus-mars"></i> </span>
            </div>
            <select name="sexe" class="form-select" aria-label="Default select example">
                <option value="default">Sexe:</option>
                <option value="Homme">Homme</option>
                <option value="Femme">Femme</option>
                <option value="Autre">Autre</option>
            </select>

            <?php
            if (isset($sexe) && $sexe == "default")
            {
                ?>
                <div class = error-message>
                <?php
                echo "Veuillez indiquer vôtre sexe.";
                ?>
                </div>
                <?php
            }

            
            ?>

        </div>
        <!-- form-group sexe// -->
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-birthday-cake"></i> </span>
            </div>
            <input class="form-control"  type="date" name="date_naissance">
        </div>

        <?php

            if(empty($date_naissance))
            {
                ?>
                <div class = error-message>
                <?= "Veuillez indiquer vôtre date de naissance"; ?>
                </div>
                <?php
            }

            else if(!empty($date_naissance))
            {
                echo "✔";
            }

        ?>

        <!-- form-group birth// -->
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
            </div>
            <input name="email" class="form-control" placeholder="Adresse e-mail" type="e-mail">
        </div>

        <?php

            if(empty($email))
            {
                ?>
                <div class = error-message>
                <?php
                echo "Veuillez indiquer vôtre email";
                ?>
                </div>
                <?php
            }

        ?>

       <!-- form-group e-mail// -->
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
            </div>
            <input name="password" class="form-control" placeholder="Mot de passe" type="password">
        </div>

        <?php
        
            if(empty($password))
            {
                ?>
                <div class = error-message>
                <?php
                echo "Veuillez insérer un mot de passe";
                ?>
                </div>
                <?php
            }

        ?>

        <!-- form-group password// -->                                    
        <div class="form-group">
            <button name="formsend" type="submit" id="formsend" class="btn btn-primary btn-block">Valider</button>
        </div>
        <!-- form-group end// -->
        <?php
        if(empty($sexe) || empty($pseudo) || empty($prenom) || empty($nom) || empty($email) || empty($date_naissance) || empty($password))
        {
            ?>
            <div class = error-message>
                <?php
                echo "Veuillez remplir tout les champs";
                ?>
            </div>
            <?php
        } 
        ?>
        <p class="text-center">Vous avez déjà un compte? <a href="connexion.php">Se connecter</a> </p>                                                                 
    </form>
</article>
</div>
 <!-- card.// -->

</div> 
<!--container end.//-->