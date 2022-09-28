<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Robin Lejeune">
    <title>Essai: Connexion Plateforme</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">    <link rel="stylesheet" href="../css/index.css">
</head>
<body class="text-center">    
	
	
	<?php
		  
		  echo "<div>";
                if(isset($_GET['err'])){
                    $err = $_GET['err'];
                    if($err==1 || $err==2)
                        echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                }
		  echo "</div>"; 
	?>
	
    <main class="form-signin">
      <form action="../controleur/inscription.php" method="POST">
        <h1 class="h3 mb-3 fw-normal">Insciption</h1>
    
        <div class="form-floating">
          <input type="text" name="Pseudo" class="form-control" id="floatingInput" placeholder="log">
          <label for="floatingInput">Identifiant</label>
        </div>

        <div class="form-floating">
          <input type="password" name="Mdp" class="form-control" id="floatingPassword" placeholder="Password">
          <label for="floatingPassword">Mot de passe</label>
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">Crée compte</button>
      </form>
    </main>
</body>
</html>