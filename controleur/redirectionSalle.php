<?php
//Fichier pour rediriger le user
//permet d'évités les fuites de données à cause de $_GET
session_start();
$idBat = $_GET['bat'];
$_SESSION['bat']=$idBat;
header("Location:../view/salle.php");
exit();

?>