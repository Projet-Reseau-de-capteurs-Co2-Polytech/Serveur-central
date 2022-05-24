<?php 

require('../controleur/bdd.php');

function getAllBatiment(){
	global $bd;
    $sql="SELECT * FROM Batiment";
	$req = $bd->prepare($sql);
	$req->execute();
	$enreg=$req->fetchAll();
	$req->closeCursor();
    return $enreg;
}

function getBatiment($idBat){
	global $bd;
    $sql="SELECT * FROM Batiment WHERE idBat=:idBat";
	$marqueur=array('idBat'=>$idBat);
	$req = $bd->prepare($sql);
	$req->execute($marqueur);
	$enreg=$req->fetchAll();
	$req->closeCursor();
    return $enreg[0];
}

function getBatiments($idUtilisateur){
	global $bd;
    $sql="SELECT * FROM Utilisateur_Batiment INNER JOIN Batiment ON Utilisateur_Batiment.idBat = Batiment.idBat WHERE Utilisateur_Batiment.idUtilisateur=:idUtilisateur";
	$marqueur=array('idUtilisateur'=>$idUtilisateur);
	$req = $bd->prepare($sql);
	$req->execute($marqueur);
	$enreg=$req->fetchAll();
	$req->closeCursor();
    return $enreg;
}

function insertBatiment($NumBat,$Activer){
	global $bd;
	$sql="INSERT INTO Batiment (NumBat,Activer) VALUES (:NumBat,:Activer)";
	$marqueur=array('NumBat'=>$NumBat,'Activer'=>$Activer);
	$req = $bd->prepare($sql);
	$req->execute($marqueur);
	$req->closeCursor();
}

function deleteBatiment($idBat){
	global $bd;
    $sql="DELETE FROM Batiment WHERE idBat=:idBat";
	$marqueur=array('idBat'=>$idBat);
	$req = $bd->prepare($sql);
	$req->execute($marqueur);
	$req->closeCursor();
}

function createBatiment($idBat,$NomBatiment,$Adresse,$CodePostal,$Ville){
	global $bd;
	$sql="UPDATE Batiment set NomBatiment = :NomBatiment, Adresse=:Adresse, CodePostal=:CodePostal, Ville=:Ville  WHERE idBat=:idBat";
	$marqueur=array('NomBatiment'=>$NomBatiment,'Adresse'=>$Adresse,'CodePostal'=>$CodePostal,'Ville'=>$Ville,'idBat'=>$idBat,);
	$req = $bd->prepare($sql);
	$req->execute($marqueur);
	$req->closeCursor();
}


function updateBatiment($idBat,$NumBat,$NomBatiment,$Adresse,$CodePostal,$Ville){
	global $bd;
	$sql="UPDATE Batiment set NomBatiment = :NomBatiment, Adresse=:Adresse, CodePostal=:CodePostal, Ville=:Ville  WHERE idBat=:idBat";
	$marqueur=array('NomBatiment'=>$NomBatiment,'Adresse'=>$Adresse,'CodePostal'=>$CodePostal,'Ville'=>$Ville,'idBat'=>$idBat,);
	$req = $bd->prepare($sql);
	$req->execute($marqueur);
	$req->closeCursor();
}

?>