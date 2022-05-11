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
        <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
          <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
            <img class ="img-fluid" src="https://www.ville-chambray-les-tours.fr/wp-content/themes/chambray-les-tours/assets/img/logo-footer.png" height="150" width="150" alt=""/>
            <p class="text-start fs-2 fw-bold align-content-center" style="margin: 1rem;">Plateforme CO2</p>
            <p class="text-start fs-3 fw-bold align-content-center" style="margin: 1rem;">Page Admin</p>
            <ul class="nav nav-pills align-content-center justify-content-center" style="margin-right: 35rem;">
              <li class="nav-item"><a href="#" class="nav-link active" aria-current="page">Users</a></li>
              <li class="nav-item"><a href="#" class="nav-link">Bâtiments</a></li>
            </ul>
          </a>
          <ul class="nav nav-pills align-content-center">
            <li class="nav-item"><a href="#" class="nav-link active" aria-current="page">Accueil</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Bâtiments</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Profil</a></li>
          </ul>
        </header>
      </div>
      <div class="container-fluid" style="height: 13rem;"></div>
      
      <div class="container-fluid">
        <div class="row justify-content-start">
          <div class="col-1"></div>
          <div class="col-4">
            <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#ModalAdd">Ajouter User</button>
          </div>
        </div>
        <div class="container-fluid" style="height: 3rem;"></div>
      </div>
  
      <div class="container-fluid">
        <div class="row justify-content-start">
          <div class="col-1"></div>
          <div class="col-9">
            <div class="card shadow bg-body rounded">
              <div class="card-body">
                <h4 class="card-title">Nom User</h4>
                <h6 class="card-subtitle mb-2 text-muted">Infos User Infos User Infos User Infos User Infos User Infos User Infos User Infos User Infos User Infos User Infos User Infos User </h6>
              </div>
            </div>
          </div>
          <div class="col-2">
            <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#ModalMod">Modifier</button>
            <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#ModalDel">Supprimer</button>
          </div>
        </div>
        <div class="container-fluid" style="height: 5rem;"></div>
      </div>    
      
      <!-- Modal Windows -->

      <div class="modal fade" id="ModalAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ajout User</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Identifiant</label>
                  <input type="identifiant" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
                  <input type="password" class="form-control" id="exampleInputPassword1">
                </div>
                <label for="exampleInputPassword1" class="form-label">Droit d'accès</label>
                <select class="form-select" aria-label="Default select example">
                  <option selected>Bâtiment à choisir</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                </select>
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
              <h5 class="modal-title" id="exampleModalLabel">Modification User</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Identifiant</label>
                  <input type="identifiant" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Identifiant Actuel">
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Mot de passe Actuel">
                </div>
                <label for="exampleInputPassword1" class="form-label">Droit d'accès</label>
                <select class="form-select" aria-label="Default select example">
                  <option selected>Bâtiment à choisir</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                </select>
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
              <h5 class="modal-title" id="exampleModalLabel">Suppression User</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Voulez-vous supprimer cet utilisateur ?
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