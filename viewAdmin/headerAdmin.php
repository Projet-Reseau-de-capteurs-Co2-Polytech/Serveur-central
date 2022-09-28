<?php
$active= 'active" aria-current="page"';
$incative = '"';

$var1 = $active;
$var2 = $incative;
if(strpos($_SERVER['PHP_SELF'],"admin.php")!==false){
	$var1 = $incative;
	$var2 = $active;

}


echo'
	<header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
	  <a class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
		<img class ="img-fluid" src="https://www.ville-chambray-les-tours.fr/wp-content/themes/chambray-les-tours/assets/img/logo-footer.png" height="150" width="150" alt=""/>
		<p class="text-start fs-2 fw-bold align-content-center" style="margin: 1rem;">Plateforme CO2</p>
		<p class="text-start fs-3 fw-bold align-content-center" style="margin: 1rem;">Page Admin</p>
		<ul class="nav nav-pills align-content-center justify-content-center" style="margin-right: 35rem;">
		  <li class="nav-item"><a href="adminUser.php" class="nav-link '.$var1.'>Users</a></li>
		  <li class="nav-item"><a href="admin.php" class="nav-link '.$var2.'>Bâtiments</a></li>
		</ul>
	  </a>	  
	</header>
';


?>
