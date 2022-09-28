<?php
$dbName="";
$utilisateur="";
$mdp="";
            try{
			 $bd = new PDO ( "mysql:host=mysql-sirgodfroy.alwaysdata.net;dbname=sirgodfroy_co2","266931_co2bdd", "co2bdd!" );
			 $bd->exec('SET NAMES utf8');
			}
			catch (Exception $e) {
				die ("Erreur: Connexion à la base impossible");
            }
?>