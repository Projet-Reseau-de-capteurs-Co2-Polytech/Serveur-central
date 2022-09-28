<?php
require("../model/batiment.php");
require("../model/capteur.php");

$fonction = $_GET['fct'];
$currentId=$_GET['idBat'];
$location="Location:../viewAdmin/admin.php";
if($fonction=="add"){
	add();
}else if($fonction=="update"){
	update();
}else if($fonction=="delete"){
	del();
}

header($location);

function add(){
	global $currentId;
	global $location;
	$NomBatiment=$_POST['NomBatiment'];
	$NomSecondaire = $_POST['NomSecondaire'];
	if(strlen(trim($NomSecondaire)) == 0){
		$NomSecondaire="";
	}
	$Adresse = $_POST['Adresse'];
	$CodePostal = $_POST['CodePostal'];
	$Ville = $_POST['Ville'];
	
	$bat = getBatiment($NomBatiment);
	if($NomBatiment !=$bat['NomBatiment'] ){
		createBatiment($NomBatiment,$NomSecondaire,$Adresse,$CodePostal,$Ville);	
	}else{
		$location="Location:../viewAdmin/admin.php?error=sameNameBat";
	}
}

function update(){
	global $currentId;

	
	$NomBatiment=$_POST['NomBatiment'];
	$NomSecondaire = $_POST['NomSecondaire'];
	if(strlen(trim($NomSecondaire)) == 0){
		$NomSecondaire="";
	}
	$Adresse = $_POST['Adresse'];
	$CodePostal = $_POST['CodePostal'];
	$Ville = $_POST['Ville'];
	
	updateBatiment($currentId,$NomBatiment,$NomSecondaire,$Adresse,$CodePostal,$Ville);
}

function del(){
	global $currentId;
	$capteurs = getCapteurs($currentId);
	foreach($capteurs as $capt){
		deleteCapteur($capt['idCapteur']);
	}
	deleteBatiment($currentId);
}


?>