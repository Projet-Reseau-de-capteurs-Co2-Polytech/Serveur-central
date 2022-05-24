<?php 
include("../controleur/redirection.php");
require("../model/batiment.php");

//utilise model/batiment.php
$Batiments = getBatiments($_SESSION['id']);
$i=0;
$idBat="";
foreach($Batiments as $bat){
	$i++;
	$idBat=$bat['idBat'];
}
if($i==1){
	header("Location:../controleur/redirectionSalle.php?bat=".$idBat."");
}

function createBatBox($idBat,$nomBat){
	echo'

    <div class="container-fluid">
      <div class="row justify-content-start">
        <div class="col-1"></div>
        <div class="col-4">
          <div class="card shadow bg-body rounded" style="height:8rem; width: 80rem;">
            <div class="card-body">
              <a href="../controleur/redirectionSalle.php?bat='.$idBat.'" class="btn btn-outline-primary btn-lg fs-1" style="height: 6rem; width: 77rem;">'.$nomBat.'</a>
            </div>
          </div>
        </div>
      </div>
      <div class="container-fluid" style="height: 1rem;"></div>
    </div>';
}




 ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Robin Lejeune">
    <title>Page Bâtiments</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>  
  <main>  
	
	<div class="container-fluid shadow bg-body rounded fixed-top">
	    <?php include("headerUser.php");?>
	</div>
	<div class="container-fluid" style="height: 13rem;"></div>
	<?php
	
	foreach($Batiments as $bat){
		createBatBox($bat['idBat'],$bat['NomBatiment']);
	}
	?>
    
  </main>  
</body>
</html>