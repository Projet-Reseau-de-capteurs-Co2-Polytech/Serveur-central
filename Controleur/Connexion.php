<?php
session_start();
include('Bdd.php');
include("../Model/user.php");

        //requête SQL
		$PseudoInput = $_POST['Pseudo'];
		$user=getUser($PseudoInput);
			
		if(!empty($user)){
			//pour la vérification du mot de passe	
			$compte=$user[0];
			$input=$_POST['Mdp'];
			$mdp=$compte['Mdp'];
			$Pseudo=$compte['Pseudo'];
			$decryptmdp=password_verify($input,$mdp);			
		}

		//ouverture de la session
		if($Pseudo==$PseudoInput && $decryptmdp==1 && empty($PseudoInput)==false){
			$_SESSION['pseudo']=$compte['Pseudo'];
			$_SESSION['mdp']=$compte['Mdp'];
			$_SESSION['id']=$compte['idUtilisateur'];
			$_SESSION['etat']=1;
			
		//acces à l'acueil
			header('Location:../View/Accueil.php');
			}
		else {
			echo "Pseudo = ".$Pseudo."";
			echo "PseudoInput = ".$PseudoInput."";
			echo "".$decryptmdp."";
			echo "empty ? ".empty($PseudoInput)."";
			//header('Location:../View/index.php?msg=err');
		  	exit();
		}





?>