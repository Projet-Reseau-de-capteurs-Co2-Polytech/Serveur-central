<?php 

include('../controleur/bdd.php');

function getAllCapteur(){
	global $bd;
    $sql="SELECT * FROM Capteur";
	$req = $bd->prepare($sql);
	$req->execute();
	$enreg=$req->fetchAll();
	$req->closeCursor();
    return $enreg;
}

function getCapteur($NomCapteur,$idBat){
	global $bd;
    $sql="SELECT * FROM Capteur WHERE NomCapteur=:NomCapteur AND idBat=:idBat";
	$marqueur=array('NomCapteur'=>$NomCapteur,'idBat'=>$idBat);
	$req = $bd->prepare($sql);
	$req->execute($marqueur);
	$enreg=$req->fetchAll();
	$req->closeCursor();
    return $enreg[0];
}

function getCapteurID($idCapteur){
	global $bd;
    $sql="SELECT * FROM Capteur WHERE idCapteur=:idCapteur";
	$marqueur=array('idCapteur'=>$idCapteur);
	$req = $bd->prepare($sql);
	$req->execute($marqueur);
	$enreg=$req->fetchAll();
	$req->closeCursor();
    return $enreg[0];
}

function getCo2($idCapteur){
	global $bd;
    $sql="SELECT Date,TauxCO2,Co.idCapteur FROM Co2 AS Co INNER JOIN Capteur AS Ca ON Co.idCapteur = Ca.idCapteur WHERE Co.idCapteur=:idCapt ORDER BY Date DESC";
	$marqueur=array('idCapt'=>$idCapteur);
	$req = $bd->prepare($sql);
	$req->execute($marqueur);
	$enreg=$req->fetchAll();
	$req->closeCursor();
    return $enreg[0];
}


function getCapteurs($idBat){
	global $bd;
    $sql="SELECT idCapteur,NomCapteur,C.NomSecondaire,C.IdBat FROM Capteur AS C INNER JOIN Batiment AS B ON C.IdBat = B.idBat WHERE C.IdBat=:idBat";
	$marqueur=array('idBat'=>$idBat);
	$req = $bd->prepare($sql);
	$req->execute($marqueur);
	$enreg=$req->fetchAll();
	$req->closeCursor();
    return $enreg;
}

function insertCapteur($NomCapteur,$IdBat){
	global $bd;
	$sql="INSERT INTO Capteur (NomCapteur,IdBat,Activer) VALUES (:NomCapteur,:IdBat,0)";
	$marqueur=array('NomCapteur'=>$NomCapteur,'IdBat'=>$IdBat);
	$req = $bd->prepare($sql);
	$req->execute($marqueur);
	$req->closeCursor();
}

function deleteCapteur($idCapteur){
	global $bd;
	
	$sql="DELETE FROM Co2 WHERE idCapteur=:idCapteur";
	$marqueur=array('idCapteur'=>$idCapteur);
	$req = $bd->prepare($sql);
	$req->execute($marqueur);
	$req->closeCursor();	
	
    $sql="DELETE FROM Capteur WHERE idCapteur=:idCapteur";
	$marqueur=array('idCapteur'=>$idCapteur);
	$req = $bd->prepare($sql);
	$req->execute($marqueur);
	$req->closeCursor();
}

function createCapteur($NomCapteur,$NomSecondaire,$IdBat){
	global $bd;
	$sql="INSERT INTO Capteur (NomCapteur,NomSecondaire,IdBat) VALUES (:NomCapteur,:NomSecondaire,:IdBat)";
	$marqueur=array('NomCapteur'=>$NomCapteur,'NomSecondaire'=>$NomSecondaire,'IdBat'=>$IdBat);
	$req = $bd->prepare($sql);
	$req->execute($marqueur);
	$req->closeCursor();
}


function updateCapteur($idCapteur,$NomCapteur,$NomSecondaire,$idBat){
	global $bd;

	$capt = getCapteurID($idCapteur);
	
	if(!empty($NomCapteur)&&$capt['NomCapteur']!=$NomCapteur){
		$sql="UPDATE Capteur SET NomCapteur=:NomCapteur WHERE  idCapteur=:idCapteur";
		$marqueur=array('NomCapteur'=>$NomCapteur,'idCapteur'=>$idCapteur);
		$req = $bd->prepare($sql);
		$req->execute($marqueur);
		$req->closeCursor();
	}
	if($capt['NomSecondaire']!=$NomSecondaire){
		$sql="UPDATE Capteur SET NomSecondaire=:NomSecondaire WHERE  idCapteur=:idCapteur";
		$marqueur=array('NomSecondaire'=>$NomSecondaire,'idCapteur'=>$idCapteur);
		$req = $bd->prepare($sql);
		$req->execute($marqueur);
		$req->closeCursor();
	}
	if(!empty($idBat)&& $capt['IdBat']!=$idBat){
		$sql="UPDATE Capteur SET idBat=:idBat WHERE  idCapteur=:idCapteur";
		$marqueur=array('idBat'=>$idBat,'idCapteur'=>$idCapteur);
		$req = $bd->prepare($sql);
		$req->execute($marqueur);
		$req->closeCursor();
	}
}

?>