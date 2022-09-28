<?php
include('bdd.php');
include("../model/user.php");

$etat=0;

$pseudo=$_POST['Pseudo'];
$mdp=$_POST['Mdp'];

$user=getUser($pseudo);
$BddUser=$user;


if($BddUser['Pseudo']!=$pseudo){
		
	//requête SQL
	insertUser($pseudo,$mdp);

	
	//redirige vers la page acueil du site
	header("Location: ../view/inscription.php?err=0");
	exit();
}else{
	//redirige vers la page index du site avec un message d'erreur
	header("Location: ../view/inscription.php?err=1");
	exit();
}
?>