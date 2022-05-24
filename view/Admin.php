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
			headerBat();
		?>
      </div>
      <div class="container-fluid" style="height: 13rem;"></div>
      
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
        <div class="row justify-content-start">
          <div class="col-1"></div>
          <div class="col-9">
            <div class="card shadow bg-body rounded">
              <div class="card-body">
                <h4 class="card-title">Nom Bâtiment</h4>
                <h6 class="card-subtitle mb-2 text-muted">Infos Bâtiment Infos Bâtiment Infos Bâtiment Infos Bâtiment Infos Bâtiment Infos Bâtiment Infos Bâtiment Infos Bâtiment Infos Bâtiment Infos Bâtiment</h6>
              </div>
            </div>
          </div>
          <div class="col-2">
            <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#ModalMod">Modifier</button>
            <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#ModalDel">Supprimer</button>
          </div>
        </div>
        <div class="container-fluid" style="height: 3rem;"></div>

        <!-- Card Salle -->
        <div class="row justify-content-start">
          <div class="col-1"></div>
          <div class="col-1">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalAddSalle">Ajouter Salle</button><br>
          </div>
          <div class="col-2">
            <div class="card shadow bg-body rounded">
              <div class="card-body">
                <h4 class="card-title">Nom Salle</h4>
                <h6 class="card-subtitle mb-2 text-muted">Infos Salle Infos Salle Infos Salle Infos Salle Infos Salle Infos Salle Infos Salle Infos Salle Infos Salle Infos Salle</h6>
                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#ModalModSalle">Modifier</button>
                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#ModalDelSalle">Supprimer</button>
              </div>
            </div>
          </div>
          <div class="col-2">
            <div class="card shadow bg-body rounded">
              <div class="card-body">
                <h4 class="card-title">Nom Salle</h4>
                <h6 class="card-subtitle mb-2 text-muted">Infos Salle Infos Salle Infos Salle Infos Salle Infos Salle Infos Salle Infos Salle Infos Salle Infos Salle Infos Salle</h6>
                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#ModalModSalle">Modifier</button>
                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#ModalDelSalle">Supprimer</button>
              </div>
            </div>
          </div>
          <div class="col-2">
            <div class="card shadow bg-body rounded">
              <div class="card-body">
                <h4 class="card-title">Nom Salle</h4>
                <h6 class="card-subtitle mb-2 text-muted">Infos Salle Infos Salle Infos Salle Infos Salle Infos Salle Infos Salle Infos Salle Infos Salle Infos Salle Infos Salle</h6>
                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#ModalModSalle">Modifier</button>
                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#ModalDelSalle">Supprimer</button>
              </div>
            </div>
          </div>
          <div class="col-2">
            <div class="card shadow bg-body rounded">
              <div class="card-body">
                <h4 class="card-title">Nom Salle</h4>
                <h6 class="card-subtitle mb-2 text-muted">Infos Salle Infos Salle Infos Salle Infos Salle Infos Salle Infos Salle Infos Salle Infos Salle Infos Salle Infos Salle</h6>
                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#ModalModSalle">Modifier</button>
                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#ModalDelSalle">Supprimer</button>
              </div>
            </div>
          </div>
		  
          <div class="col-1"></div>
        </div>
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
              <form>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Nom Bâtiment</label>
                  <input type="identifiant" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                  <label for="Adresse" class="form-label">Adresse</label>
                  <input type="Adresse" class="form-control" id="Adresse">
                </div>
                <div class="mb-3">
                  <label for="Code Postal" class="form-label">Code Postal</label>
                  <input type="Code Postal" class="form-control" id="Code Postal">
                </div>
                <div class="mb-3">
                  <label for="Ville" class="form-label">Ville</label>
                  <input type="Ville" class="form-control" id="Ville">
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Nombre de salle</label>
                  <input type="nb salle" class="form-control" id="exampleInputPassword1">
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
              <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Sauvegarder</button>
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
              <form>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Nom Bâtiment</label>
                  <input type="identifiant" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                  <label for="Adresse" class="form-label">Adresse</label>
                  <input type="Adresse" class="form-control" id="Adresse">
                </div>
                <div class="mb-3">
                  <label for="Code Postal" class="form-label">Code Postal</label>
                  <input type="Code Postal" class="form-control" id="Code Postal">
                </div>
                <div class="mb-3">
                  <label for="Ville" class="form-label">Ville</label>
                  <input type="Ville" class="form-control" id="Ville">
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Nombre de salle</label>
                  <input type="nb salle" class="form-control" id="exampleInputPassword1">
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
              <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Sauvegarder</button>
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
              <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Supprimer</button>
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
              <form>
                <div class="mb-3">
                  <label for="Nom Salle" class="form-label">Nom Salle</label>
                  <input type="Nom Salle" class="form-control" id="Nom Salle">
                </div>
                <div class="mb-3">
                  <label for="Id Capteur" class="form-label">Id Capteur</label>
                  <input type="Id Capteur" class="form-control" id="Id Capteur">
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
              <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Sauvegarder</button>
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
              <form>
                <div class="mb-3">
                  <label for="Nom Salle" class="form-label">Nom Salle</label>
                  <input type="Nom Salle" class="form-control" id="Nom Salle">
                </div>
                <div class="mb-3">
                  <label for="Id Capteur" class="form-label">Id Capteur</label>
                  <input type="Id Capteur" class="form-control" id="Id Capteur">
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
              <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Sauvegarder</button>
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
              <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Supprimer</button>
            </div>
          </div>
        </div>
      </div>
  
    </main>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>