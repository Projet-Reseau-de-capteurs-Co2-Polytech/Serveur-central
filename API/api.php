<?php
header('Content-Type: application/json');

include '../controleur/bdd.php';
include '../model/capteur.php';
include '../model/batiment.php';
include '../model/co2.php';

$retour["success"] = false ;


if(!empty($_POST["idBatiment"]) && !empty($_POST["idCapteur"]) && !empty($_POST["tauxCO2"]) && !empty($_POST["date"])){
    
    

    
        
     if(empty(getBatiment($_POST["idBatiment"]))){

            

        insertBatiment($_POST["idBatiment"]);

        $retour["nouveauBatiment"] = "Un nouveau batiment à été ajouté à la base de donnée";

    }
        
    
	$idBat = getBatiment($_POST["idBatiment"])['idBat'];
    

    if(empty(getCapteur($_POST["idCapteur"],$idBat))){

        

        insertCapteur($_POST["idCapteur"],$idBat);
        
        $retour["nouveauCapteur"] = "Un nouveau capteur à été ajouté à la base de donnée";

    }

    if(intval($_POST["tauxCO2"])){
        
        
        
        $nomCapteur = getCapteur($_POST["idCapteur"],$idBat)['idCapteur'];
        
        insertMesure($_POST["date"],$_POST["tauxCO2"],$nomCapteur);
        
        $retour["success"] = true;
        $retour["message"] = "Mesure ajoutée";
                                
    }
	
    
}

echo json_encode($retour);
?>