<?php
//Fichier pour rediriger le user
//permet d'évités les fuites de données à cause de $_GET
session_start();
$_SESSION['bat']=$_GET['bat'];
$_SESSION['NomSecondaire']=$_GET['secondaire'];
$_SESSION['idBat']=$_GET['idBat'];
header("Location:../view/salle.php");
exit();

?>