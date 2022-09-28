<?php
require("../model/batiment.php");
require("../model/capteur.php");

function createBatBox($bat){
	echo'
        <div class="row justify-content-start">
          <div class="col-1"></div>
          <div class="col-9">
            <div class="card shadow bg-body rounded">
              <div class="card-body">
                <h4 class="card-title">';
				if(!empty($bat['NomSecondaire'])){echo $bat['NomSecondaire'];}else{ echo $bat['NomBatiment'];}
				echo'</h4>
	';
				if(!empty($bat['Adresse'])){
					echo '<h6 class="card-subtitle mb-2 text-muted">'.$bat['Adresse'].', '.$bat['CodePostal'].' '.$bat['Ville'].'</h6>';
				}
	echo'
              </div>
            </div>
          </div>
          <div class="col-2">
            <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#ModalMod" data-id="'.$bat['idBat'].'" data-name="'.$bat['NomBatiment'].'" data-secondaire="'.$bat['NomSecondaire'].'" data-adresse="'.$bat['Adresse'].'" data-cp="'.$bat['CodePostal'].'" data-ville="'.$bat['Ville'].'">Modifier</button>
            <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#ModalDel" data-id="'.$bat['idBat'].'" data-name="'.$bat['NomBatiment'].'">Supprimer</button>
          </div>
        </div>
        <div class="container-fluid" style="height: 1rem;"></div>
	
	';
}


function createCapteurBox($capt){
	echo'


		  <div class="col-2">
            <div class="card shadow bg-body rounded">
              <div class="card-body">
                <h4 class="card-title">';if(!empty($capt['NomSecondaire'])){echo $capt['NomSecondaire'];}else{ echo $capt['NomCapteur'];}echo'</h4>
                <h6 class="card-subtitle mb-2 text-muted">Associer au bâtiment : </h6>
				'; 
				
				$bat=getBatimentID($capt['IdBat']);
				$nomBatiment =$bat['NomBatiment'];
				$idBat =$bat['idBat'];
				echo'
				<p>';
				if(!empty($bat['NomSecondaire'])){echo $bat['NomSecondaire'];}else{ echo $bat['NomBatiment'];}
				echo'</p>
                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#ModalModSalle" data-id="'.$capt['idCapteur'].'" data-name="'.$capt['NomCapteur'].'" " data-secondaire="'.$capt['NomSecondaire'].'" " data-bat="'.$nomBatiment.'" data-idbat="'.$idBat.'">Modifier</button>
                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#ModalDelSalle" data-id="'.$capt['idCapteur'].'" data-name="'.$capt['NomCapteur'].'">Supprimer</button>
              </div>
            </div>
          </div>
	
   ';
}



?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Robin Lejeune">
    <title>Page Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Robin Lejeune">
    <title>Page Admin</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  </head>
  <body>
    <main>  
      <div class="container-fluid shadow bg-body rounded fixed-top">
			
		<?php 
			require("headerAdmin.php");
		?>
			
      </div>
      <div class="container-fluid" style="height: 13rem;"></div>
            <?php 
	  if(isset($_GET['error'])){
		  if($_GET['error']=="noBat"){
			  echo'
				<div class="alert alert-danger " role="alert">
					<p class="text-center"> Il n\'y a aucun bâtiment engergistré, veuillez créer un batiment.</p>
				</div>
			  
			  
			  ';
		  }else if($_GET['error']=="sameNameBat"){
			  echo'
				<div class="alert alert-danger " role="alert">
					<p class="text-center"> Il y a déjà un bâtiment engergistré ayant le même nom.</p>
				</div>
			  
			  
			  ';
		  }
	  }
	  
	  
	  
	  ?>
      <div class="container-fluid">
        <div class="row justify-content-start">
          <div class="col-1"></div>
          <div class="col-4">
            <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#ModalAdd">Ajouter Bâtiment</button>
          </div>
        </div>
        <div class="container-fluid" style="height: 3rem;"></div>
      </div>
  
      <div class="container-fluid">

      <!-- Card Bâtiment -->
		<?php
		
			$batiments = getAllBatiment();
			foreach($batiments as $bat){
				createBatBox($bat);
			}


		?>

        <!-- Card Salle -->
		<div class="container-fluid" style="height: 3rem;"></div>
      
		<div class="container-fluid">
			<div class="row justify-content-start">
				<div class="col-1"> </div>
				<div class="col-4">
					<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalAddSalle">Ajouter Salle</button><br>
				</div>

			</div>
			<div class="container-fluid" style="height: 1rem;"></div>
		</div>

		<?php
		$Capteurs = getAllCapteur();
			$j=0;
			foreach($Capteurs as $capt){
				if($j%4==0){
					echo'
					<div class="row justify-content-start">
					  <div class="col-1"></div>
					';
				}
				$j++;
				createCapteurBox($capt);	
				if($j%4==0){
					echo'
						<div class="col-1"></div>
						</div>
						<div class="container-fluid" style="height: 1rem;"></div>
					';
				}
				
			}

		
		?>
        <div class="container-fluid" style="height: 5rem;"></div>
      </div>
      
      
      
      <!-- Modal Windows -->

      <div class="modal fade" id="ModalAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ajout Bâtiment</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form id="batAdd" action="../controleur/batiment.php?fct=add" method="post">
                <div class="mb-3">
                  <label for="NomBatiment" class="form-label">Identifiant Bâtiment</label>
                  <input name="NomBatiment" type="identifiant" class="form-control" id="NomBatiment" aria-describedby="emailHelp" required="required">
                </div>
				<div class="mb-3">
                  <label for="NomSecondaire" class="form-label">Nom Secondaire (optionnel : s'affiche à la place de l'identifiant)</label>
                  <input name="NomSecondaire"type="identifiant" class="form-control" id="NomSecondaire" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                  <label for="Adresse" class="form-label">Adresse (optionnel)</label>
                  <input name="Adresse" type="Adresse" class="form-control" id="Adresse">
                </div>
                <div class="mb-3">
                  <label for="CodePostal" class="form-label">Code Postal (optionnel)</label>
                  <input name="CodePostal" type="Code Postal" class="form-control" id="CodePostal">
                </div>
                <div class="mb-3">
                  <label for="Ville" class="form-label">Ville (optionnel)</label>
                  <input name="Ville" type="Ville" class="form-control" id="Ville">
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
              <button type="submit" form="batAdd" class="btn btn-primary">Sauvegarder</button>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="ModalMod" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modification Bâtiment</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <form id="batUpdate" action="../controleur/batiment.php?fct=update" method="post">
                <div class="mb-3">
                  <label for="NomBatiment" class="form-label">Identifiant Bâtiment</label>
                  <input name="NomBatiment" type="identifiant" class="form-control" id="NomBatiment" aria-describedby="emailHelp">
                </div>
				<div class="mb-3">
                  <label for="NomSecondaire" class="form-label">Nom Secondaire (optionnel : s'affiche à la place de l'identifiant)</label>
                  <input name="NomSecondaire"type="identifiant" class="form-control" id="NomSecondaire" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                  <label for="Adresse" class="form-label">Adresse (optionnel)</label>
                  <input name="Adresse" type="Adresse" class="form-control" id="Adresse">
                </div>
                <div class="mb-3">
                  <label for="CodePostal" class="form-label">Code Postal (optionnel)</label>
                  <input name="CodePostal" type="Code Postal" class="form-control" id="CodePostal">
                </div>
                <div class="mb-3">
                  <label for="Ville" class="form-label">Ville (optionnel)</label>
                  <input name="Ville" type="Ville" class="form-control" id="Ville">
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
              <button type="submit" form="batUpdate" class="btn btn-secondary" data-bs-dismiss="modal">Sauvegarder</button>
            </div>
          </div>
        </div>
      </div> 

      <div class="modal fade" id="ModalDel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Suppression Bâtiment</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Voulez-vous supprimer ce bâtiment ?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
			  <a id=supprimerBat href="../controleur/batiment.php?fct=delete">
              <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Supprimer</button>
			  </a>
            </div>
          </div>
        </div>
      </div>
      
	  
      <!-- Modal Salle -->
	  <div class="modal fade" id="ModalAddSalle" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ajout Salle</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form id="captAdd" action="../controleur/capteur.php?fct=add" method="post">
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Identifiant Bâtiment</label>
                  <select name="batiment" id="batiment" class="form-select">
				  <?php
				  if(empty($batiments)){
					  echo '<option id="" value="">veuillez créer un bâtiment</option>';
				  }else{
					foreach($batiments as $bat){
						echo'<option id="'.$bat['idBat'].'" value="'.$bat['idBat'].'">';if(!empty($bat['NomSecondaire'])){echo $bat['NomSecondaire'];}else{ echo $bat['NomBatiment'];} echo'</option>';
					}
				  }
				  ?>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="NomCapteur" class="form-label">Identifiant Capteur</label>
                  <input name="NomCapteur" type="NomCapteur" class="form-control" id="NomCapteur">
                </div>
				<div class="mb-3">
                  <label for="NomSecondaire" class="form-label">Nom Secondaire (optionnel : s'affiche à la place de l'identifiant)</label>
                  <input name="NomSecondaire" type="NomSecondaire" class="form-control" id="NomSecondaire">
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
              <button type="submit" form="captAdd" class="btn btn-primary">Sauvegarder</button>
            </div>
          </div>
        </div>
      </div>


      <div class="modal fade" id="ModalModSalle" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modification Salle</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form id="captUpdate" action="../controleur/capteur.php?fct=update" method="post">
                 <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Identifiant Bâtiment</label>
                  <select name="batiment" id="batiment" class="form-select">
				  <?php
					foreach($batiments as $bat){
						echo'<option id="'.$bat['idBat'].'" value="'.$bat['idBat'].'">';if(!empty($bat['NomSecondaire'])){echo $bat['NomSecondaire'];}else{ echo $bat['NomBatiment'];}echo'</option>';
					}
				  ?>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="NomCapteur" class="form-label">Identifiant Capteur</label>
                  <input name="NomCapteur" type="NomCapteur" class="form-control" id="NomCapteur">
                </div>
				<div class="mb-3">
                  <label for="NomSecondaire" class="form-label">Nom Secondaire (optionnel : s'affiche à la place de l'identifiant)</label>
                  <input name="NomSecondaire" type="NomSecondaire" class="form-control" id="NomSecondaire">
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
              <button type="submit" form="captUpdate"  class="btn btn-primary" data-bs-dismiss="modal">Sauvegarder</button>
            </div>
          </div>
        </div>
      </div> 

      <div class="modal fade" id="ModalDelSalle" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Suppression Salle</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Voulez-vous supprimer cette salle ?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
			  <a id=supprimerCapt href="../controleur/capteur.php?fct=delete">
				<button type="button" class="btn btn-primary" data-bs-dismiss="modal">Supprimer</button>
			  </a>
            </div>
          </div>
        </div>
      </div>
  
    </main>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
	<script type="text/javascript">
	
	//Modal Batiment
		//ModalMod
		let templateModBat = null;
	
		$('#ModalMod').on('show.bs.modal', function (event) {
			templateModBat = $(this).html();
			var button = $(event.relatedTarget) 
			var id = button.data('id')
			var nameBat = button.data('name')
			var secondaryName = button.data('secondaire')
			var adresse = button.data('adresse')
			var cp = button.data('cp')
			var ville = button.data('ville')
			var modal = $(this)
			modal.find('.modal-title').text('Modification : ' + nameBat)
			modal.find('#NomBatiment').val(nameBat)
			modal.find('#NomSecondaire').val(secondaryName)
			modal.find('#Adresse').val(adresse)
			modal.find('#CodePostal').val(cp)
			modal.find('#Ville').val(ville)
			
			$("#batUpdate").attr("action", "../controleur/batiment.php?fct=update&idBat=" + id);

		})
		

		$('#ModalMod').on('hidden.bs.modal', function(e) {
		  $(this).html(templateModBat);
		});
		
		
		
		//ModalAdd
		let templateAddBat = null;

		$('#ModalAdd').on('show.bs.modal', function (event) {
			templateAddBat = $(this).html();
		})
		
		$('#ModalAdd').on('hidden.bs.modal', function(e) {
		  $(this).html(templateAddBat);
		});
		
		
		//ModalDel
		$('#ModalDel').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) 
		  var id = button.data('id')
		  var nameBat = button.data('name')
		  var modal = $(this)
		  modal.find('.modal-title').text('Suppression : ' + nameBat)

		  $("#supprimerBat").attr("href", "../controleur/batiment.php?fct=delete&idBat=" + id);
		  
		})
		
	//Modal Salle
			//ModalMod
		let templateModCap = null;
	
		$('#ModalModSalle').on('show.bs.modal', function (event) {
			templateModCap = $(this).html();
			var button = $(event.relatedTarget) 
			var id = button.data('id')
			var nameCapt = button.data('name')
			var secondaryName = button.data('secondaire')
			var batiment = button.data('batiment')
			var idBat = button.data('idbat')
			var modal = $(this)
			modal.find('.modal-title').text('Modification : ' + nameCapt)
			modal.find('#NomCapteur').val(nameCapt)
			modal.find('#NomSecondaire').val(secondaryName)
			
			$("#countryselect option[value=4]").prop("selected", "selected")

			modal.find('#batiment').val(idBat)
			
			$("#captUpdate").attr("action", "../controleur/capteur.php?fct=update&idCapteur=" + id);

		})
		

		$('#ModalModSalle').on('hidden.bs.modal', function(e) {
		  $(this).html(templateModCap);
		});
		
		
		
		//ModalAdd
		let templateAddCap = null;

		$('#ModalAddSalle').on('show.bs.modal', function (event) {
			templateAddCap = $(this).html();
		})
		
		$('#ModalAddSalle').on('hidden.bs.modal', function(e) {
		  $(this).html(templateAddCap);
		});
		
		
		//ModalDel
		$('#ModalDelSalle').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) 
		  var id = button.data('id')
		  var nameCapt = button.data('name')
		  var modal = $(this)
		  modal.find('.modal-title').text('Suppression : ' + nameCapt)

		  $("#supprimerCapt").attr("href", "../controleur/capteur.php?fct=delete&idCapteur=" + id);
		  
		})
		
	</script>
	
	
  </body>
</html>