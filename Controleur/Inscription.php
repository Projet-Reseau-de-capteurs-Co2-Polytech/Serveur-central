<?php
include('bdd.php');
include("../model/user.php");

$etat=0;

$pseudo=$_POST['Pseudo'];
$mdp=$_POST['Mdp'];

$user=getUser($pseudo);
$BddUser=$user[0];



if($BddUser['Pseudo']!=$pseudo){
	
	//cryptage du mot de passe
	$encodmdp=password_hash($mdp,PASSWORD_DEFAULT);
	
	//requête SQL
	insertUser($pseudo,$encodmdp);

	
	//redirige vers la page acueil du site
	header("Location: ../view/inscription.php?msg=inscrit");
	exit();
}else{
	//redirige vers la page index du site avec un message d'erreur
	header("Location: ../view/inscription.php?err=1");
	exit();
}
?>