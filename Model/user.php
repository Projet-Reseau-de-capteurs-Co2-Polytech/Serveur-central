<?php 

include('../controleur/bdd.php');

function getUser($pseudo){
	global $bd;
    $sql="SELECT * FROM Utilisateur WHERE Pseudo=:Pseudo";
	$req = $bd->prepare($sql);
	$marqueurs=array('Pseudo'=>$pseudo);
	$req->execute($marqueurs);
	$enreg=$req->fetchAll();
	$req->closeCursor();
    return $enreg;
}

function getAllUser(){
	global $bd;
    $sql="SELECT * FROM Utilisateur";
	$req = $bd->prepare($sql);
	$req->execute();
	$enreg=$req->fetchAll();
	$req->closeCursor();
    return $enreg;
}

function getBatofUser($idUtilisateur){
	global $bd;
    $sql="SELECT UB.idUtilisateur,NomBatiment,NumBat FROM Utilisateur_Batiment AS UB INNER JOIN Batiment AS B ON UB.idBat = B.idBat WHERE UB.idUtilisateur=:idUtilisateur";
	$req = $bd->prepare($sql);
	$marqueurs=array('idUtilisateur'=>$idUtilisateur);
	$req->execute($marqueurs);
	$enreg=$req->fetchAll();
	$req->closeCursor();
    return $enreg;
}


function insertUser($pseudo,$encodmdp){
	global $bd;
	$sql="INSERT INTO Utilisateur (Pseudo,Mdp) VALUES (:pseudo,:mdp)";
	$marqueur=array('pseudo'=>$pseudo,'mdp'=>$encodmdp);
	$req = $bd->prepare($sql);
	$req->execute($marqueur);
	$req->closeCursor();
}

function deleteUser(){
	global $bd;
	$sql="INSERT INTO Utilisateur (Pseudo,Mdp) VALUES (:pseudo,:mdp)";
	$marqueur=array('pseudo'=>$pseudo,'mdp'=>$encodmdp);
	$req = $bd->prepare($sql);
	$req->execute($marqueur);
	$req->closeCursor();
}


?>