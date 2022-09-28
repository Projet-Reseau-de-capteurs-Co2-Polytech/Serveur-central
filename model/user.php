<?php 

require('../controleur/bdd.php');

function getUser($pseudo){
	global $bd;
    $sql="SELECT * FROM Utilisateur WHERE BINARY Pseudo= BINARY :Pseudo";
	$req = $bd->prepare($sql);
	$marqueurs=array('Pseudo'=>$pseudo);
	$req->execute($marqueurs);
	$enreg=$req->fetchAll();
	$req->closeCursor();
	if(!empty($enreg)){
		return $enreg[0];
	}
	return $enreg[0];
}

function getUserID($idUtilisateur){
	global $bd;
    $sql="SELECT * FROM Utilisateur WHERE idUtilisateur=:idUtilisateur";
	$req = $bd->prepare($sql);
	$marqueurs=array('idUtilisateur'=>$idUtilisateur);
	$req->execute($marqueurs);
	$enreg=$req->fetchAll();
	$req->closeCursor();
    return $enreg[0];
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
    $sql="SELECT UB.idUtilisateur,NomSecondaire,NomBatiment,UB.idBat FROM Utilisateur_Batiment AS UB INNER JOIN Batiment AS B ON UB.idBat = B.idBat WHERE UB.idUtilisateur=:idUtilisateur";
	$req = $bd->prepare($sql);
	$marqueurs=array('idUtilisateur'=>$idUtilisateur);
	$req->execute($marqueurs);
	$enreg=$req->fetchAll();
	$req->closeCursor();
    return $enreg;
}


function insertUser($pseudo,$mdp){
	global $bd;
	
	//cryptage du mot de passe
	$encodmdp = password_hash($mdp,PASSWORD_DEFAULT);
	
	$sql="INSERT INTO Utilisateur (Pseudo,Mdp) VALUES (:pseudo,:mdp)";
	$marqueur=array('pseudo'=>$pseudo,'mdp'=>$encodmdp);
	$req = $bd->prepare($sql);
	$req->execute($marqueur);
	$req->closeCursor();
}

function updateUser($idUtilisateur,$pseudo,$mdp){
	global $bd;
	
	$user = getUser($pseudo);
	
	if(!empty($pseudo) && $user['Pseudo']!=$pseudo){
		$sql="UPDATE Utilisateur SET Pseudo=:pseudo WHERE  idUtilisateur=:idUtilisateur";
		$marqueur=array('pseudo'=>$pseudo,'idUtilisateur'=>$idUtilisateur);
		$req = $bd->prepare($sql);
		$req->execute($marqueur);
		$req->closeCursor();
	}

	
	if(!empty($mdp)){
		$encodmdp = password_hash($mdp,PASSWORD_DEFAULT);
		$sql="UPDATE Utilisateur SET Mdp=:mdp WHERE  idUtilisateur=:idUtilisateur";
		$marqueur=array('mdp'=>$encodmdp,'idUtilisateur'=>$idUtilisateur);
		$req = $bd->prepare($sql);
		$req->execute($marqueur);
		$req->closeCursor();
	}
	
}


function deleteUser($idUtilisateur){
	global $bd;
	$sql="DELETE FROM Utilisateur_Batiment WHERE idUtilisateur=:idUtilisateur";
	$marqueur=array('idUtilisateur'=>$idUtilisateur);
	$req = $bd->prepare($sql);
	$req->execute($marqueur);
	$req->closeCursor();
	
	$sql="DELETE FROM Utilisateur WHERE idUtilisateur=:idUtilisateur";
	$marqueur=array('idUtilisateur'=>$idUtilisateur);
	$req = $bd->prepare($sql);
	$req->execute($marqueur);
	$req->closeCursor();
}


?>