<?php
require('../controleur/bdd.php');
function insertUserBar($idUtil,$idBat){
	global $bd;
	
	$sql="INSERT INTO Utilisateur_Batiment (idUtilisateur,idBat) VALUES (:idUtil,:idBat)";
	$marqueur=array('idUtil'=>$idUtil,'idBat'=>$idBat);
	$req = $bd->prepare($sql);
	$req->execute($marqueur);
	$req->closeCursor();
}

function getUtilBat($idUtilisateur,$idBat){
	global $bd;
    $sql="SELECT * FROM Utilisateur_Batiment WHERE idUtilisateur=:idUtilisateur AND idBat=:idBat";
	$req = $bd->prepare($sql);
	$marqueurs=array('idUtilisateur'=>$idUtilisateur,'idBat'=>$idBat);
	$req->execute($marqueurs);
	$enreg=$req->fetchAll();
	$req->closeCursor();
    return $enreg;
}

function deleteWithUser($idUtil){
	global $bd;
	
	$sql="DELETE FROM Utilisateur_Batiment WHERE idUtilisateur=:idUtil;";
	$marqueur=array('idUtil'=>$idUtil);
	$req = $bd->prepare($sql);
	$req->execute($marqueur);
	$req->closeCursor();
}

function deleteWithBat($idBat){
	global $bd;
	
	$sql="DELETE FROM Utilisateur_Batiment WHERE idBat=:idBat;";
	$marqueur=array('idBat'=>$idBat);
	$req = $bd->prepare($sql);
	$req->execute($marqueur);
	$req->closeCursor();
}



?>