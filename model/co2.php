<?php 

require('../controleur/bdd.php');

function insertMesure($Date,$TauxCO2,$NomCapteur){
	global $bd;
	$sql="INSERT INTO Co2 (`Date`, `TauxCO2`, `idCapteur`) VALUES (:DateT, :TauxCO2, :NomCapteur );";
	$marqueur=array('DateT'=>$Date,'TauxCO2'=>$TauxCO2,'NomCapteur'=>$NomCapteur);
	$req = $bd->prepare($sql);
	$req->execute($marqueur);
	$req->closeCursor();
}

function getAllCo2($id){
	global $bd;
    $sql="SELECT * FROM Co2";
	$req = $bd->prepare($sql);
	$req->execute();
	$enreg=$req->fetchAll();
	$req->closeCursor();
    return $enreg;
}

function getCo2Array($idCapteur){
	global $bd;
    $sql="SELECT * FROM Co2 as Co INNER JOIN Capteur as Ca ON Co.idCapteur = Ca.idCapteur WHERE Co.idCapteur=:idCapteur";
	$marqueur=array('idCapteur'=>$idCapteur);
	$req = $bd->prepare($sql);
	$req->execute($marqueur);
	$enreg=$req->fetchAll();
	$req->closeCursor();
    return $enreg;
}

?>