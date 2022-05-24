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

function getCapteur($idCapteur){
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
    $sql="SELECT idCapteur,NumCapteur,NomSalle,C.IdBat FROM Capteur AS C INNER JOIN Batiment AS B ON C.IdBat = B.idBat WHERE C.IdBat=:idBat";
	$marqueur=array('idBat'=>$idBat);
	$req = $bd->prepare($sql);
	$req->execute($marqueur);
	$enreg=$req->fetchAll();
	$req->closeCursor();
    return $enreg;
}

function insertCapteur($NumCapteur,$Activer){
	global $bd;
	$sql="INSERT INTO Capteur (NumCapteur,Activer) VALUES (:NumCapteur,:Activer)";
	$marqueur=array('NumCapteur'=>$NumCapteur,'Activer'=>$Activer);
	$req = $bd->prepare($sql);
	$req->execute($marqueur);
	$req->closeCursor();
}

function deleteCapteur($idCapteur){
	global $bd;
    $sql="DELETE FROM Capteur WHERE idCapteur=:idCapteur";
	$marqueur=array('idCapteur'=>$idCapteur);
	$req = $bd->prepare($sql);
	$req->execute($marqueur);
	$req->closeCursor();
}

function createCapteur($idCapteur,$NomSalle,$Date,$TauxCO2,$IdBat){
	global $bd;
	$sql="UPDATE Capteur set NomSalle = :NomSalle, Date=:Date, TauxCO2=:TauxCO2, IdBat=:IdBat  WHERE idCapteur=:idCapteur";
	$marqueur=array('NomSalle'=>$NomSalle,'Date'=>$Date,'TauxCO2'=>$TauxCO2,'IdBat'=>$IdBat,'idCapteur'=>$idCapteur,);
	$req = $bd->prepare($sql);
	$req->execute($marqueur);
	$req->closeCursor();
}


function updateCapteur($idCapteur,$NumCapteur,$NomSalle,$Date,$TauxCO2,$IdBat){
	global $bd;
	$sql="UPDATE Capteur set NomSalle = :NomSalle, Date=:Date, TauxCO2=:TauxCO2, IdBat=:IdBat  WHERE idCapteur=:idCapteur";
	$marqueur=array('NomSalle'=>$NomSalle,'Date'=>$Date,'TauxCO2'=>$TauxCO2,'IdBat'=>$IdBat,'idCapteur'=>$idCapteur,);
	$req = $bd->prepare($sql);
	$req->execute($marqueur);
	$req->closeCursor();
}

?>