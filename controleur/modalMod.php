<?php
require("../model/user.php");
require("../model/batiment.php");

$id = $_POST['id'];


	
	
	$userBats = getBatofUser($id);
	$i=0;
	foreach($userBats as $uBat){
		echo'
		<div class="mb-3" id="updateSelect'.$i.'">

			<select class="form-select" name="bats[]" id="updateSelect">
			';
			$bats = getAllBatiment();
			foreach($bats as $bat){
				if($bat['idBat']==$uBat['idBat']){
					echo'<option selected="selected" value="'.$bat['idBat'].'">';if(!empty($bat['NomSecondaire'])){echo $bat['NomSecondaire'];}else{ echo $bat['NomBatiment'];}echo'</option>';
				}else{
					echo'<option value="'.$bat['idBat'].'">';if(!empty($bat['NomSecondaire'])){echo $bat['NomSecondaire'];}else{ echo $bat['NomBatiment'];}echo'</option>';
				}
			}
			echo '
			</select>
			
			<button id="deleteU" type="button" class="btn btn-secondary" onclick="UDelete('.$i.')">supprimer</button>
		</div>
		';
		$i++;
	}
exit;
?>