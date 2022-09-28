<?php
require("../model/capteur.php");
$fonction = $_GET['fct'];
$currentId=$_GET['idCapteur'];
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
	global $location;

		$idBatiment=$_POST['batiment'];
		$NomCapteur = $_POST['NomCapteur'];
		$NomSecondaire = $_POST['NomSecondaire'];
		if(strlen(trim($NomSecondaire)) == 0){
			$NomSecondaire="";
		}
	if(!empty($idBatiment)){
		createCapteur($NomCapteur,$NomSecondaire,$idBatiment);	
	}else{
		$location="Location:../viewAdmin/admin.php?error=noBat";
	}
}

function update(){
	global $currentId;
	$idBatiment=$_POST['batiment'];
	$NomCapteur = $_POST['NomCapteur'];
	$NomSecondaire = $_POST['NomSecondaire'];
	if(strlen(trim($NomSecondaire)) == 0){
		$NomSecondaire="";
	}
	
	updateCapteur($currentId,$NomCapteur,$NomSecondaire,$idBatiment);
}

function del(){
	global $currentId;
	deleteCapteur($currentId);
}


?>