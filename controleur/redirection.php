<?php 
session_start();
if(!isset($_SESSION['etat'])){

	header("Location:../index.php");
	exit();
}
?>