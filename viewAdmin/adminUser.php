<?php 
require("../model/user.php");
require("../model/batiment.php");
function createUserBox($user){
	$batiments = getBatofUser($user['idUtilisateur']);
	echo'
	
	<div class="container-fluid">
        <div class="row justify-content-start">
          <div class="col-1"></div>
          <div class="col-9">
            <div class="card shadow bg-body rounded">
              <div class="card-body">
                <h4 class="card-title">'.$user['Pseudo'].'</h4>
                <h6 class="card-subtitle mb-2 text-muted">';
				
				foreach($batiments as $bat ){ 
					if(!empty($bat['NomSecondaire'])){echo $bat['NomSecondaire'];}else{ echo $bat['NomBatiment'];}
					echo' ';
				}
				
				echo' </h6>
              </div>
            </div>
          </div>
          <div class="col-2">
            <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#ModalMod" data-id="'.$user['idUtilisateur'].'" data-name="'.$user['Pseudo'].'">Modifier</button>
            <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#ModalDel" data-id="'.$user['idUtilisateur'].'" data-name="'.$user['Pseudo'].'">Supprimer</button>
          </div>
        </div>
        <div class="container-fluid" style="height: 1rem;"></div>
	</div> 
	
	
	';
}

?>

<!Doctype html>
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
		  if($_GET['error']=="sameLogin"){
			  echo'
				<div class="alert alert-danger " role="alert">
					<p class="text-center"> Cette Utilisateur existe déjà veuillez choisir un autre peusdo</p>
				</div>
			  
			  
			  ';
		  }else if($_GET['error']=="sameLogin"){
			  
		  }
	  }
	  
	  
	  
	  ?>
      <div class="container-fluid">
        <div class="row justify-content-start">
          <div class="col-1"></div>
          <div class="col-4">
            <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#ModalAdd">Ajouter User</button>
          </div>
        </div>
        <div class="container-fluid" style="height: 3rem;"></div>
      </div>
     
	 <?php
	 
	 $users = getAllUser();
	 foreach($users as $user){
		 createUserBox($user);
	 }
	 
	 
	 
	 ?>
	 
      
           <!-- Modal Windows -->

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

      <div class="modal fade" id="ModalAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ajout User</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form id="userAdd" action="../controleur/utilisateur.php?fct=add" method="post">
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Identifiant</label>
                  <input type="identifiant" class="form-control" name="utilisateur" id="exampleInputEmail1" aria-describedby="emailHelp" required="required">
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
                  <input type="password" class="form-control" name="mdp" id="exampleInputPassword1" required="required">
                </div>
				<label for="addSelect0" class="form-label">Bâtiments</label>
				<div id=ASelect>
					<div class="mb-3" id="addSelect0">
					  <select class="form-select" name="bats[]" id="addSelect">
					  <?php
						$bats = getAllBatiment();
						  if(empty($bats)){
							  echo '<option id="" value="">veuillez créer un bâtiment</option>';
						  }else{
								foreach($bats as $bat){
									echo'<option value="'.$bat['idBat'].'">';if(!empty($bat['NomSecondaire'])){echo $bat['NomSecondaire'];}else{ echo $bat['NomBatiment'];}echo'</option>';
								}
						  }
					  
					  ?>
					  </select>
					  <button id="deleteA" type="button" class="btn btn-secondary" onclick="ADelete(0)">supprimer</button>

					</div>  
				</div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" onclick="AAdd()">Ajouter un droit</button>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
              <button type="submit" form="userAdd" class="btn btn-primary" >Sauvegarder</button>
            </div>
          </div>
        </div>
      </div>

      <script>
	  var i=1;
	  oldForm = document.getElementById("userAdd");
	  Form=oldForm.cloneNode(true);
	  ancienSelectA=document.getElementById("addSelect0");
        function AAdd() {
			if(oldForm.innerHTML == ''){
				oldForm.appendChild(Form);
			}
			var nouveauSelect = ancienSelectA.cloneNode(true);
			nouveauSelect.id="addSelect"+i;
			button = nouveauSelect.querySelector("#deleteA");
			button.setAttribute('onclick','ADelete('+i+')');
			form = document.getElementById("ASelect");
			form.appendChild(nouveauSelect);
			i++;
        }
		
		function ADelete(idSelect) {
			deleteElement = document.getElementById("addSelect"+idSelect);
			deleteElement.remove();
        }
      </script>      

      <div class="modal fade" id="ModalMod" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modification User</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form id="userUpdate" action="../controleur/utilisateur.php?fct=update" method="post">
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Identifiant</label>
                  <input type="identifiant" name="utilisateur" class="form-control" id="utilisateur" aria-describedby="emailHelp" placeholder="Identifiant Actuel">
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
                  <input type="password" name="mdp" class="form-control" id="mdp" placeholder="Mot de passe Actuel">
                </div>
				<label for="updateSelect0" class="form-label">Bâtiments</label>
				<div id=USelect>
					<div class="mb-3" id="updateSelect0">

						<select class="form-select" name="bats[]" id="updateSelect">
					  <?php
						
						$bats = getAllBatiment();
						  if(empty($bats)){
							  echo '<option id="" value="">veuillez créer un bâtiment</option>';
						  }else{
								foreach($bats as $bat){
									echo'<option value="'.$bat['idBat'].'">';if(!empty($bat['NomSecondaire'])){echo $bat['NomSecondaire'];}else{ echo $bat['NomBatiment'];}echo'</option>';
								}
						  }
					  ?>
						</select>
						
						<button id="deleteU" type="button" class="btn btn-secondary" onclick="UDelete(0)">supprimer</button>
					</div>
				</div>
              </form>
            </div>
            <div class="modal-footer">
			  <button type="button" class="btn btn-secondary" onclick="UAdd()">Ajouter un droit</button>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
              <button type="submit" form="userUpdate" class="btn btn-primary" data-bs-dismiss="modal">Sauvegarder</button>
            </div>
          </div>
        </div>
      </div> 
	  
      <script>
	  
		  var j=1;
		  ancienSelectU=document.getElementById("updateSelect0");;
        function UAdd() {
			var nouveauSelect = ancienSelectU.cloneNode(true);
			nouveauSelect.id="updateSelect"+j;
			button = nouveauSelect.querySelector("#deleteU");
			button.setAttribute('onclick','UDelete('+j+')');
			form = document.getElementById("USelect");
			form.appendChild(nouveauSelect);
			j++;
        }
		
		function UDelete(idSelect) {
			deleteElement = document.getElementById("updateSelect"+idSelect);
			deleteElement.remove();
        }
		
		
      </script>  
	  
      <div class="modal fade" id="ModalDel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Suppression User</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Voulez-vous supprimer cet utilisateur ?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
			  <a id=supprimer href="../controleur/utilisateur.php?fct=delete">
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
	
	
		//ModalMod
		let templateMod = null;
	
		$('#ModalMod').on('show.bs.modal', function (event) {
			templateMod = $(this).html();
			var button = $(event.relatedTarget) 
			var id = button.data('id')
			var nameUser = button.data('name')
			var modal = $(this)
			modal.find('.modal-title').text('Modification : ' + nameUser)
			modal.find('#utilisateur').val(nameUser)

			$("#userUpdate").attr("action", "../controleur/utilisateur.php?fct=update&userId=" + id);
			$.ajax({
					url: '../controleur/modalMod.php',
					type: 'post',
					data: {id: id},
					success: function(response){ 
						$('#USelect').html(response); 
					}
				});
		})
		

		$('#ModalMod').on('hidden.bs.modal', function(e) {
		  $(this).html(templateMod);
		});
		
		
		
		//ModalAdd
		let templateAdd = null;

		$('#ModalAdd').on('show.bs.modal', function (event) {
			templateAdd = $(this).html();
		})
		
		$('#ModalAdd').on('hidden.bs.modal', function(e) {
		  $(this).html(templateAdd);
		});
		
		
		//ModalDel
		$('#ModalDel').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) 
		  var id = button.data('id')
		  var nameUser = button.data('name')
		  var modal = $(this)
		  modal.find('.modal-title').text('Suppression : ' + nameUser)

		  $("#supprimer").attr("href", "../controleur/utilisateur.php?fct=delete&userId=" + id);
		  
		})
		
	</script>
  </body>
</html>