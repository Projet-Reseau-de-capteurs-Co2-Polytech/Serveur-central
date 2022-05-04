<?php
 header('Content-Type: application/json');
 try{
     $pdo = new PDO('mysql:host=localhost;port=3306;dbname=api;','root','');
     $retour["success"] = true;
     $retour["message"] = "OK";
 } catch(Exception $e){
    $retour["success"] = false;
    $retour["message"] = "NO";
 }
 //echo("entré");
if(!empty($_POST["idBatiment"]) && !empty($_POST["idCapteur"]) && !empty($_POST["tauxCO2"]) && !empty($_POST["heure"])){
    
    if(intval($_POST["idBatiment"]) && intval($_POST["idCapteur"]) && intval($_POST["tauxCO2"]) && intval($_POST["heure"])){
        
        $requete = $pdo->prepare("INSERT INTO `mesures` (`idCapteur`, `tauxCO2`, `date`, `heure`) VALUES (:idCap, :taux, 20220105, :h);");
        $requete->bindParam(":idCap", $_POST["idCapteur"]);
        $requete->bindParam(":taux", $_POST["tauxCO2"]);
        //$requete->bindParam(":dat", 20220501);
        $requete->bindParam(":h",$_POST["heure"]);
        $requete->execute();
        //
        $retour["success"] = true;
        $retour["message"] = "Mesure ajoutée";
                                
    }
}




 echo json_encode($retour);
 ?>