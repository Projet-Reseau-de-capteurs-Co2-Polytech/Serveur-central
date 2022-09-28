<?php
require("../model/user.php");
require("../model/util_bat.php");
$fonction = $_GET['fct'];
$currentId=$_GET['userId'];
$location="Location:../viewAdmin/adminUser.php";
if($fonction=="add"){
	add();
}else if($fonction=="update"){
	update();
}else if($fonction=="delete"){
	del();
}

header($location);

function add(){
	global $location;
	$utilisateur=$_POST['utilisateur'];
	$mdp = $_POST['mdp'];
	$bats = $_POST['bats'];
	
	$user = getUser($utilisateur);
	if($utilisateur !=$user['Pseudo'] ){
		insertUser($utilisateur,$mdp);
		$idUtilisateur=getUser($utilisateur)['idUtilisateur'];
		foreach($bats as $idBat){
			insertUserBar($idUtilisateur,$idBat);
		}
	}else{
		$location="Location:../viewAdmin/adminUser.php?error=sameLogin";
	}
}

function update(){
	global $currentId;
	global $location;
	$utilisateur=$_POST['utilisateur'];
	$mdp = $_POST['mdp'];
	$bats = $_POST['bats'];
	
	updateUser($currentId,$utilisateur,$mdp);
	deleteWithUser($currentId);
	foreach($bats as $idBat){
		insertUserBar($currentId,$idBat);
	}
}

function del(){
	global $currentId;
	deleteUser($currentId);
}


?>