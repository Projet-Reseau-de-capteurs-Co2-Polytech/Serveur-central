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

function getBatiment($NomBatiment){
	global $bd;
    $sql="SELECT * FROM Batiment WHERE BINARY NomBatiment=BINARY :NomBatiment";
	$marqueur=array('NomBatiment'=>$NomBatiment);
	$req = $bd->prepare($sql);
	$req->execute($marqueur);
	$enreg=$req->fetchAll();
	$req->closeCursor();
	if(!empty($enreg)){
		return $enreg[0];
	}
	return $enreg;
}

function getBatimentID($idBat){
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

function insertBatiment($NomBatiment){
	global $bd;
	$sql="INSERT INTO Batiment (NomBatiment,Activer) VALUES (:NomBatiment,0)";
	$marqueur=array('NomBatiment'=>$NomBatiment);
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

function createBatiment($NomBatiment,$NomSecondaire,$Adresse,$CodePostal,$Ville){
	global $bd;
	$sql="INSERT INTO Batiment (NomBatiment,NomSecondaire,Adresse,CodePostal,Ville) VALUES(:NomBatiment,:NomSecondaire,:Adresse,:CodePostal,:Ville)";
	$marqueur=array('NomBatiment'=>$NomBatiment,'NomSecondaire'=>$NomSecondaire,'Adresse'=>$Adresse,'CodePostal'=>$CodePostal,'Ville'=>$Ville);
	$req = $bd->prepare($sql);
	$req->execute($marqueur);
	$req->closeCursor();
}


function updateBatiment($idBat,$NomBatiment,$NomSecondaire,$Adresse,$CodePostal,$Ville){
	global $bd;
	
	$bat = getBatiment($NomBatiment);
	
	if(!empty($NomBatiment)&&$bat['NomBatiment']!=$NomBatiment){
		$sql="UPDATE Batiment SET NomBatiment=:NomBatiment WHERE  idBat=:idBat";
		$marqueur=array('NomBatiment'=>$NomBatiment,'idBat'=>$idBat);
		$req = $bd->prepare($sql);
		$req->execute($marqueur);
		$req->closeCursor();
	}
	if($bat['NomSecondaire']!=$NomSecondaire){
		$sql="UPDATE Batiment SET NomSecondaire=:NomSecondaire WHERE  idBat=:idBat";
		$marqueur=array('NomSecondaire'=>$NomSecondaire,'idBat'=>$idBat);
		$req = $bd->prepare($sql);
		$req->execute($marqueur);
		$req->closeCursor();
	}
	if($bat['Adresse']!=$Adresse){
		$sql="UPDATE Batiment SET Adresse=:Adresse WHERE  idBat=:idBat";
		$marqueur=array('Adresse'=>$Adresse,'idBat'=>$idBat);
		$req = $bd->prepare($sql);
		$req->execute($marqueur);
		$req->closeCursor();
	}
	if($bat['CodePostal']!=$CodePostal){
		$sql="UPDATE Batiment SET CodePostal=:CodePostal WHERE  idBat=:idBat";
		$marqueur=array('CodePostal'=>$CodePostal,'idBat'=>$idBat);
		$req = $bd->prepare($sql);
		$req->execute($marqueur);
		$req->closeCursor();
	}
	if($bat['Ville']!=$Ville){
		$sql="UPDATE Batiment SET Ville=:Ville WHERE  idBat=:idBat";
		$marqueur=array('Ville'=>$Ville,'idBat'=>$idBat);
		$req = $bd->prepare($sql);
		$req->execute($marqueur);
		$req->closeCursor();
	}

}

?>