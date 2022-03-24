<?php
  if (isset($_POST['formsend2']))
  {
    try
    {
      $pdo = new PDO("mysql:host=localhost;dbname=tweet_aca","root","");
    }

    catch(PDOException $e)
    {
        echo $e -> getMessage();
    }

    if(isset($_SESSION['prenomNom'] ))
    {
      echo "L'utilisateur est déjà connecté";
      return;
    }

    session_start();
    @$login = $_POST["pseudo"];
    @$pass = sha1($_POST["password"]);
    $erreur = "";
    $sel = $pdo -> prepare("SELECT * FROM utilisateurs WHERE pseudo = ? AND password = ? LIMIT 1");
    $sel -> execute(array($login, $pass));
    $tab=$sel -> fetchAll();
    if(!empty($tab))
    {
       session_start();
        $_SESSION["prenomNom"] = ucfirst(strtolower($tab[0]["pseudo"])).
        " ".strtoupper($tab[0]["nom"]);
        $_SESSION["autoriser"]="oui";
        $user = $_SESSION['prenomNom'];
        // afficher un message
        header('location:profile.php');
        echo "Bonjour $login, vous êtes connecté";
    }
    else
    echo "Mauvais login ou mot de passe!";
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
      <title>Document</title>
   </head>
   <header>
      <div id="logotweet">
         <a href="index.php"><img  class="test" src="logo.png"></a>        
      </div>
   </header>
   <body class="body-connexion">
      <div class="container-fluid">
         <div class="container">
            <div class="row">
               <div>
               </div>
            </div>
         </div>
         <nav class="navbar navbar-expand-lg navbar-light bg-light position-absolute">
            <div class="container-fluid">
               <a class="navbar-brand" href="#"><img class="smoothie" src="images/the-aux-bulles.png"></a>
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
                           <li>
                              <hr class="dropdown-divider">
                           </li>
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
      <form method="POST">
         <div class="form-floating mb-3">
            <input name = "pseudo" type="text" class="form-control" id="floatingInput" placeholder="Pseudo ou E-mail">
            <label for="floatingInput">Pseudo ou E-mail</label>
         </div>
         <div class="form-floating">
            <input name = "password" type="Password" class="form-control" id="floatingPassword" placeholder="Mot de passe">
            <label for="floatingPassword">Mot de passe</label>
         </div>
         <div class="form-group">
            <button name="formsend2" type="submit" id="formsend2" class="btn btn-success btn-block submit">Valider</button>
         </div>
      </form>
   </body>
</html>