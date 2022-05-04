<?php 

include('../Controleur/Bdd.php');

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

function insertUser($pseudo,$encodmdp){
	global $bd;
	$sql="INSERT INTO Utilisateur (Pseudo,Mdp) VALUES (:pseudo,:mdp)";
	$marqueur=array('pseudo'=>$pseudo,'mdp'=>$encodmdp);
	$req = $bd->prepare($sql);
	$req->execute($marqueur);
	$req->closeCursor();
}


?>