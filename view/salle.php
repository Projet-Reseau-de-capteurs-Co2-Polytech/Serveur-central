<?php
include("../controleur/redirection.php");
//revois à la page d'accueil si la variable bat de SESSION n'existe pas
if(!isset($_SESSION['bat'])){
	header("Location:accueil.php");
	exit();
}
require("../model/capteur.php");
require("../model/batiment.php");


//fonction qui créer une/deux boite d'affichage de salle.
//la deuxième salle ne s'affiche pas si on rentre une var null en second paramètre
function createCapteurBox($idCapteur,$nomSalle){
	$co2 = getCo2($idCapteur);
	
	echo '
        <div class="col-4">
          <div class="card shadow bg-body rounded" style="height:20rem; width: 30rem;">
            <div class="card-body">
              <h4 class="card-title">'.$nomSalle.'</h4>
              <h6 class="card-subtitle mb-2 text-muted">Taux de CO2:</h6>
              <p class="card-text">'.$co2['TauxCO2'].'</p>
              <h6 class="card-subtitle mb-2 text-muted">Heure de mesure:</h6>
              <p class="card-text">'.$co2['Date'].'</p>
            </div>
          </div>
        </div>
    ';   

}


//utilise model/capteur.php
$Capteurs = getCapteurs($_SESSION['bat']);


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Robin Lejeune">
    <title>Page Salle</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>  
  <main>  
    <div class="container-fluid shadow bg-body rounded fixed-top justify-items-center">
	<?php include("headerUser.php");	?>
      <div class="row justify-content-center">
		<div class="col-3">
			<a href="accueil.php">
				<button type="button" class="btn btn-secondary">Retour</button>
			</a>
        </div>
        <div class="col-7">
          <div class="card shadow justify-content-center align-items-center bg-body rounded" style="height:2rem; width: 30rem;">
            <div class="card-body">
              <h4 class="card-title"><?php echo getBatiment($_SESSION['bat'])['NomBatiment'];?></h4>
            </div>
          </div>
        </div>
      </div>      
      <div class="container-fluid" style="height: 1rem;"></div>
    </div>
    <div class="container-fluid" style="height: 15rem;"></div>
	
	
	<?php 
	$i=0;
	foreach($Capteurs as $capt){
		if($i%2==0){
			echo'
				<div class="container-fluid">
					<div class="row justify-content-center">
			';
		}
		createCapteurBox($capt['idCapteur'],$capt['NomSalle']);	
		if($i%2!=0){
				echo'
					</div>
						<div class="container-fluid" style="height: 2rem;"></div>
					</div>
				';
		}
		$i++;
	}
	?>
  </main>  
</body>
</html>